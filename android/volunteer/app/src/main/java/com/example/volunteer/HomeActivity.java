package com.example.volunteer;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

public class HomeActivity extends AppCompatActivity {
    TextView patient_verify,tv_transport;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_home);

        patient_verify=(TextView)findViewById(R.id.patient_verify);
        tv_transport=(TextView)findViewById(R.id.tv_transport);
        patient_verify.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(HomeActivity.this,PatientVerificationActivity.class);
                startActivity(regIntent);

            }
        });
        tv_transport.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(HomeActivity.this,TransporthomeActivity.class);
                startActivity(regIntent);

            }
        });
    }
}