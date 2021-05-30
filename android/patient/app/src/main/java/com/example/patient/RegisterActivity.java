package com.example.patient;

import androidx.appcompat.app.AppCompatActivity;
import android.app.DatePickerDialog;
import android.content.Intent;
import android.view.View;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.Spinner;
import android.widget.TextView;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Locale;

import android.os.Bundle;


public class RegisterActivity extends AppCompatActivity implements AdapterView.OnItemSelectedListener {
    EditText edt_name, edt_dob, edt_address, edt_place, edt_pincode, edt_panchayath, edt_ward;
    Button btn_next;
    Spinner gspinner;
    String gender;
    final Calendar myCalendar = Calendar.getInstance();
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_register);
        final DatePickerDialog.OnDateSetListener date = new DatePickerDialog.OnDateSetListener() {
            @Override
            public void onDateSet(DatePicker view, int year, int month, int dayOfMonth) {

                myCalendar.set(Calendar.YEAR, year);
                myCalendar.set(Calendar.MONTH, month);
                myCalendar.set(Calendar.DAY_OF_MONTH, dayOfMonth);
                updateLabel();
            }
        };
        edt_name = findViewById(R.id.reg_et_name);
        edt_dob = findViewById(R.id.reg_et_dob);
        edt_address = findViewById(R.id.reg_et_hname);
        edt_place = findViewById(R.id.reg_et_place);
        edt_pincode = findViewById(R.id.reg_et_pincode);
        edt_panchayath = findViewById(R.id.reg_et_panchayath);
        edt_ward = findViewById(R.id.reg_et_ward);
        btn_next = findViewById(R.id.btn_next);
        gspinner=findViewById(R.id.sp_gender);
        gspinner.setOnItemSelectedListener(this);

        edt_dob.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                new DatePickerDialog(RegisterActivity.this,date,myCalendar.get(Calendar.YEAR),myCalendar.get(Calendar.MONTH),myCalendar.get(Calendar.DAY_OF_MONTH)).show();

            }
        });

        btn_next.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                validate();

            }
        });

    }
    @Override
    public void onItemSelected(AdapterView<?> parent, View view, int position, long id) {
        ((TextView) view).setTextColor(getResources().getColor(R.color.white));
        gender = parent.getSelectedItem().toString();

    }

    @Override
    public void onNothingSelected(AdapterView<?> parent) {

    }
    private void updateLabel()
    {
        String myFormat = "yyyy-MM-dd";
        SimpleDateFormat sdf = new SimpleDateFormat(myFormat, Locale.US);
        edt_dob.setText(sdf.format(myCalendar.getTime()));
    }

    private void validate()
    {
        if(edt_name.getText().toString().isEmpty())
        {
            edt_name.setError("Please enter your full name!");
            edt_name.requestFocus();
        }
        else if (edt_dob.getText().toString().isEmpty())
        {
            edt_dob.setError("Please select your date of birth!");
            edt_dob.requestFocus();
        }
        else if (edt_address.getText().toString().isEmpty())
        {
            edt_address.setError("Please enter your house name!");
            edt_address.requestFocus();
        }
        else if (edt_place.getText().toString().isEmpty())
        {
            edt_place.setError("Please enter your place!");
            edt_place.requestFocus();
        }
        else if (edt_pincode.getText().toString().isEmpty())
        {
            edt_pincode.setError("please enter your pin number");
            edt_pincode.requestFocus();
        }
        else if (edt_panchayath.getText().toString().isEmpty())
        {
            edt_panchayath.setError("Please enter your panchayath!");
            edt_panchayath.requestFocus();
        }
        else if (edt_ward.getText().toString().isEmpty())
        {
            edt_ward.setError("Please enter your ward!");
            edt_ward.requestFocus();
        }
        else
        {
            nextPage();
        }
    }

    private void nextPage()
    {
        Intent communicationIntent = new Intent(RegisterActivity.this, Register2Activtiy.class);
        communicationIntent.putExtra("name",edt_name.getText().toString().trim());
        communicationIntent.putExtra("dob",edt_dob.getText().toString().trim());
        communicationIntent.putExtra("gender",gender.trim());
        communicationIntent.putExtra("address",edt_address.getText().toString().trim());
        communicationIntent.putExtra("place",edt_place.getText().toString().trim());
        communicationIntent.putExtra("pincode",edt_pincode.getText().toString().trim());
        communicationIntent.putExtra("panchayath",edt_panchayath.getText().toString().trim());
        communicationIntent.putExtra("ward",edt_ward.getText().toString().trim());
        startActivity(communicationIntent);
        finish();
    }

}