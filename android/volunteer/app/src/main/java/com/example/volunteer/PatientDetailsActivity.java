package com.example.volunteer;

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

public class PatientDetailsActivity extends AppCompatActivity {
    int assv_id,vid,pid,ward;
    String pname,mobile,dob,gender,place,address,panchayath,disease;
    TextView tv_pname,tv_mobile,tv_gender,tv_place,tv_dob,tv_ward,tv_panchayath,tv_disease,tv_address;
    Button bt_confirm;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_patient_details);
        Volunteer volunteer  = SharedPrefManager.getInstance(this).getUser();
        vid = volunteer.getVid();
        assv_id=getIntent().getExtras().getInt("assv_id");
        pid=getIntent().getExtras().getInt("pid");
        pname=getIntent().getExtras().getString("pname");
        bt_confirm= findViewById(R.id.btn_confirm);
        tv_pname = findViewById(R.id.tv_vpatname_real);
        tv_disease = findViewById(R.id.tv_vdisease__real);
        tv_mobile = findViewById(R.id.tv_vmobile_real);
        tv_gender = findViewById(R.id.tv_vgender_real);
        tv_place = findViewById(R.id.tv_vplace_real);
        tv_dob = findViewById(R.id.tv_vdob_real);
        tv_ward = findViewById(R.id.tv_vward_real);
        tv_panchayath = findViewById(R.id.tv_vpanchayath_real);
        tv_address = findViewById(R.id.tv_vaddress_real);
        loadpatientdetails();
        bt_confirm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                confirmpatient();
            }
        });
    }
    private void loadpatientdetails() {
        class Loadpatientdetails extends AsyncTask<Void, Void, String> {

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();
                params.put("pid", String.valueOf(pid));

                return requestHandler.sendPostRequest(URLs.URL_VIEWPATIENTDETAILS, params);
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


                        pid=users.getInt("pid");
                        pname=users.getString("pname");
                        mobile=users.getString("pmobile");
                        dob=users.getString("pdob");
                        gender=users.getString("pgender");
                        place=users.getString("pplace");
                        panchayath=users.getString("ppanchayath");
                        address=users.getString("paddress");
                        disease=users.getString("pdisease");
                        ward=users.getInt("pward");

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
        tv_mobile.setText(mobile);
        tv_gender.setText(gender);
        tv_dob.setText(dob);
        tv_place.setText(place);
        tv_panchayath.setText(panchayath);
        tv_address.setText(address);
        tv_disease.setText(disease);
        tv_ward.setText(String.valueOf(ward));

    }
    private void confirmpatient()
    {

            class Confirmpatient extends AsyncTask<Void, Void, String> {

                @Override
                protected String doInBackground(Void... voids) {

                    RequestHandler requestHandler = new RequestHandler();

                    HashMap<String, String> params = new HashMap<>();

                    params.put("pid", String.valueOf(pid));
                    params.put("pmobile", String.valueOf(mobile));



                    return requestHandler.sendPostRequest(URLs.URL_CONFIRMPATIENT, params);
                }

                @Override
                protected void onPostExecute(String s) {
                    super.onPostExecute(s);

                    try {
                        JSONArray array = new JSONArray(s);
                        for (int i = 0; i < array.length(); i++) {

                            JSONObject users = array.getJSONObject(i);
                            pid = users.getInt("pid");

                            Toast.makeText(getApplicationContext(), "patient confirmed succesfully", Toast.LENGTH_SHORT).show();
                            Intent cintent = new Intent(PatientDetailsActivity.this,PatientVerificationActivity.class);
                            startActivity(cintent);
                        }

                    } catch (JSONException e) {
                        e.printStackTrace();
                    }

                }
            }
            Confirmpatient  cp = new Confirmpatient();
            cp.execute();


    }

}