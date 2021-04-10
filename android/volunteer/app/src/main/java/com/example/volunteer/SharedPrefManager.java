package com.example.volunteer;

import android.content.Context;
import android.content.Intent;
import android.content.SharedPreferences;

public class SharedPrefManager {

        private static final String SHARED_PREF_NAME = "volunteersharedpref";
        private static final String KEY_NAME = "keyname";
        private static final String KEY_MOBILE = "keymobile";
        private static final String KEY_PLACE = "keyplace";
        private static final String KEY_DOB = "keydob";
        private static final String KEY_PANCHAYATH = "keypanchayath";
        private static final String KEY_ADDRESS = "keyaddress";
        private static final String KEY_VOLID = "keyvolid";

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

        public void volunteerLogin(Volunteer volunteer)
        {
            SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
            SharedPreferences.Editor editor = sharedPreferences.edit();
            editor.putInt(KEY_VOLID, volunteer.getVid());
            editor.putString(KEY_NAME, volunteer.getFull_name());
            editor.putString(KEY_MOBILE, volunteer.getMobile());
            editor.putString(KEY_PLACE, volunteer.getPlace());
            editor.putString(KEY_DOB, volunteer.getDob());
            editor.putString(KEY_PANCHAYATH, volunteer.getPanchayath());
            editor.putString(KEY_ADDRESS, volunteer.getAddress());
            editor.apply();
        }

        public boolean isLoggedIn()
        {
            SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
            return sharedPreferences.getString(KEY_NAME,null) != null;
        }

        public Volunteer getUser()
        {
            SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
            return new Volunteer(
                    sharedPreferences.getInt(KEY_VOLID,-1),
                    sharedPreferences.getString(KEY_NAME,null),
                    sharedPreferences.getString(KEY_MOBILE,null),
                    sharedPreferences.getString(KEY_PLACE,null),
                    sharedPreferences.getString(KEY_DOB,null),
                    sharedPreferences.getString(KEY_PANCHAYATH,null),
                    sharedPreferences.getString(KEY_ADDRESS,null)

                    );
        }

        public void logout()
        {
            SharedPreferences sharedPreferences = mCtx.getSharedPreferences(SHARED_PREF_NAME,Context.MODE_PRIVATE);
            SharedPreferences.Editor editor = sharedPreferences.edit();
            editor.clear();
            editor.apply();
            mCtx.startActivity(new Intent(mCtx, MainActivity.class));
        }


    }
