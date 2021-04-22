package com.example.volunteer;
import android.content.Context;
import android.os.AsyncTask;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.TextView;
import android.content.Context;
import android.content.Intent;
import android.view.ContextMenu;
import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;



import java.util.HashMap;
import java.util.List;

public class PatientlistAdapter extends RecyclerView.Adapter<PatientlistAdapter.PatientlistViewHolder> {
    private Context mCtx;
    private List<Patientlist> patientlists;


    public PatientlistAdapter(Context mCtx, List<Patientlist> patientlists) {
        this.mCtx = mCtx;
        this.patientlists = patientlists;
    }

    @NonNull
    @Override
    public PatientlistAdapter.PatientlistViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.patientlist, null);

        return new PatientlistAdapter.PatientlistViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull PatientlistAdapter.PatientlistViewHolder holder, final int position) {

        Patientlist patientlist = patientlists.get(position);


        holder.tv_patname.setText(patientlist.getPat_name());
        holder.tv_mobile.setText(patientlist.getPat_mobile());
        holder.tv_DOB.setText(patientlist.getPat_dob());
        holder.tv_gender.setText(patientlist.getPat_gender());
        holder.tv_place.setText(patientlist.getPat_place());
        holder.tv_panchayath.setText(patientlist.getPat_panchayath());
        holder.tv_ward.setText(String.valueOf(patientlist.getWard()));
        holder.tv_address.setText(patientlist.getPat_address());


        holder.sendreport.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent;
                Context context = mCtx;

                intent = new Intent(context, SendReportActivity.class);
                intent.putExtra("assv_id",patientlist.getAssv_id());
                intent.putExtra("pid",patientlist.getPid());
                intent.putExtra("pname",patientlist.getPat_name());
                intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                mCtx.startActivity(intent);
            }
        });

    }

    @Override
    public int getItemCount() {
        return patientlists.size();
    }

    class PatientlistViewHolder extends RecyclerView.ViewHolder {

        private final Context context;
        TextView tv_patname, tv_mobile, tv_DOB,tv_gender,tv_place,tv_panchayath,tv_ward,tv_address;
        Button sendreport;

        public PatientlistViewHolder(View itemView) {
            super(itemView);

            context = itemView.getContext();
            tv_patname = itemView.findViewById(R.id.tv_patname_real);
            tv_mobile = itemView.findViewById(R.id.tv_mobile_real);
            tv_DOB = itemView.findViewById(R.id.tv_dob_real);
            tv_gender = itemView.findViewById(R.id.tv_gender_real);
            tv_place = itemView.findViewById(R.id.tv_place_real);
            tv_panchayath = itemView.findViewById(R.id.tv_panchayath_real);
            tv_ward = itemView.findViewById(R.id.tv_ward_real);
            tv_address = itemView.findViewById(R.id.tv_address_real);
            sendreport = itemView.findViewById(R.id.sendreport);
        }
    }
}
