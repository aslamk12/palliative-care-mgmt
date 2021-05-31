package com.example.patient;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;
import com.google.android.material.bottomnavigation.BottomNavigationView;

public class BlooddonorHome extends AppCompatActivity {
    TextView tv_A,tv_A1,tv_B,tv_O,tv_AB,tv_B1,tv_O1,tv_AB1;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_blooddonor_home);

        BottomNavigationView bottomNavigationView = findViewById(R.id.bottom_navigation);
        //bottomNavigationView.setSelectedItemId(R.id.profile_nav);
        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {


            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                switch (item.getItemId()){

                    case R.id.profile_nav:
                        startActivity(new Intent(getApplicationContext(),Myprofile.class));
                        overridePendingTransition(0,0);
                        return true;



                    case R.id.home_nav:
                        startActivity(new Intent(getApplicationContext(),HomeActivity.class));
                        overridePendingTransition(0,0);
                        return true;


                    case R.id.sign_out:
                        SharedPrefManager.getInstance(getApplicationContext()).logout();
                        return true;
                }
                return false;
            }
        });

        tv_A=(TextView)findViewById(R.id.tv_bgA);
        tv_A1=(TextView)findViewById(R.id.tv_bgA1);
        tv_B1=(TextView)findViewById(R.id.tv_bgB1);
        tv_B=(TextView)findViewById(R.id.tv_bgB);
        tv_O1=(TextView)findViewById(R.id.tv_bgO1);
        tv_O=(TextView)findViewById(R.id.tv_bgO);
        tv_AB=(TextView)findViewById(R.id.tv_bgAB);
        tv_AB1=(TextView)findViewById(R.id.tv_bgAB1);


        tv_A.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent aIntent = new Intent(BlooddonorHome.this,BloodDonorActivity.class);
                aIntent.putExtra("group",tv_A.getText().toString().trim());
                startActivity(aIntent);

            }
        });
        tv_A1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent a1Intent = new Intent(BlooddonorHome.this,BloodDonorActivity.class);
                a1Intent.putExtra("group",tv_A1.getText().toString().trim());
                startActivity(a1Intent);

            }
        });
        tv_B1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent b1Intent = new Intent(BlooddonorHome.this,BloodDonorActivity.class);
                b1Intent.putExtra("group",tv_B1.getText().toString().trim());
                startActivity(b1Intent);

            }
        });
        tv_B.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent bIntent = new Intent(BlooddonorHome.this,BloodDonorActivity.class);
                bIntent.putExtra("group",tv_B.getText().toString().trim());
                startActivity(bIntent);

            }
        });
        tv_O.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent oIntent = new Intent(BlooddonorHome.this,BloodDonorActivity.class);
                oIntent.putExtra("group",tv_O.getText().toString().trim());
                startActivity(oIntent);

            }
        });
        tv_O1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent o1Intent = new Intent(BlooddonorHome.this,BloodDonorActivity.class);
                o1Intent.putExtra("group",tv_O1.getText().toString().trim());
                startActivity(o1Intent);

            }
        });
        tv_AB.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent abIntent = new Intent(BlooddonorHome.this,BloodDonorActivity.class);
                abIntent.putExtra("group",tv_AB.getText().toString().trim());
                startActivity(abIntent);

            }
        });
        tv_AB1.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent ab1Intent = new Intent(BlooddonorHome.this,BloodDonorActivity.class);
                ab1Intent.putExtra("group",tv_AB1.getText().toString().trim());
                startActivity(ab1Intent);

            }
        });
    }
}