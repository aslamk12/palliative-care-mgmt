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
public class EquiplistAdapter  extends RecyclerView.Adapter<EquiplistAdapter.EquipViewHolder>{

    private Context mCtx;
    private List<Equiplist> equiplists;

    public EquiplistAdapter(Context mCtx, List<Equiplist> equiplists) {
        this.mCtx = mCtx;
        this.equiplists = equiplists;
    }
    @NonNull
    @Override
    public EquiplistAdapter.EquipViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.equiplist, null );

        return new EquiplistAdapter.EquipViewHolder(view);
    }
    @Override
    public void onBindViewHolder(@NonNull EquiplistAdapter.EquipViewHolder holder, int position) {

        Equiplist equiplist = equiplists.get(position);
        Glide.with(mCtx)
                .load(equiplist.getImage())
                .into(holder.imageView);

        holder.tv_ename.setText(equiplist.getE_name());

    }
    @Override
    public int getItemCount() {
        return equiplists.size();
    }
    class EquipViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {

        private final Context context;
        TextView tv_ename;
        ImageView imageView;

        public EquipViewHolder(View itemView) {
            super(itemView);

            context = itemView.getContext();
            itemView.setOnClickListener(this);
            imageView = itemView.findViewById(R.id.iv_equip);
            tv_ename = itemView.findViewById(R.id.tv_ename);
        }

        @Override
        public void onClick(View v) {

            Intent intent = new Intent();

            for (int i = 0; i < getItemCount(); i++) {
                if (v == itemView) {
                    intent = new Intent(context, EquipmentDetails.class);
                    intent.putExtra("product_id", equiplists.get(getLayoutPosition()).getEid());
                    context.startActivity(intent);
                    break;
                }
            }
        }
    }
}
