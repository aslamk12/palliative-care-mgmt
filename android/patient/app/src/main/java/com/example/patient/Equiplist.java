package com.example.patient;

public class Equiplist {
    int eid;
    String e_name,image;

    public Equiplist(int eid, String e_name, String image) {
        this.eid = eid;
        this.e_name = e_name;
        this.image = image;
    }

    public int getEid() {
        return eid;
    }

    public String getE_name() {
        return e_name;
    }

    public String getImage() {
        return image;
    }
}
