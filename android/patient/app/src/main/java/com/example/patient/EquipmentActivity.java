package com.example.patient;

import androidx.appcompat.app.AppCompatActivity;
import androidx.annotation.NonNull;
import androidx.recyclerview.widget.GridLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.content.Intent;
import android.os.AsyncTask;
import android.view.MenuItem;
import android.widget.ProgressBar;
import android.widget.TextView;
import android.util.Log;
import android.util.Patterns;
import android.view.View;
import android.os.Handler;

import com.google.android.material.bottomnavigation.BottomNavigationView;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import android.os.Bundle;

public class EquipmentActivity extends AppCompatActivity {
    List<Equiplist> equiplists;
    RecyclerView recyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_equipment);
        recyclerView = findViewById(R.id.rv_equip);
        recyclerView.setHasFixedSize(true);
        EquiplistAdapter equipadapter = new EquiplistAdapter(EquipmentActivity.this, equiplists);
        //recyclerView.setLayoutManager(new LinearLayoutManager(this));
        recyclerView.setLayoutManager(new GridLayoutManager(this,2));


        equiplists = new ArrayList<>();
        loadEquip();
    }
    private void loadEquip()
    {
        class LoadEquip extends AsyncTask<Void, Void, String>
        {
            ProgressBar progressBar = findViewById(R.id.prog_bar_equip);

            @Override
            protected String doInBackground(Void... voids)
            {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params  = new HashMap<>();


                return requestHandler.sendPostRequest(URLs.URL_VIEW_EQUIP, params);
            }

            @Override
            protected void onPreExecute() {
                super.onPreExecute();

                progressBar.setVisibility(View.VISIBLE);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);
                try
                {
                    JSONArray array = new JSONArray(s);
                    for(int i=0; i < array.length(); i++)
                    {

                        JSONObject users = array.getJSONObject(i);

                        equiplists.add(new Equiplist(
                                users.getInt("eid"),
                                users.getString("e_name"),
                                users.getString("image")

                        ));
                    }


                    EquiplistAdapter adapter = new EquiplistAdapter(EquipmentActivity.this, equiplists);
                    recyclerView.setAdapter(adapter);
                    progressBar.setVisibility(View.GONE);
                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }
            }
        }
        LoadEquip le = new LoadEquip();
        le.execute();
    }
}