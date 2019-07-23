package com.example.android.smartattendancesystem;


public class Data {
   String id;
   String table ;

    public Data(String id, String table) {
        this.id = id;
        this.table = table;
    }

    public String getId() {
        return id;
    }

    public void setId(String id) {
        this.id = id;
    }

    public String getTable() {
        return table;
    }

    public void setTable(String table) {
        this.table = table;
    }
}
