package com.example.volunteer;

import androidx.appcompat.app.AppCompatActivity;

import android.os.Bundle;
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

public class TransportActivity extends AppCompatActivity {
    int vid;
    List<Transportlist> transportlists;
    RecyclerView recyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_transport);
        Volunteer volunteer  = SharedPrefManager.getInstance(this).getUser();
        vid = volunteer.getVid();
        recyclerView = findViewById(R.id.rv_transport);
        recyclerView.setHasFixedSize(true);
        recyclerView.setLayoutManager(new LinearLayoutManager(this));
        transportlists = new ArrayList<>();
        loadRequest();
    }
    private void loadRequest() {
        class LoadRequest extends AsyncTask<Void, Void, String> {
            ProgressBar progressBar = findViewById(R.id.pb_transport);

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("vid", String.valueOf(vid));

                return requestHandler.sendPostRequest(URLs.URL_VIEWREQUEST, params);
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

                        transportlists.add(new Transportlist (
                                users.getInt("pid"),
                                users.getInt("tr_id"),
                                users.getInt("ward"),
                                users.getInt("eid"),
                                users.getString("pname"),
                                users.getString("pmobile"),
                                users.getString("pplace"),
                                users.getString("ppanchayath"),
                                users.getString("paddress"),
                                users.getString("e_name")
                        ));
                    }


                    TransportlistAdapter adapter = new TransportlistAdapter(TransportActivity.this, transportlists);
                    recyclerView.setAdapter(adapter);
                    progressBar.setVisibility(View.GONE);
                } catch (JSONException e) {
                    e.printStackTrace();
                }
            }
        }
        LoadRequest lr = new LoadRequest();
        lr.execute();
    }
}