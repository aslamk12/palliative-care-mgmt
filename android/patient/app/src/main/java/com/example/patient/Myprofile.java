package com.example.patient;

import androidx.appcompat.app.AppCompatActivity;
import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;

import com.google.android.material.bottomnavigation.BottomNavigationView;


public class Myprofile extends AppCompatActivity {
    TextView edit_profile,ch_pass,tv_signout;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_myprofile);
        edit_profile=(TextView)findViewById(R.id.tv_edit_profile);
        ch_pass=(TextView)findViewById(R.id.tv_chpass);
        tv_signout = findViewById(R.id.tv_signout);
        edit_profile.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(Myprofile.this,EditProfile.class);
                startActivity(regIntent);

            }
        });
        ch_pass.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(Myprofile.this,ChangePassword.class);
                startActivity(regIntent);

            }
        });
    }
}