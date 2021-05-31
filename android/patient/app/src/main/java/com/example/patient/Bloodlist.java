package com.example.patient;

public class Bloodlist {
    int bd_id;
    String bd_name,bd_contact,bd_place,bd_group;

    public Bloodlist(int bd_id, String bd_name, String bd_contact, String bd_place, String bd_group) {
        this.bd_id = bd_id;
        this.bd_name = bd_name;
        this.bd_contact = bd_contact;
        this.bd_place = bd_place;
        this.bd_group = bd_group;
    }

    public int getBd_id() {
        return bd_id;
    }

    public String getBd_name() {
        return bd_name;
    }

    public String getBd_contact() {
        return bd_contact;
    }

    public String getBd_place() {
        return bd_place;
    }

    public String getBd_group() {
        return bd_group;
    }
}
