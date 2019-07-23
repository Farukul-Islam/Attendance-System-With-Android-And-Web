package com.example.android.smartattendancesystem;

import android.content.BroadcastReceiver;
import android.content.Context;
import android.content.Intent;
import android.content.IntentFilter;
import android.net.wifi.ScanResult;
import android.net.wifi.WifiManager;
import android.os.Bundle;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.EditText;
import android.widget.TextView;

import java.util.ArrayList;
import java.util.List;


public class ScanActivity extends AppCompatActivity {

    private static final String TAG = "ScanActivity";
    public WifiManager wifi;
    BroadcastReceiver mWifiScanReceiver;
    public boolean wasConnected;
    EditText finres;
    ArrayList<String> SSID;
    ArrayList<String> mylist ;
    TextView ssidView;
    Intent intent = new Intent();
    Bundle bundle = new Bundle();


    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_scan);
        ssidView = (TextView) findViewById(R.id.ssid);
        finres = (EditText) findViewById(R.id.filtertxt);
        wifi = (WifiManager) getApplicationContext().getSystemService(Context.WIFI_SERVICE);
        wasConnected = wifi.isWifiEnabled();
        if (!wasConnected) wifi.setWifiEnabled(true);


        scanAndShow();
    }

    public void onBackPressed() {
        wifi.setWifiEnabled(wasConnected);
        super.onBackPressed();
        finish();
    }

    public void scanAndShow() {

        wifi = (WifiManager) getApplicationContext().getSystemService(Context.WIFI_SERVICE);

        SSID = new ArrayList<String>();


        mWifiScanReceiver = new BroadcastReceiver() {
            @Override
            public void onReceive(Context c, Intent intent) {
                if (intent.getAction().equals(WifiManager.SCAN_RESULTS_AVAILABLE_ACTION)) {
                    List<ScanResult> mScanResults = wifi.getScanResults();
                    String ssidString = "";
                    int num = 0;
                    for (int i = 0; i < mScanResults.size(); i++) {
                        SSID.add(mScanResults.get(i).SSID);
                        num++;
                        ssidString = ssidString + "\n" + num + ". " + SSID.get(i).toString();
                    }
                    ssidView.setText(ssidString);
                }
            }
        };

        registerReceiver(mWifiScanReceiver,
                new IntentFilter(WifiManager.SCAN_RESULTS_AVAILABLE_ACTION));
        wifi.startScan();
        Log.i(TAG, "Started Scanning");
    }

    public void refreshButton(View view) {
        unregisterReceiver(mWifiScanReceiver);
        scanAndShow();
    }

    public void filterbtn(View v) {

        ssidView.setText("");


        String str = finres.getText().toString();
        mylist = new ArrayList<String>();
        for (int i = 0; i < SSID.size(); i++) {

            if (SSID.get(i).toString().toLowerCase().contains(str.toLowerCase())) {

                String new_string = SSID.get(i).toString().toLowerCase().replace(str.toLowerCase() +"-", "");
                mylist.add(new_string);
            }
        }



        Intent intent = new Intent(ScanActivity.this,RegisterActivity.class);
        intent.putExtra("mylist",mylist);
        intent.putExtra("filter",str);
        startActivity(intent);
    }
}
