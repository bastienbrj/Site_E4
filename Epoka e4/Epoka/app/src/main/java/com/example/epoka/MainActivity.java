package com.example.epoka;

import android.app.Activity;
import android.content.Intent;
import android.os.StrictMode;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.TextView;
import android.widget.Toast;

import java.io.BufferedReader;
import java.io.InputStream;
import java.io.InputStreamReader;
import java.net.HttpURLConnection;
import java.net.URL;

public class MainActivity extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Button btCon = findViewById(R.id.btnConnexion);}
        /*btCon.setOnClickListener(new View.OnClickListener() {
            //@Override
            public void connexion(View view) {
//initialisation variable
                EditText no;
                EditText mdp;
                String urlSW;

                //récupération variable
                no =(EditText) findViewById(R.id.etLogin);
                mdp=(EditText) findViewById(R.id.etMdp);

                //connexion

                urlSW="http://172.16.47.12/Site_E4/connexion.php?pers_id=" + no.getText().toString()+"&pers_mdp=" + mdp.getText().toString();

                try {

                    StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
                    StrictMode.setThreadPolicy(policy);
                    // champs != vide
                    if(no.getText().toString() != "" && mdp.getText().toString()!=""){
                        InputStream is = null;
                        URL url = new URL(urlSW);
                        HttpURLConnection connexion = (HttpURLConnection)url.openConnection();
                        connexion.connect();
                        is=connexion.getInputStream();

                        BufferedReader br = new BufferedReader(new InputStreamReader(is));
                        String ligne = br.readLine();

                        // Vérification

                        try{
                            Integer.parseInt(ligne);
                            Intent intent = new Intent(getApplicationContext(), Mission.class);
                            intent.putExtra("no",ligne);
                            startActivity(intent);
                        } catch (Exception e2) {
                            Log.e("log_tag","Veuillez saisir des identifiants valides." + e2.toString());
                        }

                    }
                } catch (Exception e){
                    Log.e("log_tag", "Probleme connexion." + e.toString());
                }
            }
        });*/


   public void connexion(View view){
        //initialisation variable
        EditText no;
        EditText mdp;
        String urlSW;

        //récupération variable
        no =(EditText) findViewById(R.id.etLogin);
        mdp=(EditText) findViewById(R.id.etMdp);

        //connexion

        urlSW="http://172.16.47.12/Site_E4/connexion.php?pers_id=" + no.getText().toString()+"&pers_mdp=" + mdp.getText().toString();

        try {

            // champs != vide
            if(no.getText().toString() != "" && mdp.getText().toString()!=""){
                InputStream is = null;
                StrictMode.ThreadPolicy policy = new StrictMode.ThreadPolicy.Builder().permitAll().build();
                StrictMode.setThreadPolicy(policy);
                URL url = new URL(urlSW);
                HttpURLConnection connexion = (HttpURLConnection)url.openConnection();
                connexion.connect();
                is=connexion.getInputStream();

                BufferedReader br = new BufferedReader(new InputStreamReader(is));
                String ligne = br.readLine();

                // Vérification

                try{
                    int nb = Integer.parseInt(ligne);
                    Intent intent = new Intent(getApplicationContext(), Mission.class);
                    intent.putExtra("no",nb);
                    startActivity(intent);
                    finish();
                } catch (Exception e2) {
                    Log.e("log_tag","Veuillez saisir des identifiants valides." + e2.toString());
                }

            }
        } catch (Exception e){
            Log.e("log_tag", "Probleme connexion." + e.toString());
        }

    }
}
