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
public class TutorialHome extends AppCompatActivity {
    List<Tutoriallist> tutoriallists;
    RecyclerView recyclerView;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_tutorial_home);
        recyclerView = findViewById(R.id.recycler_tutorials);
        recyclerView.setHasFixedSize(true);
        TutoriallistAdapter tutoriallistAdapter = new TutoriallistAdapter(TutorialHome.this, tutoriallists);
        //recyclerView.setLayoutManager(new LinearLayoutManager(this));
        recyclerView.setLayoutManager(new GridLayoutManager(this,2));


        tutoriallists = new ArrayList<>();
        loadTutorial();
    }
    private void loadTutorial()
    {
        class LoadTutorial extends AsyncTask<Void, Void, String>
        {
            ProgressBar progressBar = findViewById(R.id.prog_bar_tuthome);

            @Override
            protected String doInBackground(Void... voids)
            {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params  = new HashMap<>();


                return requestHandler.sendPostRequest(URLs.URL_VIEW_TUTORIAL, params);
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

                        tutoriallists.add(new Tutoriallist(
                                users.getInt("tut_id"),
                                users.getString("tut_name"),
                                users.getString("tut_text"),
                                users.getString("tut_link")


                        ));
                    }


                    TutoriallistAdapter adapter = new TutoriallistAdapter(TutorialHome.this, tutoriallists);
                    recyclerView.setAdapter(adapter);
                    progressBar.setVisibility(View.GONE);
                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }
            }
        }
        LoadTutorial lt = new LoadTutorial();
        lt.execute();
    }
}