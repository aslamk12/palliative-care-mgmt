package com.example.patient;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ImageView;
import android.widget.TextView;
import android.widget.ProgressBar;
import android.widget.Toast;
import android.content.Context;
import android.content.Intent;
import android.view.ContextMenu;
import androidx.annotation.NonNull;
import androidx.recyclerview.widget.RecyclerView;
import com.bumptech.glide.Glide;

import java.util.List;
public class BloodlistAdapter extends RecyclerView.Adapter<BloodlistAdapter.BloodViewHolder>{

    private Context mCtx;
    private List<Bloodlist> bloodlists;

    public BloodlistAdapter(Context mCtx, List<Bloodlist> bloodlists) {
        this.mCtx = mCtx;
        this.bloodlists = bloodlists;
    }
    @NonNull
    @Override
    public BloodlistAdapter.BloodViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.bloodlist, null );

        return new BloodlistAdapter.BloodViewHolder(view);
    }
    @Override
    public void onBindViewHolder(@NonNull BloodlistAdapter.BloodViewHolder holder, int position) {

        Bloodlist bloodlist = bloodlists.get(position);


        holder.tv_bdname.setText(bloodlist.getBd_name());
        holder.tv_bdcontact.setText(bloodlist.getBd_contact());
        holder.tv_bdplace.setText(bloodlist.getBd_place());
        holder.tv_bdgroup.setText(bloodlist.getBd_group());

    }
    @Override
    public int getItemCount() {
        return bloodlists.size();
    }
    class BloodViewHolder extends RecyclerView.ViewHolder {

        private final Context context;
        TextView tv_bdname, tv_bdgroup,tv_bdcontact,tv_bdplace;

        public BloodViewHolder(View itemView) {
            super(itemView);

            context = itemView.getContext();
            tv_bdname = itemView.findViewById(R.id.tv_bdname_real);
            tv_bdgroup = itemView.findViewById(R.id.tv_group_real);
            tv_bdcontact = itemView.findViewById(R.id.tv_bdcontact_real);
            tv_bdplace = itemView.findViewById(R.id.tv_bdplace_real);
        }



    }
}
