package com.example.patient;
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
public class TutoriallistAdapter extends RecyclerView.Adapter<TutoriallistAdapter.TutoriallistViewHolder>{

    private Context mCtx;
    private List<Tutoriallist> tutoriallists;

    public TutoriallistAdapter(Context mCtx, List<Tutoriallist> tutoriallists) {
        this.mCtx = mCtx;
        this.tutoriallists = tutoriallists;
    }
    @NonNull
    @Override
    public TutoriallistViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {

        LayoutInflater inflater = LayoutInflater.from(mCtx);
        View view = inflater.inflate(R.layout.tutoriallist, null );

        return new TutoriallistViewHolder(view);
    }
    @Override
    public void onBindViewHolder(@NonNull TutoriallistViewHolder holder, int position) {

        Tutoriallist tutoriallist = tutoriallists.get(position);


        holder.tv_title.setText(tutoriallist.getTutorialTitle());
        holder.tv_text.setText(tutoriallist.getTutorialText());

    }
    @Override
    public int getItemCount() {
        return tutoriallists.size();
    }
    class TutoriallistViewHolder extends RecyclerView.ViewHolder implements View.OnClickListener {

        private final Context context;
        TextView tv_title,tv_text;

        public TutoriallistViewHolder(View itemView) {
            super(itemView);

            context = itemView.getContext();
            itemView.setOnClickListener(this);
            tv_title = itemView.findViewById(R.id.text_tut_title);
            tv_text = itemView.findViewById(R.id.text_tut_text);
        }

        @Override
        public void onClick(View v) {

            Intent intent = new Intent();

            for (int i = 0; i < getItemCount(); i++) {
                if (v == itemView) {
                    intent = new Intent(context, TutorialActivity.class);
                    intent.putExtra("tut_id", tutoriallists.get(getLayoutPosition()).getTut_id());
                    intent.putExtra("tut_link", tutoriallists.get(getLayoutPosition()).getTutorialLink());
                    context.startActivity(intent);
                    break;
                }
            }
        }
    }
}
