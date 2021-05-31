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

public class CurrentEquipActivity extends AppCompatActivity {
    List<Curequiplist> curequiplists;
    RecyclerView recyclerView;
    int loggedIn_user;
    String e_names;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_current_equip);
        Patient patient = SharedPrefManager.getInstance(this).getPatient();
        loggedIn_user = patient.getPid();

        recyclerView = findViewById(R.id.rv_curequip);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));

        curequiplists = new ArrayList<>();
        loadCat_products();
    }
    private void loadCat_products() {
        class LoadCat_products extends AsyncTask<Void, Void, String> {
            ProgressBar progressBar = findViewById(R.id.prog_bar_curequip);

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("pid",String.valueOf(loggedIn_user));

                return requestHandler.sendPostRequest(URLs.URL_CUREQUIP, params);
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

                        curequiplists.add(new Curequiplist(
                                users.getInt("tr_id"),
                                users.getString("e_name"),
                                users.getString("date"),
                                users.getString("image")

                        ));
                    }


                    CurequiplistAdapter adapter = new CurequiplistAdapter(CurrentEquipActivity.this, curequiplists);
                    recyclerView.setAdapter(adapter);
                    progressBar.setVisibility(View.GONE);
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }
        LoadCat_products lc = new LoadCat_products();
        lc.execute();
    }
}