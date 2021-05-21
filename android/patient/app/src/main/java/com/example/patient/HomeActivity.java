package com.example.patient;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

public class HomeActivity extends AppCompatActivity {
    TextView tv_equipments,tv_medicalstatus;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);
        tv_equipments=(TextView)findViewById(R.id.tv_equipments);
        tv_medicalstatus=(TextView)findViewById(R.id.tv_medstatus);
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
    }
}