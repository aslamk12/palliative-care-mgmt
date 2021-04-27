package com.example.patient;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

public class SharedPrefManager {
    private static final String SHARED_PREF_NAME = "patientsharedpref";
    private static final String KEY_PNAME = "keypname";
    private static final String KEY_DOB = "keydob";
    private static final String KEY_GENDER = "keygender";
    private static final String KEY_ADDRESS = "keyaddress";
    private static final String KEY_PLACE = "keyplace";
    private static final String KEY_PINCODE = "keypincode";
    private static final String KEY_PANCHAYATH = "keyuserpanchayath";
    private static final String KEY_WARD = "keyward";
    private static final String KEY_MOBILE = "keymobile";
    private static final String KEY_DISEASE = "keydisease";
    private static final String KEY_PID = "keypid";

    private static SharedPrefManager mInstance;
    private static Context mCtx;

    private SharedPrefManager(Context context)
    {
        mCtx = context;
    }

    public static synchronized SharedPrefManager getInstance(Context context)
    {
        if (mInstance == null)
        {
            mInstance = new SharedPrefManager(context);
        }

        return mInstance;
    }

    public void patientLogin(Patient patient)
    {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.putInt(KEY_PID, patient.getPid());
        editor.putString(KEY_PNAME, patient.getPname());
        editor.putString(KEY_DOB, patient.getDob());
        editor.putString(KEY_GENDER, patient.getGender());
        editor.putString(KEY_ADDRESS, patient.getAddress());
        editor.putString(KEY_PLACE, patient.getPlace());
        editor.putString(KEY_PINCODE, patient.getPincode());
        editor.putString(KEY_PANCHAYATH, patient.getPanchayath());
        editor.putString(KEY_WARD, patient.getWard());
        editor.putString(KEY_MOBILE, patient.getMobile());
        editor.putString(KEY_DISEASE, patient.getDisease());
        editor.apply();
    }

    public boolean isLoggedIn()
    {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return sharedPreferences.getString(KEY_PNAME,null) != null;
    }

    public Patient getPatient()
    {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        return new Patient(
                sharedPreferences.getInt(KEY_PID,-1),
                sharedPreferences.getString(KEY_PNAME,null),
                sharedPreferences.getString(KEY_DOB,null),
                sharedPreferences.getString(KEY_GENDER,null),
                sharedPreferences.getString(KEY_ADDRESS,null),
                sharedPreferences.getString(KEY_PLACE,null),
                sharedPreferences.getString(KEY_PINCODE,null),
                sharedPreferences.getString(KEY_PANCHAYATH,null),
                sharedPreferences.getString(KEY_WARD,null),
                sharedPreferences.getString(KEY_MOBILE,null),
                sharedPreferences.getString(KEY_DISEASE,null)
        );
    }

    public void logout()
    {
        SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
        SharedPreferences.Editor editor = sharedPreferences.edit();
        editor.clear();
        editor.apply();
        mCtx.startActivity(new Intent(mCtx,MainActivity.class));
    }
}
