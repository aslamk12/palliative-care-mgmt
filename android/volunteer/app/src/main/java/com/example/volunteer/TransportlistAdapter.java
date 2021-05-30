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

public class TransportlistAdapter extends RecyclerView.Adapter<TransportlistAdapter.TransportlistViewHolder> {
    private Context mCtx;
    private List<Transportlist> transportlists;


    public TransportlistAdapter(Context mCtx, List<Transportlist> transportlists) {
        this.mCtx = mCtx;
        this.transportlists = transportlists;
    }

    @NonNull
    @Override
    public TransportlistAdapter.TransportlistViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.transportlist, null);

        return new TransportlistAdapter.TransportlistViewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull TransportlistAdapter.TransportlistViewHolder holder, final int position) {

        Transportlist transportlist = transportlists.get(position);


        holder.tv_patientname.setText(transportlist.getPatient_name());
        holder.tv_equip.setText(transportlist.getE_name());
        holder.tv_mobile.setText(transportlist.getPatient_mobile());
        holder.tv_place.setText(transportlist.getPat_place());
        holder.tv_panchayath.setText(transportlist.getPat_panchayath());
        holder.tv_ward.setText(String.valueOf(transportlist.getWard()));
        holder.tv_address.setText(transportlist.getPat_address());
        holder.btn_confirm.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {

                Intent intent;
                Context context = mCtx;

                intent = new Intent(context, TransportDetails.class);
                intent.putExtra("pid",transportlist.getPid());
                intent.putExtra("pname",transportlist.getPatient_name());
                intent.putExtra("mobile",transportlist.getPatient_mobile());
                intent.putExtra("equip",transportlist.getE_name());
                intent.putExtra("place",transportlist.getPat_place());
                intent.putExtra("panchayath",transportlist.getPat_panchayath());
                intent.putExtra("ward",transportlist.getWard());
                intent.putExtra("address",transportlist.getPat_address());
                intent.putExtra("eid",transportlist.getEid());
                intent.putExtra("tr_id",transportlist.getTr_id());
                intent.setFlags(Intent.FLAG_ACTIVITY_NEW_TASK);
                mCtx.startActivity(intent);
            }
        });




    }

    @Override
    public int getItemCount() {
        return transportlists.size();
    }

    class TransportlistViewHolder extends RecyclerView.ViewHolder {

        private final Context context;
        TextView tv_patientname, tv_equip, tv_mobile,tv_place,tv_panchayath,tv_address,tv_ward;
        Button btn_confirm;

        public TransportlistViewHolder(View itemView) {
            super(itemView);

            context = itemView.getContext();
            tv_patientname = itemView.findViewById(R.id.tv_patientname_real);
            tv_equip = itemView.findViewById(R.id.tv_equip_real);
            tv_mobile = itemView.findViewById(R.id.tv_pat_mobile_real);
            tv_place = itemView.findViewById(R.id.tv_pat_place_real);
            tv_panchayath = itemView.findViewById(R.id.tv_pat_panchayath_real);
            tv_ward = itemView.findViewById(R.id.tv_pat_ward_real);
            tv_address = itemView.findViewById(R.id.tv_pat_address_real);
            btn_confirm = itemView.findViewById(R.id.confirm_request);
        }



    }
}
