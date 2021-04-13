package com.example.volunteer;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.widget.EditText;
import android.widget.Button;
import android.widget.TextView;
import android.widget.ProgressBar;
import android.util.Log;
import android.util.Patterns;
import android.view.View;
import android.widget.Toast;
import android.os.Handler;

import android.os.Bundle;

import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;

public class MainActivity extends AppCompatActivity {
    EditText mobile,password;
    Button login;
    TextView register;


    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        register=(TextView)findViewById(R.id.txt_reg);
        mobile=(EditText)findViewById(R.id.et_mob);
        password=(EditText)findViewById(R.id.et_pass);
        login=(Button)findViewById(R.id.btn_login);
        if(SharedPrefManager.getInstance(this).isLoggedIn())
        {
            Intent homeIntent = new Intent(MainActivity.this,HomeActivity.class);
            startActivity(homeIntent);
        }

        login.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                validate();

            }
        });


        register.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(MainActivity.this,RegisterActivity.class);
                startActivity(regIntent);

            }
        });
    }
    private void validate()
    {
        if (mobile.getText().toString().isEmpty())
        {
            mobile.setError("Please enter mobile number");
            mobile.requestFocus();
        }
        else if (password.getText().toString().isEmpty())
        {
            password.setError("Please enter password");
            password.requestFocus();
        }
        else
        {
            loginUser();
        }
    }
    private void loginUser()
    {
        final String mob = mobile.getText().toString().trim();
        final String pass = password.getText().toString().trim();

        class LoginUser extends AsyncTask<Void, Void, String>
        {
            private ProgressBar progressBar;

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("mobile", mob);
                params.put("password", pass);

                return requestHandler.sendPostRequest(URLs.URL_LOGIN, params);
            }

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressBar = (ProgressBar) findViewById(R.id.loginPageProgressBar);
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
                        Toast.makeText(getApplicationContext(), "No user found", Toast.LENGTH_SHORT).show();
                    }
                }
                catch(JSONException e)
                {
                    e.printStackTrace();
                }

            }
        }

        LoginUser lu = new LoginUser();
        lu.execute();

    }
}