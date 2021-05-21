package com.example.volunteer;

public class Transportlist {
    int pid,tr_id,ward,eid;
    String patient_name,patient_mobile,pat_place,pat_panchayath,pat_address,e_name;

    public Transportlist(int pid, int tr_id, int ward, int eid, String pat_name, String pat_mobile, String pat_place, String pat_panchayath, String pat_address, String e_name) {
        this.pid = pid;
        this.tr_id = tr_id;
        this.ward = ward;
        this.eid = eid;
        this.patient_name = pat_name;
        this.patient_mobile = pat_mobile;
        this.pat_place = pat_place;
        this.pat_panchayath = pat_panchayath;
        this.pat_address = pat_address;
        this.e_name = e_name;
    }

    public int getPid() {
        return pid;
    }

    public int getTr_id() {
        return tr_id;
    }

    public int getWard() {
        return ward;
    }

    public int getEid() {
        return eid;
    }

    public String getPatient_name() {
        return patient_name;
    }

    public String getPatient_mobile() {
        return patient_mobile;
    }

    public String getPat_place() {
        return pat_place;
    }

    public String getPat_panchayath() {
        return pat_panchayath;
    }

    public String getPat_address() {
        return pat_address;
    }

    public String getE_name() {
        return e_name;
    }
}
