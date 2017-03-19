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
            SetContentView(Resource.Layout.AddPot);
            // Create your application here

            Button btn = FindViewById<Button>(Resource.Id.addFlowerForPot);
            btn.Click += delegate
            {
                var intent = new Intent(this, typeof(Hellyon.AddFlower));
                try
                {
                    StartActivityForResult(intent, 0);
                }
                catch (System.Exception e)
                {
                    System.Console.WriteLine(e);
                    throw;
                }
            };

            EditText potName = FindViewById<EditText>(Resource.Id.potName);

            Button saveBtn = FindViewById<Button>(Resource.Id.createNewPot);
            saveBtn.Click += delegate
            {
                Intent myIntent = new Intent(this, typeof(AddPot));
                myIntent.PutExtra("pot", potName.Text);
                SetResult(Result.Ok, myIntent);
                Finish();
            };
        }
        protected override void OnActivityResult(int requestCode, Result resultCode, Intent data)
        {
            base.OnActivityResult(requestCode, resultCode, data);
            if (resultCode == Result.Ok)
            {
                var helloLabel = FindViewById<TextView>(Resource.Id.textView1);
                helloLabel.Text = data.GetStringExtra("flower");
            }
        }
    }
}