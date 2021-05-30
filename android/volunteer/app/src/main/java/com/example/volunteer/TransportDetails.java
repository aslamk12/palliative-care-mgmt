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

public class TransportDetails extends AppCompatActivity {
    int vid,pid,ward,tr_id,e_id,ct_id;
    String pname,mobile,place,address,panchayath,equipment;
    TextView tv_pname,tv_mobile,tv_place,tv_ward,tv_panchayath,tv_equipment,tv_address;
    Button bt_confirmtrans;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_transport_details);
        Volunteer volunteer  = SharedPrefManager.getInstance(this).getUser();
        vid = volunteer.getVid();
        pid=getIntent().getExtras().getInt("pid");
        ward=getIntent().getExtras().getInt("ward");
        tr_id=getIntent().getExtras().getInt("tr_id");
        e_id=getIntent().getExtras().getInt("eid");
        pname=getIntent().getExtras().getString("pname");
        mobile=getIntent().getExtras().getString("mobile");
        place=getIntent().getExtras().getString("place");
        address=getIntent().getExtras().getString("address");
        panchayath=getIntent().getExtras().getString("panchayath");
        equipment=getIntent().getExtras().getString("equip");
        bt_confirmtrans= findViewById(R.id.btn_transconfirm);
        tv_pname = findViewById(R.id.tv_trpatname_real);
        tv_mobile = findViewById(R.id.tv_trmobile_real);
        tv_ward = findViewById(R.id.tv_trward_real);
        tv_place = findViewById(R.id.tv_trplace_real);
        tv_equipment = findViewById(R.id.tv_trequipment_real);
        tv_panchayath = findViewById(R.id.tv_trpanchayath_real);
        tv_address = findViewById(R.id.tv_traddress_real);
        setdetails();
        bt_confirmtrans.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                confirmtransport();
            }
        });
    }

    private void setdetails()
    {
        tv_pname.setText(pname);
        tv_mobile.setText(mobile);
        tv_place.setText(place);
        tv_panchayath.setText(panchayath);
        tv_address.setText(address);
        tv_equipment.setText(equipment);
        tv_ward.setText(String.valueOf(ward));

    }
    private void confirmtransport()
    {

        class Confirmtransport extends AsyncTask<Void, Void, String> {

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String, String> params = new HashMap<>();

                params.put("tr_id", String.valueOf(tr_id));
                params.put("vid", String.valueOf(vid));



                return requestHandler.sendPostRequest(URLs.URL_CONFIRMTRANSPORT, params);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                try {
                    JSONArray array = new JSONArray(s);
                    for (int i = 0; i < array.length(); i++) {

                        JSONObject users = array.getJSONObject(i);
                        pid = users.getInt("pid");

                        Toast.makeText(getApplicationContext(), "transport confirmed succesfully", Toast.LENGTH_SHORT).show();
                        Intent cintent = new Intent(TransportDetails.this,TransporthomeActivity.class);
                        startActivity(cintent);
                    }

                } catch (JSONException e) {
                    e.printStackTrace();
                }

            }
        }
        Confirmtransport  cp = new Confirmtransport();
        cp.execute();


    }
}