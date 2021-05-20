package com.example.patient;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.AsyncTask;
import android.os.Bundle;
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
public class EquipmentDetails extends AppCompatActivity {
    int eid,stock;
    int loggedIn_user;
    String ename,image,description;
    ImageView iv_equip;
    TextView tv_ename,tv_description,tv_stock;
    Button bt_sendreq;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_equipment_details);
        eid=getIntent().getExtras().getInt("eid");
        tv_ename=findViewById(R.id.equipment_name);
        tv_stock=findViewById(R.id.stcok_val);
        tv_description=findViewById(R.id.Description);
        iv_equip=findViewById(R.id.equipment_image);
        bt_sendreq=findViewById(R.id.send_request);

        loadequipmentdetails();
    }
    private void loadequipmentdetails()
    {
        class Loadequipmentdetails extends AsyncTask<Void,Void, String>
        {

            @Override
            protected String doInBackground(Void... voids) {

                RequestHandler requestHandler = new RequestHandler();

                HashMap<String,String> params = new HashMap<>();

                params.put("eid", String.valueOf(eid));


                return requestHandler.sendPostRequest(URLs.URL_EQUIPMENT_DETAILS, params);
            }

            @Override
            protected void onPostExecute(String s) {
                super.onPostExecute(s);

                try
                {
                    JSONArray array = new JSONArray(s);
                    for (int i = 0; i < array.length(); i++) {

                        JSONObject users = array.getJSONObject(i);
                        ename = users.getString("e_name");
                        image = users.getString("image");
                        stock = users.getInt("stock");
                        description = users.getString("descp");
                    }

                }
                catch (JSONException e)
                {
                    e.printStackTrace();
                }

                setdetails();


            }
        }
        Loadequipmentdetails led = new Loadequipmentdetails();
        led.execute();
    }
    private void setdetails()
    {
        tv_ename.setText(ename);
        tv_stock.setText(String.valueOf(stock));
        tv_description.setText(description);

        Glide.with(EquipmentDetails.this)
                .load(image)
                .into(iv_equip);
    }
}