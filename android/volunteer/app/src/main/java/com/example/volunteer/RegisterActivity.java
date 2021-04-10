package com.example.volunteer;

import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.AsyncTask;
import android.view.View;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import java.text.SimpleDateFormat;
import android.widget.ProgressBar;
import android.widget.Toast;
import java.util.Calendar;
import java.util.Locale;
import android.app.DatePickerDialog;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.Calendar;
import java.util.HashMap;

import android.os.Bundle;

public class RegisterActivity extends AppCompatActivity {
    EditText edt_name, edt_dob,et_mob, et_place,et_panchayath,et_address, et_pass, et_cpass;
    Button btn_reg;
    String name,dob,mobile,place,password,panchayath,address;
    final Calendar myCalendar = Calendar.getInstance();

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        final DatePickerDialog.OnDateSetListener date = new DatePickerDialog.OnDateSetListener() {
            @Override
            public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {

                myCalendar.set(Calendar.YEAR, year);
                myCalendar.set(Calendar.MONTH, month);
                myCalendar.set(Calendar.DAY_OF_MONTH, dayOfMonth);
                updateLabel();
            }
        };
        edt_name = findViewById(R.id.et_name);
        edt_dob = findViewById(R.id.et_dob);
        et_mob = findViewById(R.id.et_mob);
        et_place = findViewById(R.id.et_place);
        et_address = findViewById(R.id.et_address);
        et_panchayath = findViewById(R.id.et_panchayath);
        et_pass = findViewById(R.id.et_pwd);
        et_cpass = findViewById(R.id.et_cpwd);

        btn_reg = findViewById(R.id.btn_comm);
        edt_dob.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                new DatePickerDialog(RegisterActivity.this,date,myCalendar.get(Calendar.YEAR),myCalendar.get(Calendar.MONTH),myCalendar.get(Calendar.DAY_OF_MONTH)).show();

            }
        });
        btn_reg.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                validate();
            }
        });

    }
    private void updateLabel()
    {
        String myFormat = "yyyy-MM-dd";
        SimpleDateFormat sdf = new SimpleDateFormat(myFormat, Locale.US);
        edt_dob.setText(sdf.format(myCalendar.getTime()));
    }
    private void validate()
    {
        if(edt_name.getText().toString().isEmpty())
        {
            edt_name.setError("Please enter your full name!");
            edt_name.requestFocus();
        }
        else if (edt_dob.getText().toString().isEmpty())
        {
            edt_dob.setError("Please select your date of birth!");
            edt_dob.requestFocus();
        }
        else if(et_mob.getText().toString().isEmpty())
        {
            et_mob.setError("Please enter your mobile number.");
            et_mob.requestFocus();
        }
        else if(et_mob.getText().toString().length()<10)
        {
            et_mob.setError("Mobile number must be 10 digits.");
            et_mob.requestFocus();
        }
        else if(et_place.getText().toString().isEmpty())
        {
            et_place.setError("Please enter your email");
            et_place.requestFocus();
        }
        else if(et_address.getText().toString().isEmpty())
        {
            et_address.setError("Please enter your email");
            et_address.requestFocus();
        }
        else if(et_panchayath.getText().toString().isEmpty())
        {
            et_panchayath.setError("Please enter your email");
            et_panchayath.requestFocus();
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
    private void registerUser()
    {
        name = edt_name.getText().toString().trim();
        dob = edt_dob.getText().toString().trim();
        mobile = et_mob.getText().toString().trim();
        place = et_place.getText().toString().trim();
        panchayath = et_panchayath.getText().toString().trim();
        address = et_address.getText().toString().trim();
        password = et_pass.getText().toString().trim();
        class RegisterUser extends AsyncTask<Void, Void, String>
        {

            private ProgressBar progressBar;

            @Override
            protected String doInBackground(Void... voids)
            {
                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("fullname", name);
                params.put("mobile", mobile);
                params.put("place", place);
                params.put("dob", dob);
                params.put("panchayath", panchayath);
                params.put("address", address);
                params.put("password", password);

                return requestHandler.sendPostRequest(URLs.URL_REGISTER, params);
            }


            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressBar = (ProgressBar) findViewById(R.id.prog_bar);
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

                        Volunteer volunteer new Volunteer(
                                userJson.getInt("v_id"),
                                userJson.getString("name"),
                                userJson.getString("mobile"),
                                userJson.getString("place"),
                                userJson.getString("dob"),
                                userJson.getString("panchayath"),
                                userJson.getString("address")
                        );

                        SharedPrefManager.getInstance(getApplicationContext()).volunteerLogin(volunteer);

                        Intent verifyIntent = new Intent(getApplicationContext(), MainActivity.class);
                        startActivity(verifyIntent);

                    }
                    else
                    {
                        Toast.makeText(getApplicationContext(), "email already registered.", Toast.LENGTH_SHORT).show();
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