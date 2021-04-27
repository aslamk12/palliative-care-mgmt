package com.example.volunteer;

import androidx.appcompat.app.AppCompatActivity;
import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.AsyncTask;
import android.view.MenuItem;
import android.view.View;
import android.widget.ProgressBar;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.HashSet;
import java.util.List;



import com.google.android.material.bottomnavigation.BottomNavigationView;

import android.os.Bundle;

public class PatientActivty extends AppCompatActivity {
    int vid;
    List<Patientlist> patientlists;
    RecyclerView recyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient);

        Volunteer volunteer  = SharedPrefManager.getInstance(this).getUser();
        vid = volunteer.getVid();
        recyclerView = findViewById(R.id.rv_patientverify);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        patientlists = new ArrayList<>();
        loadPatients();
    }
    private void loadPatients() {
        class LoadPatients extends AsyncTask<Void, Void, String> {
            ProgressBar progressBar = findViewById(R.id.pb_patientverify);

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("vid", String.valueOf(vid));

                return requestHandler.sendPostRequest(URLs.URL_VIEWPATIENT, params);
            }

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressBar.setVisibility(View.VISIBLE);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                try {
                    JSONArray array = new JSONArray(s);
                    for (int i = 0; i < array.length(); i++) {

                        JSONObject users = array.getJSONObject(i);

                        patientlists.add(new Patientlist(
                                users.getInt("assv_id"),
                                users.getInt("pid"),
                                users.getString("pname"),
                                users.getString("pgender"),
                                users.getString("pdisease")
                                ));
                    }


                    PatientlistAdapter adapter = new PatientlistAdapter(PatientActivty.this, patientlists);
                    recyclerView.setAdapter(adapter);
                    progressBar.setVisibility(View.GONE);
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }
        LoadPatients lp = new LoadPatients();
        lp.execute();
    }
}