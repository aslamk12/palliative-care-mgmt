package com.example.patient;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;
import com.google.android.material.bottomnavigation.BottomNavigationView;

public class HomeActivity extends AppCompatActivity {
    TextView tv_equipments,tv_medicalstatus,tv_tut,tv_bd;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

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

        tv_equipments=(TextView)findViewById(R.id.tv_equipments);
        tv_medicalstatus=(TextView)findViewById(R.id.tv_medstatus);
        tv_tut=(TextView)findViewById(R.id.tut);
        tv_bd=(TextView)findViewById(R.id.tv_bd);
        tv_equipments.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(HomeActivity.this,EquipmentHomeActvity.class);
                startActivity(regIntent);

            }
        });
        tv_medicalstatus.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(HomeActivity.this,MedicalStatus.class);
                startActivity(regIntent);

            }
        });
        tv_tut.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(HomeActivity.this,TutorialHome.class);
                startActivity(regIntent);

            }
        });
        tv_bd.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(HomeActivity.this,BlooddonorHome.class);
                startActivity(regIntent);

            }
        });
    }
}