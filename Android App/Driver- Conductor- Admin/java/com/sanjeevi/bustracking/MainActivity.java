package com.sanjeevi.bustracking;

import android.content.Intent;
import android.support.v7.app.ActionBarActivity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.view.View;


public class MainActivity extends ActionBarActivity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
    }


    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.menu_main, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }
   public void driver_function(View v) //starting login_driver activity
    {
        Intent in = new Intent(getApplicationContext(),login_driver.class);
        startActivity(in);
    }

    public void conductor_function(View v) //starting login_conductor activity
    {
        Intent in = new Intent(getApplicationContext(),login_conductor.class);
        startActivity(in);
    }

    public void admin_function(View v) //starting login_admin activity
    {
        Intent in = new Intent(getApplicationContext(),login_admin.class);
        startActivity(in);
    }
}
