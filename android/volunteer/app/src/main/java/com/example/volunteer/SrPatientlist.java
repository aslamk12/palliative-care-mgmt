package com.example.volunteer;


public class SrPatientlist {
    int pid,vid,assv_id,ward;
    String pat_name,pat_mobile,pat_dob,pat_gender,pat_place,pat_panchayath,pat_address,pat_disease;

    public SrPatientlist(int assv_id, int pid,  String pat_name, String pat_mobile, String pat_dob, String pat_gender, String pat_place, String pat_panchayath, String pat_address, String pat_disease, int ward) {
        this.assv_id = assv_id;
        this.pid = pid;
        this.pat_name = pat_name;
        this.pat_mobile = pat_mobile;
        this.pat_dob = pat_dob;
        this.pat_gender = pat_gender;
        this.pat_place = pat_place;
        this.pat_panchayath = pat_panchayath;
        this.pat_address = pat_address;
        this.pat_disease = pat_disease;
        this.ward = ward;

    }
    public int getAssv_id() {
        return assv_id;
    }

    public int getPid() {
        return pid;
    }

    public String getPat_name() {
        return pat_name;
    }

    public String getPat_mobile() {
        return pat_mobile;
    }

    public String getPat_dob() {
        return pat_dob;
    }

    public String getPat_gender() {
        return pat_gender;
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

    public String getPat_disease() { return pat_disease; }

    public int getWard() { return ward; }

    public SrPatientlist( int assv_id,int pid, String pat_name, String pat_gender, String pat_disease) {
        this.assv_id = assv_id;
        this.pid = pid;
        this.pat_name = pat_name;
        this.pat_gender = pat_gender;
        this.pat_disease = pat_disease;
    }


}
