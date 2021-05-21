package com.example.patient;

import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.app.AppCompatActivity;
import androidx.annotation.NonNull;
import android.content.Intent;
import android.os.AsyncTask;
import android.view.MenuItem;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.google.android.material.bottomnavigation.BottomNavigationView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.HashMap;


import android.os.Bundle;

public class MedicalStatus extends AppCompatActivity {
    int pid;
    String pname,medicine,nurse,ncontact,e_name,disease;
    TextView tv_pname,tv_medcine,tv_nurse,tv_ncontact,tv_ename,tv_disease;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_medical_status);
        Patient patient = SharedPrefManager.getInstance(this).getPatient();
        pid = patient.getPid();
        tv_pname = findViewById(R.id.tv_med_pat_real);
        tv_disease = findViewById(R.id.tv_med_disease_real);
        tv_medcine = findViewById(R.id.tv_med_medicines_real);
        tv_nurse = findViewById(R.id.tv_med_nurse_real);
        tv_ncontact = findViewById(R.id.tv_med_nursecontact_real);

        loadpatientdetails();
    }
    private void loadpatientdetails() {
        class Loadpatientdetails extends AsyncTask<Void, Void, String> {

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("pid", String.valueOf(pid));

                return requestHandler.sendPostRequest(URLs.URL_VIEWMEDICALDETAILS, params);
            }

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                try {
                    JSONArray array = new JSONArray(s);
                    for (int i = 0; i < array.length(); i++) {

                        JSONObject users = array.getJSONObject(i);


                        pname=users.getString("pname");
                        disease=users.getString("pdisease");
                        nurse=users.getString("nurse");
                        ncontact=users.getString("ncontact");
                        medicine=users.getString("medicine");

                    }


                } catch (JSONException e) {
                    e.printStackTrace();
                }
                setdetails();
            }
        }
        Loadpatientdetails lp = new Loadpatientdetails();
        lp.execute();
    }
    private void setdetails()
    {
        tv_pname.setText(pname);
        tv_disease.setText(disease);
        tv_medcine.setText(medicine);
        tv_nurse.setText(nurse);
        tv_ncontact.setText(ncontact);

    }
}