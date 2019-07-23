package com.example.android.smartattendancesystem;

import android.content.Intent;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.AuthFailureError;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

import java.util.HashMap;
import java.util.Map;


public class MainActivity extends AppCompatActivity
{
    private static final String TAG = "MyActivity";

    Button login;
    EditText pass,name;
    String username;
    String password;
    String HttpUrl ="http://192.168.1.102/arct/server.php";
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        name = (EditText) findViewById(R.id.name);
        pass = (EditText)findViewById(R.id.password);
    }

    public void login(View view){

        username = name.getText().toString().trim();
        password = pass.getText().toString().trim();

        StringRequest stringRequest = new StringRequest(Request.Method.POST, HttpUrl,
                new Response.Listener<String>() {
                    @Override
                    public void onResponse(String response) {
                        if(response.trim().equals("success")){
                            Intent intent = new Intent(MainActivity.this, ScanActivity.class);

                            startActivity(intent);
                        }else{
                            Toast.makeText(MainActivity.this,response,Toast.LENGTH_LONG).show();
                        }
                    }
                },
                new Response.ErrorListener() {
                    @Override
                    public void onErrorResponse(VolleyError error) {
                        Toast.makeText(MainActivity.this,error.toString(),Toast.LENGTH_LONG ).show();
                    }
                }){
            @Override
            protected Map<String, String> getParams() throws AuthFailureError {
                Map<String,String> map = new HashMap<String,String>();
                map.put("username",username);
                map.put("password",password);
                return map;
            }
        };

        RequestQueue requestQueue = Volley.newRequestQueue(this);
        requestQueue.add(stringRequest);
    }

}