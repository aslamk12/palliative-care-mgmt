package com.example.volunteer;

import androidx.appcompat.app.AppCompatActivity;
import androidx.annotation.NonNull;
import android.content.Intent;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;

import com.google.android.material.bottomnavigation.BottomNavigationView;
import android.os.Bundle;

public class PatientVerificationActivity extends AppCompatActivity {
    TextView ver_request,send_report,view_report;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient_verification);

        ver_request=(TextView)findViewById(R.id.tv_ver_request);
        send_report=(TextView)findViewById(R.id.tv_send_report);
        view_report=(TextView)findViewById(R.id.tv_view_report);


        ver_request.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(PatientVerificationActivity.this,PatientActivty.class);
                startActivity(regIntent);

            }
        });
        send_report.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {

                Intent regIntent = new Intent(PatientVerificationActivity.this,SendReportlistActivity.class);
                startActivity(regIntent);

            }
        });
    }
}