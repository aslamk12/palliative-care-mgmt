package com.example.volunteer;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.TextView;

public class TransporthomeActivity extends AppCompatActivity {

    TextView tran_request,view_request;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_transporthome);
        tran_request=(TextView)findViewById(R.id.tv_tran_request);
        tran_request.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent regIntent = new Intent(TransporthomeActivity.this,TransportActivity.class);
                startActivity(regIntent);
            }
        });

    }
}