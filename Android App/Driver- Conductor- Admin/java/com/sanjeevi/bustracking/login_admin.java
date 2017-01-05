package com.sanjeevi.bustracking;

import android.app.Activity;
import android.os.Bundle;
import android.view.Menu;
import android.view.MenuItem;
import android.content.Intent;
import android.net.Uri;
//import android.webkit.WebView;
//import android.webkit.WebViewClient;
import android.webkit.*;
import android.view.*;


public class login_admin extends Activity {

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login_admin);
        //to change title
        setTitle("Login Admin");

        WebView View = (WebView)findViewById(R.id.webview);
        WebView myWebView = (WebView) findViewById(R.id.webview);
        myWebView.setWebViewClient(new WebViewClient());

        WebSettings webSettings = myWebView.getSettings();
        webSettings.setJavaScriptEnabled(true);

        View.setWebViewClient(new WebViewClient(){
            public boolean shouldOverrideUrlLoading(WebView view, String url) {
                if (Uri.parse(url).getHost().length() == 0) {
                    return false;
                }
                return false;
            }

               /* @Override
                public boolean onKeyDown ( int keyCode, KeyEvent event){
                    // Check if the key event was the Back button and if there's history
                    if ((keyCode == KeyEvent.KEYCODE_BACK) && myWebView.canGoBack()) {
                        myWebView.goBack();
                        return true;
                    }
                    // If it wasn't the Back key or there's no web page history, bubble up to the default
                    // system behavior (probably exit the activity)
                    return super.onKeyDown(keyCode, event);
                }*/

        });

        //load local html file
        View.loadUrl("file:///android_asset/login_admin.html");
    }
}
