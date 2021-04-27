package com.example.patient;

public class Patient {
    private int pid;

    private String pname,dob,gender,address,place,pincode,panchayath,ward,mobile,disease;

    public Patient(int pid, String pname, String dob, String gender, String address, String place, String pincode, String panchayath, String ward, String mobile, String disease) {
        this.pid = pid;
        this.pname = pname;
        this.dob = dob;
        this.gender = gender;
        this.address = address;
        this.place = place;
        this.pincode = pincode;
        this.panchayath = panchayath;
        this.ward = ward;
        this.mobile = mobile;
        this.disease = disease;
    }

    public int getPid() {
        return pid;
    }

    public String getPname() {
        return pname;
    }

    public String getDob() {
        return dob;
    }

    public String getGender() {
        return gender;
    }

    public String getAddress() {
        return address;
    }

    public String getPlace() {
        return place;
    }

    public String getPincode() {
        return pincode;
    }

    public String getPanchayath() {
        return panchayath;
    }

    public String getWard() {
        return ward;
    }

    public String getMobile() {
        return mobile;
    }
    public String getDisease() { return disease; }
}
