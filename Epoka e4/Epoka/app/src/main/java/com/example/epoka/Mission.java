package com.example.epoka;

import android.app.Activity;
import android.content.Intent;
import android.os.Bundle;
import android.view.View;

public class Mission extends Activity{
    @Override
    protected void onCreate(Bundle savedInstanceState){
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_mission);
    }

    public void ajout(View view){
        Intent intent = new Intent(getApplicationContext(), AjoutActivity.class);
        Bundle extra = getIntent().getExtras();
        intent.putExtra("no",extra.getInt("no"));
        startActivity(intent);
        finish();
    }
    public void quitter(View view){
        finish();
        System.exit(0);
    }
}
