package com.example.patient;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

public class EquipmentHomeActvity extends AppCompatActivity {
    TextView tv_av_equip;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_equipment_home_actvity);
        tv_av_equip=(TextView)findViewById(R.id.tv_av_equip);
        tv_av_equip.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(EquipmentHomeActvity.this,EquipmentActivity.class);
                startActivity(regIntent);

            }
        });
    }
}