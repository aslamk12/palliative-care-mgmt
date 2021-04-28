package com.example.volunteer;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.app.AlertDialog;

import android.app.DatePickerDialog;
import android.content.DialogInterface;
import android.content.Intent;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;

import android.os.Bundle;

public class SendReportActivity extends AppCompatActivity {
    EditText et_disease,et_medicines,et_description;
    TextView patientName;
    Button btn_upload;
    String disease,medicines,description,pat_name;
    int pid,assv_id;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.sendreport);
        assv_id=getIntent().getExtras().getInt("assv_id");
        pid=getIntent().getExtras().getInt("pid");
        pat_name=getIntent().getExtras().getString("pname");
        btn_upload = findViewById(R.id.btn_upload);
        patientName = findViewById(R.id.tv_patientname);
        et_disease = findViewById(R.id.et_disease);
        et_medicines = findViewById(R.id.et_medicines);
        et_description = findViewById(R.id.et_descp);

        patientName.setText(pat_name);
        btn_upload.setOnClickListener(new View.OnClickListener() {
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
            et_disease.setError("Enter disease details");
            et_disease.requestFocus();
        }
        else if (et_medicines.getText().toString().isEmpty())
        {
            et_medicines.setError("Enter medicines taking");
            et_medicines.requestFocus();
        }

        else if(et_description.getText().toString().isEmpty())
        {
            et_description.setError("Enter description about patient health");
            et_description.requestFocus();
        }

        else
        {
            uploadreport();
        }
    }
    private void uploadreport()
    {
        disease = et_disease.getText().toString();
        medicines = et_medicines.getText().toString();
        description = et_description.getText().toString();
        Intent uploadIntent = new Intent(SendReportActivity.this, UploadreportActivity.class);
        uploadIntent.putExtra("assv_id", assv_id);
        uploadIntent.putExtra("pid", pid);
        uploadIntent.putExtra("disease", disease);
        uploadIntent.putExtra("medicines", medicines);
        startActivity(uploadIntent);

    }
}