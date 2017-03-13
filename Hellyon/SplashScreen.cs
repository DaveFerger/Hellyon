using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;

using Android.App;
using Android.Content;
using Android.OS;
using Android.Runtime;
using Android.Views;
using Android.Widget;
using System.Threading;

namespace Hellyon
{
    [Activity(Label = "Hellyon", MainLauncher = true, NoHistory = true, Theme = "@style/Theme.Splash", Icon = "@drawable/icon")]
    public class SplashScreen : Activity
    {
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);

            // Create your application here

            Thread.Sleep(4000);
            StartActivity(typeof(MainPage));
        }
    }
}