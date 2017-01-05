package com.sanjeevi.bustracking;
import java.lang.*;
import android.app.Activity;
import android.os.Bundle;
import android.content.Intent;
import android.net.Uri;
import android.webkit.GeolocationPermissions;
import android.webkit.WebChromeClient;
import android.webkit.WebView;
import android.webkit.WebViewClient;

public class login_driver extends Activity {
     /**
     * WebViewClient subclass loads all hyperlinks in the existing WebView
     */
    public class GeoWebViewClient extends WebViewClient {
        @Override
        public boolean shouldOverrideUrlLoading(WebView view, String url) {
            // When user clicks a hyperlink, load in the existing WebView
            view.loadUrl(url);
            return true;
        }
    }

    /**
     * WebChromeClient subclass handles UI-related calls
     * Note: think chrome as in decoration, not the Chrome browser
     */
    public class GeoWebChromeClient extends WebChromeClient {
        @Override
        public void onGeolocationPermissionsShowPrompt(String origin,
                                                       GeolocationPermissions.Callback callback) {
            // Always grant permission since the app itself requires location
            // permission and the user has therefore already granted it
            callback.invoke(origin, true, false);
        }
    }

    WebView mWebView;

    /** Called when the activity is first created. */
    @Override
    public void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login_driver);
        // setContentView(R.layout.main);
        //mWebView = (WebView) findViewById(R.id.webView);
        WebView View = (WebView)findViewById(R.id.webview);
        WebView mWebView = (WebView) findViewById(R.id.webview);

        // Brower niceties -- pinch / zoom, follow links in place
        mWebView.getSettings().setJavaScriptCanOpenWindowsAutomatically(true);
        mWebView.getSettings().setBuiltInZoomControls(false);
        mWebView.setWebViewClient(new GeoWebViewClient());
        // Below required for geolocation
        mWebView.getSettings().setJavaScriptEnabled(true);
        mWebView.getSettings().setGeolocationEnabled(true);
        mWebView.setWebChromeClient(new GeoWebChromeClient());
        // Load google.com
        mWebView.loadUrl("file:///android_asset/login_driver.html");
        //mWebView.loadUrl("http://bustracking.site50.net/track_driver.html");
        //String webUrl1 = mWebView.getUrl();
    }

   /* @Override
    public void onBackPressed() {
        // Pop the browser back stack or exit the activity
        String webUrl2 = mWebView.getUrl();
        if (webUrl1==webUrl2) {
            Intent in = new Intent(getApplicationContext(),MainActivity.class);
            startActivity(in);
        }
        else {
            mWebView.goBack();
            //super.onBackPressed();
        }
    }*/
}
