package com.example.patient;

import androidx.appcompat.app.AppCompatActivity;
import android.app.ProgressDialog;
import android.content.Intent;
import android.os.AsyncTask;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ProgressBar;
import android.widget.Toast;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

import android.os.Bundle;

public class Register2Activtiy extends AppCompatActivity {
    EditText et_mob, et_pass, et_cpass, et_disease;
    Button btn_reg;
    String name,dob,address,place,pincode,gender,panchayath,ward,mob,disease,password;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register2);
        et_mob = findViewById(R.id.reg_et_mob);
        et_disease = findViewById(R.id.reg_et_disease);
        et_pass = findViewById(R.id.reg_et_pwd);
        et_cpass = findViewById(R.id.reg_et_cpwd);

        btn_reg = findViewById(R.id.btn_register);
        btn_reg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                validate();
            }
        });
    }
    private void validate()
    {
        if(et_disease.getText().toString().isEmpty())
        {
            et_disease.setError("Please enter disaese");
            et_disease.requestFocus();
        }
        if(et_mob.getText().toString().isEmpty())
        {
            et_mob.setError("Please enter your mobile number.");
            et_mob.requestFocus();
        }
        else if(et_mob.getText().toString().length()<10)
        {
            et_mob.setError("Mobile number must be 10 digits.");
            et_mob.requestFocus();
        }
        else if(et_pass.getText().toString().isEmpty())
        {
            et_pass.setError("Please enter your password");
            et_pass.requestFocus();
        }
        else if(et_pass.getText().toString().length()<6)
        {
            et_pass.setError("Password must have minimum 6 characters ");
            et_pass.requestFocus();
        }
        else if (et_cpass.getText().toString().isEmpty())
        {
            et_cpass.setError("Please confirm your password");
            et_cpass.requestFocus();
        }
        else if (!(et_cpass.getText().toString().equals(et_pass.getText().toString())))
        {
            et_cpass.setError("Please use same password given");
            et_cpass.requestFocus();
        }
        else
        {
            registerUser();
        }
    }
    private void registerUser() {
        name = getIntent().getExtras().getString("name");
        dob = getIntent().getExtras().getString("dob");
        gender = getIntent().getExtras().getString("gender");
        address = getIntent().getExtras().getString("address");
        place = getIntent().getExtras().getString("place");
        pincode = getIntent().getExtras().getString("pincode");
        panchayath = getIntent().getExtras().getString("panchayath");
        ward = getIntent().getExtras().getString("ward");
        disease = et_disease.getText().toString().trim();
        mob = et_mob.getText().toString().trim();
        password = et_pass.getText().toString().trim();
        class RegisterUser extends AsyncTask<Void, Void, String>
        {

            private ProgressBar progressBar;

            @Override
            protected String doInBackground(Void... voids)
            {
                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("pname", name);
                params.put("dob", dob);
                params.put("gender", gender);
                params.put("address", address);
                params.put("place", place);
                params.put("pincode", pincode);
                params.put("panchayath", panchayath);
                params.put("ward", ward);
                params.put("disease", disease);
                params.put("mobile", mob);
                params.put("password", password);

                return requestHandler.sendPostRequest(URLs.URL_REGISTER, params);
            }


            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressBar = (ProgressBar) findViewById(R.id.progbar);
                progressBar.setVisibility(View.VISIBLE);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                progressBar.setVisibility(View.GONE);

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

                        Intent verifyIntent = new Intent(getApplicationContext(), MainActivity.class);
                        startActivity(verifyIntent);

                    }
                    else
                    {
                        Toast.makeText(getApplicationContext(), "Mobile number already registered.", Toast.LENGTH_SHORT).show();
                    }
                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }
            }
        }

        RegisterUser ru = new RegisterUser();
        ru.execute();

    }
}