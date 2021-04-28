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
    private List<SrPatientlist> srpatientlists;


    public SRPatientlistAdapter(Context mCtx, List<SrPatientlist> srpatientlists) {
        this.mCtx = mCtx;
        this.srpatientlists = srpatientlists;
    }

    @NonNull
    @Override
    public SRPatientlistAdapter.SRPatientlistViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.sendreportlist, null);

        return new SRPatientlistAdapter.SRPatientlistViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull SRPatientlistAdapter.SRPatientlistViewHolder holder, final int position) {

        SrPatientlist srpatientlist = srpatientlists.get(position);


        holder.tv_patname.setText(srpatientlist.getPat_name());
        holder.tv_gender.setText(srpatientlist.getPat_gender());
        holder.tv_disease.setText(srpatientlist.getPat_disease());
        holder.sendreport.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent;
                Context context = mCtx;

                intent = new Intent(context,SendReportActivity.class);
                intent.putExtra("assv_id",srpatientlist.getAssv_id());
                intent.putExtra("pid",srpatientlist.getPid());
                intent.putExtra("pname",srpatientlist.getPat_name());
                intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                mCtx.startActivity(intent);
            }
        });




    }

    @Override
    public int getItemCount() {
        return srpatientlists.size();
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
