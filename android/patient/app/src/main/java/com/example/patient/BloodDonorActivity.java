package com.example.patient;

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


import android.os.Bundle;

import com.google.android.material.bottomnavigation.BottomNavigationView;

public class BloodDonorActivity extends AppCompatActivity {
    List<Bloodlist> bloodlists;
    RecyclerView recyclerView;
    int loggedIn_user;
    String bd_names,group;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_blood_donor);
        group = getIntent().getExtras().getString("group");


        recyclerView = findViewById(R.id.recycler_bd);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));

        bloodlists = new ArrayList<>();
        loadBdonor();
    }
    private void loadBdonor() {
        class LoadBdonor extends AsyncTask<Void, Void, String> {
            ProgressBar progressBar = findViewById(R.id.prog_bar_bd);

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("group",group);

                return requestHandler.sendPostRequest(URLs.URL_VIEW_BD, params);
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

                        bloodlists.add(new Bloodlist(
                                users.getInt("bd_id"),
                                users.getString("bd_name"),
                                users.getString("bd_contact"),
                                users.getString("bd_place"),
                                users.getString("bd_group")

                        ));
                    }


                    BloodlistAdapter adapter = new BloodlistAdapter(BloodDonorActivity.this, bloodlists);
                    recyclerView.setAdapter(adapter);
                    progressBar.setVisibility(View.GONE);
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }
        LoadBdonor lc = new LoadBdonor();
        lc.execute();
    }
}