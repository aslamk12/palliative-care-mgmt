package com.example.patient;

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

public class ChangePassword extends AppCompatActivity {
    int loggedIn_user;
    String loggedIn_mobile;
    EditText edt_pfpass, edt_pfcpass;
    Button btn_cpass;
    String mobile,password;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_change_password);
        Patient patient = SharedPrefManager.getInstance(this).getPatient();
        loggedIn_user = patient.getPid();
        loggedIn_mobile = patient.getMobile();

        edt_pfpass = findViewById(R.id.et_pfpass);
        edt_pfcpass = findViewById(R.id.et_pfcpass);
        btn_cpass = findViewById(R.id.btn_cpass);

        btn_cpass.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                validatepass();
            }
        });
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