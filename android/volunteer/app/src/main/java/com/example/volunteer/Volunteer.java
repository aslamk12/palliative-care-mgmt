package com.example.volunteer;

public class Volunteer {
    private int vid;

    private String full_name,mobile,place,dob,panchayath,address;

    public Volunteer(int vid, String full_name, String mobile, String place, String dob, String panchayath, String address) {
        this.vid = vid;
        this.full_name = full_name;
        this.mobile = mobile;
        this.place = place;
        this.dob = dob;
        this.panchayath = panchayath;
        this.address = address;
    }

    public int getVid() {
        return vid;
    }

    public String getFull_name() {
        return full_name;
    }

    public String getMobile() {
        return mobile;
    }

    public String getPlace() {
        return place;
    }

    public String getDob() {
        return dob;
    }

    public String getPanchayath() {
        return panchayath;
    }

    public String getAddress() {
        return address;
    }
}
