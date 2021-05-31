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

public class CurequiplistAdapter extends RecyclerView.Adapter<CurequiplistAdapter.CurequipViewHolder>{

    private Context mCtx;
    private List<Curequiplist> curequiplists;

    public CurequiplistAdapter(Context mCtx, List<Curequiplist> curequiplists) {
        this.mCtx = mCtx;
        this.curequiplists = curequiplists;
    }
    @NonNull
    @Override
    public CurequiplistAdapter.CurequipViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.curequiplist, null );

        return new CurequiplistAdapter.CurequipViewHolder(view);
    }
    @Override
    public void onBindViewHolder(@NonNull CurequiplistAdapter.CurequipViewHolder holder, int position) {

        Curequiplist curequiplist = curequiplists.get(position);
        Glide.with(mCtx)
                .load(curequiplist.getImage())
                .into(holder.imageView);

        holder.tv_ename.setText(curequiplist.getE_name());
        holder.tv_date.setText(curequiplist.getDate());

    }
    @Override
    public int getItemCount() {
        return curequiplists.size();
    }
    class CurequipViewHolder extends RecyclerView.ViewHolder {

        private final Context context;
        TextView tv_ename, tv_date;
        ImageView imageView;

        public CurequipViewHolder(View itemView) {
            super(itemView);

            context = itemView.getContext();
            imageView = itemView.findViewById(R.id.iv_curequip);
            tv_ename = itemView.findViewById(R.id.tv_curequip_name);
            tv_date = itemView.findViewById(R.id.tv_curequip_date);
        }



    }


}
