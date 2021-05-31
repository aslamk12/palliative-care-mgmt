package com.example.patient;

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
    String loggedIn_mobile,loggedIn_name,loggedIn_address,loggedIn_place,loggedIn_pincode,loggedIn_panchayath,loggedIn_ward;
    EditText edt_name, edt_address, edt_place, edt_pincode, edt_panchayath, edt_ward;
    Button btn_upt;
    int loggedIn_user;
    String name,address,place,pincode,panchayath,ward;




    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_profile);
        Patient patient = SharedPrefManager.getInstance(this).getPatient();
        loggedIn_user = patient.getPid();
        loggedIn_name= patient.getPname();
        loggedIn_address=patient.getAddress();
        loggedIn_mobile = patient.getMobile();
        loggedIn_place=patient.getPlace();
        loggedIn_pincode=patient.getPincode();
        loggedIn_panchayath=patient.getPanchayath();
        loggedIn_ward=patient.getWard();

        edt_name = findViewById(R.id.reg_et_name1);
        edt_address = findViewById(R.id.reg_et_hname1);
        edt_place = findViewById(R.id.reg_et_place1);
        edt_pincode = findViewById(R.id.reg_et_pincode1);
        edt_panchayath = findViewById(R.id.reg_et_panchayath1);
        //edt_ward = findViewById(R.id.reg_et_ward);
        btn_upt = findViewById(R.id.update);

        edt_name.setText(loggedIn_name);
        edt_address.setText(loggedIn_address);
        edt_place.setText(loggedIn_place);
        edt_pincode.setText(loggedIn_pincode);
        edt_panchayath.setText(loggedIn_panchayath);
//        edt_ward.setText(loggedIn_ward);

        btn_upt.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                validatepf();
            }
        });

    }
    private void validatepf()
    {
        if(edt_name.getText().toString().isEmpty())
        {
            edt_name.setError("Please enter your full name!");
            edt_name.requestFocus();
        }

        else if (edt_address.getText().toString().isEmpty())
        {
            edt_address.setError("Please enter your house name!");
            edt_address.requestFocus();
        }
        else if (edt_place.getText().toString().isEmpty())
        {
            edt_place.setError("Please enter your place!");
            edt_place.requestFocus();
        }
        else if (edt_pincode.getText().toString().isEmpty())
        {
            edt_pincode.setError("please enter your pincode number");
            edt_pincode.requestFocus();
        }
        else if (edt_panchayath.getText().toString().isEmpty())
        {
            edt_panchayath.setError("Please enter your panchayath!");
            edt_panchayath.requestFocus();
        }
//        else if (edt_ward.getText().toString().isEmpty())
//        {
//            edt_ward.setError("Please enter your ward!");
//            edt_ward.requestFocus();
//        }
        else
        {
            updateUser();
        }
    }
    private void updateUser()
    {
        name = edt_name.getText().toString().trim();
        address = edt_address.getText().toString().trim();
        place = edt_place.getText().toString().trim();
        pincode = edt_pincode.getText().toString().trim();
        panchayath = edt_panchayath.getText().toString().trim();
        //ward = getIntent().getExtras().getString("ward");
        class UpdateUser extends AsyncTask<Void, Void, String>
        {

            @Override
            protected String doInBackground(Void... voids)
            {
                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("pname", name);
                params.put("address", address);
                params.put("place", place);
                params.put("pincode", pincode);
                params.put("panchayath", panchayath);
                //params.put("ward", ward);
                params.put("pid", String.valueOf(loggedIn_user));

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

                        Patient patient = new Patient(
                                userJson.getInt("pid"),
                                userJson.getString("pname"),
                                userJson.getString("dob"),
                                userJson.getString("gender"),
                                userJson.getString("address"),
                                userJson.getString("place"),
                                userJson.getString("pincode"),
                                userJson.getString("panchayath"),
                                userJson.getString("ward"),
                                userJson.getString("mobile"),
                                userJson.getString("disease")
                        );

                        SharedPrefManager.getInstance(getApplicationContext()).patientLogin(patient);

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
}