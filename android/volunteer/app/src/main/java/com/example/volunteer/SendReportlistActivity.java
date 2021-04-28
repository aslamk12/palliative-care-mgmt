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

public class SendReportlistActivity extends AppCompatActivity {
    int vid;
    List<SrPatientlist> srpatientlists;
    RecyclerView recyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_send_reportlist);
        Volunteer volunteer  = SharedPrefManager.getInstance(this).getUser();
        vid = volunteer.getVid();
        recyclerView = findViewById(R.id.rv_sendreportlist);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        srpatientlists = new ArrayList<>();
        loadPatients();
    }
    private void loadPatients() {
        class LoadPatients extends AsyncTask<Void, Void, String> {
            ProgressBar progressBar = findViewById(R.id.pb_srlist);

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("vid", String.valueOf(vid));

                return requestHandler.sendPostRequest(URLs.URL_VIEWSRPATIENT, params);
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

                        srpatientlists.add(new SrPatientlist(
                                users.getInt("assv_id"),
                                users.getInt("pid"),
                                users.getString("pname"),
                                users.getString("pgender"),
                                users.getString("pdisease")
                        ));
                    }


                    SRPatientlistAdapter adapter = new SRPatientlistAdapter(SendReportlistActivity.this, srpatientlists);
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