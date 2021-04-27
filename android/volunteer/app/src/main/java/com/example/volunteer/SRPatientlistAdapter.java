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

import java.util.List;

public class SRPatientlistAdapter extends RecyclerView.Adapter<SRPatientlistAdapter.SRPatientlistViewHolder> {
    private Context mCtx;
    private List<Patientlist> patientlists;


    public SRPatientlistAdapter(Context mCtx, List<Patientlist> patientlists) {
        this.mCtx = mCtx;
        this.patientlists = patientlists;
    }

    @NonNull
    @Override
    public SRPatientlistAdapter.SRPatientlistViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.patientlist, null);

        return new SRPatientlistAdapter.SRPatientlistViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull SRPatientlistAdapter.SRPatientlistViewHolder holder, final int position) {

        Patientlist patientlist = patientlists.get(position);


        holder.tv_patname.setText(patientlist.getPat_name());
        holder.tv_gender.setText(patientlist.getPat_gender());
        holder.tv_disease.setText(patientlist.getPat_disease());
        holder.sendreport.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent;
                Context context = mCtx;

                intent = new Intent(context, PatientDetailsActivity.class);
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

    class SRPatientlistViewHolder extends RecyclerView.ViewHolder {

        private final Context context;
        TextView tv_patname, tv_gender, tv_disease;
        Button sendreport;

        public SRPatientlistViewHolder(View itemView) {
            super(itemView);

            context = itemView.getContext();
            tv_patname = itemView.findViewById(R.id.tv_spatname_real);
            tv_gender = itemView.findViewById(R.id.tv_sgender_real);
            tv_disease = itemView.findViewById(R.id.tv_sdisease_real);
            sendreport = itemView.findViewById(R.id.sendreport);
        }



    }
}
