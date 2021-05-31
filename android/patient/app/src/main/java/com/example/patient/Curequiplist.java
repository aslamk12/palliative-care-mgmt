package com.example.patient;

public class Curequiplist {
    private int tr_id;
    private String e_name,date,image;

    public Curequiplist(int tr_id, String e_name, String date, String image) {
        this.tr_id = tr_id;
        this.e_name = e_name;
        this.date = date;
        this.image = image;
    }

    public int getTr_id() {
        return tr_id;
    }

    public String getE_name() {
        return e_name;
    }

    public String getDate() {
        return date;
    }

    public String getImage() {
        return image;
    }
}
