package com.example.volunteer;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.AsyncTask;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import java.text.SimpleDateFormat;

import android.widget.ProgressBar;
import android.widget.Toast;
import java.util.Calendar;
import java.util.Locale;
import android.app.DatePickerDialog;

import org.json.JSONException;
import org.json.JSONObject;


import java.util.HashMap;

import android.os.Bundle;

import com.google.android.material.bottomnavigation.BottomNavigationView;

public class EditProfile extends AppCompatActivity {
    int loggedIn_user;
    String loggedIn_address,loggedIn_name,loggedIn_mobile,loggedIn_place,loggedIn_panchayath;
    EditText edt_pfname,edt_pfplace,edt_pfpass, edt_pfcpass,edt_pfpanchayath,edt_pfaddress;
    Button btn_edt,btn_cpass;
    String name,mobile,place,password,address,panchayath;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_profile);
        Volunteer volunteer = SharedPrefManager.getInstance(this).getUser();
        loggedIn_user = volunteer.getVid();
        loggedIn_place = volunteer.getPlace();
        loggedIn_name= volunteer.getFull_name();
        loggedIn_mobile = volunteer.getMobile();
        loggedIn_panchayath=volunteer.getPanchayath();
        loggedIn_address=volunteer.getAddress();

        edt_pfname = findViewById(R.id.et_pfname);
        edt_pfplace = findViewById(R.id.et_pfplace);
        edt_pfpanchayath = findViewById(R.id.et_pfpanchayath);
        edt_pfaddress = findViewById(R.id.et_pfaddress);

        edt_pfpass = findViewById(R.id.et_pfpass);
        edt_pfcpass = findViewById(R.id.et_pfcpass);
        btn_edt = findViewById(R.id.btn_edit);
        btn_cpass = findViewById(R.id.btn_cpass);

        edt_pfname.setText(loggedIn_name);
        edt_pfplace.setText(loggedIn_place);
        edt_pfpanchayath.setText(loggedIn_panchayath);
        edt_pfaddress.setText(loggedIn_address);

        btn_edt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                validatepf();
            }
        });
        btn_cpass.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                validatepass();
            }
        });

    }
    private void validatepf()
    {
        if(edt_pfname.getText().toString().isEmpty())
        {
            edt_pfname.setError("Please enter your full name!");
            edt_pfname.requestFocus();
        }

        else if(edt_pfplace.getText().toString().isEmpty())
        {
            edt_pfplace.setError("Please enter your mobile number.");
            edt_pfplace.requestFocus();
        }
        else if(edt_pfpanchayath.getText().toString().isEmpty())
        {
            edt_pfpanchayath.setError("Please enter your mobile number.");
            edt_pfpanchayath.requestFocus();
        }
        else if(edt_pfaddress.getText().toString().isEmpty())
        {
            edt_pfaddress.setError("Please enter your mobile number.");
            edt_pfaddress.requestFocus();
        }

        else
        {
            updateUser();
        }
    }
    private void validatepass() {
        if(edt_pfpass.getText().toString().isEmpty())
        {
            edt_pfpass.setError("Please enter your password");
            edt_pfpass.requestFocus();
        }
        else if(edt_pfpass.getText().toString().length()<6)
        {
            edt_pfpass.setError("Password must have minimum 6 characters ");
            edt_pfpass.requestFocus();
        }
        else if (edt_pfcpass.getText().toString().isEmpty())
        {
            edt_pfcpass.setError("Please confirm your password");
            edt_pfcpass.requestFocus();
        }
        else if (!(edt_pfcpass.getText().toString().equals(edt_pfpass.getText().toString())))
        {
            edt_pfcpass.setError("Please use same password given");
            edt_pfcpass.requestFocus();
        }
        else
        {
            cpassUser();
        }

    }
    private void updateUser()
    {
        name = edt_pfname.getText().toString().trim();
        place = edt_pfplace.getText().toString().trim();
        panchayath = edt_pfpanchayath.getText().toString().trim();
        address = edt_pfaddress.getText().toString().trim();
        class UpdateUser extends AsyncTask<Void, Void, String>
        {

            @Override
            protected String doInBackground(Void... voids)
            {
                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("name", name);
                params.put("place", place);
                params.put("panchayath", panchayath);
                params.put("address", address);
                params.put("vid", String.valueOf(loggedIn_user));

                return requestHandler.sendPostRequest(URLs.URL_EDITPROFILE, params);
            }


            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                try
                {
                    JSONObject obj = new JSONObject(s);

                    if (!obj.getBoolean("error"))
                    {
                        Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_SHORT).show();

                        JSONObject userJson = obj.getJSONObject("user");

                        Volunteer volunteer = new Volunteer(
                                userJson.getInt("vid"),
                                userJson.getString("fullname"),
                                userJson.getString("mobile"),
                                userJson.getString("place"),
                                userJson.getString("dob"),
                                userJson.getString("panchayath"),
                                userJson.getString("address")
                        );

                        SharedPrefManager.getInstance(getApplicationContext()).volunteerLogin(volunteer);

                        Intent verifyIntent = new Intent(getApplicationContext(), HomeActivity.class);
                        startActivity(verifyIntent);

                    }
                    else
                    {
                        Toast.makeText(getApplicationContext(), "can't update profile", Toast.LENGTH_SHORT).show();
                    }
                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }
            }
        }
        UpdateUser ru = new UpdateUser();
        ru.execute();
    }
    private void cpassUser()
    {
        password = edt_pfpass.getText().toString().trim();

        class CpassUser extends AsyncTask<Void, Void, String>
        {

            @Override
            protected String doInBackground(Void... voids)
            {
                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("password", password);
                params.put("mobile", loggedIn_mobile);

                return requestHandler.sendPostRequest(URLs.URL_EDITPASS, params);
            }


            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                try
                {
                    JSONObject obj = new JSONObject(s);

                    if (!obj.getBoolean("error"))
                    {
                        Toast.makeText(getApplicationContext(), obj.getString("message"), Toast.LENGTH_SHORT).show();

                        JSONObject userJson = obj.getJSONObject("user");

                        Volunteer volunteer = new Volunteer(
                                userJson.getInt("vid"),
                                userJson.getString("fullname"),
                                userJson.getString("mobile"),
                                userJson.getString("place"),
                                userJson.getString("dob"),
                                userJson.getString("panchayath"),
                                userJson.getString("address")
                        );

                        SharedPrefManager.getInstance(getApplicationContext()).volunteerLogin(volunteer);

                        Intent verifyIntent = new Intent(getApplicationContext(), HomeActivity.class);
                        startActivity(verifyIntent);

                    }
                    else
                    {
                        Toast.makeText(getApplicationContext(), "can't change password", Toast.LENGTH_SHORT).show();
                    }
                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }
            }
        }
        CpassUser cu = new CpassUser();
        cu.execute();
    }
}