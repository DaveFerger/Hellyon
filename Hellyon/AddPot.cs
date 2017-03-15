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

namespace Hellyon
{
    [Activity(Label = "AddPot")]
    public class AddPot : Activity
    {
        protected override void OnCreate(Bundle savedInstanceState)
        {
            RequestWindowFeature(WindowFeatures.NoTitle);
            base.OnCreate(savedInstanceState);

            // Create your application here
            SetContentView(Resource.Layout.AddPot);

            /*ImageButton imageButton1 = FindViewById<ImageButton>(Resource.Id.imageButton1);
            imageButton1.Click += delegate
            {
                var intent = new Intent(this, typeof(Hellyon.AddImage));
                try
                {
                    StartActivity(intent);
                }
                catch (System.Exception e)
                {
                    System.Console.WriteLine(e);
                    throw;
                }

            }; */
        }
    }
}