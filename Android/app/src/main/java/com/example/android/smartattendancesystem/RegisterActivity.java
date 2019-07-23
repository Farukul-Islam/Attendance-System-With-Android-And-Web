package com.example.android.smartattendancesystem;

import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.app.ProgressDialog;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;
import android.widget.Button;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;
import java.util.Map;
import com.google.gson.Gson;
import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;

public class RegisterActivity extends AppCompatActivity {

    List<Data> arrlist;
    ArrayList<String> arrayList;
    TextView textView;
    String newArray;
    Button Register;
    RequestQueue requestQueue;
    ProgressDialog progressDialog;

    String HttpUrl ="http://192.168.1.102/arct/attendance.php";

    @Override
        protected void onCreate(Bundle savedInstanceState) {
            super.onCreate(savedInstanceState);
            setContentView(R.layout.activity_check);
            arrayList = new ArrayList<String>();
            textView=(TextView) findViewById(R.id.textView);

            Register = (Button) findViewById(R.id.ButtonRegister);

            requestQueue = Volley.newRequestQueue(RegisterActivity.this);

            progressDialog = new ProgressDialog(RegisterActivity.this);

            Bundle extras = getIntent().getExtras();
            Bundle get=getIntent().getExtras();
            String table= get.getString("filter");
            arrayList= extras.getStringArrayList("mylist");
            String str ="";
            int p=1;
            Data dt;
            arrlist= new ArrayList<>();
            for(String b:arrayList){
                str+="\n" +p+". "+b;
                p++;
                dt=new Data(b,table);
                arrlist.add(dt);
            }
            Gson g= new Gson();
            newArray= g.toJson(arrlist);
            textView.setText(str);
            Register.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View view) {
                    UserRegistration();
                }
            });
        }
        public void UserRegistration(){

            progressDialog.setMessage("Please Wait, We are Inserting Your Data on Server");
            progressDialog.show();

            StringRequest stringRequest = new StringRequest(Request.Method.POST, HttpUrl,
                    new Response.Listener<String>() {
                        @Override
                        public void onResponse(String ServerResponse) {

                            progressDialog.dismiss();

                            Toast.makeText(RegisterActivity.this, ServerResponse, Toast.LENGTH_LONG).show();
                        }
                    },
                    new Response.ErrorListener() {
                        @Override
                        public void onErrorResponse(VolleyError volleyError) {

                            progressDialog.dismiss();

                            Toast.makeText(RegisterActivity.this, volleyError.toString(), Toast.LENGTH_LONG).show();
                        }
                    }) {
                @Override
                protected Map<String, String> getParams() {

                    Map<String, String> params = new HashMap<String, String>();


                           params.put("arr",newArray);

                    return params;
                }
            };
            RequestQueue requestQueue = Volley.newRequestQueue(RegisterActivity.this);

            requestQueue.add(stringRequest);
        }
}