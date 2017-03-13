using Android.App;
using Android.Widget;
using Android.OS;
using Android.Views;
using Android.Content;

namespace Hellyon
{
    [Activity(Label = "Hellyon")]
    public class MainPage : Activity
    {
        protected override void OnCreate(Bundle bundle)
        {
            RequestWindowFeature(WindowFeatures.NoTitle);
            base.OnCreate(bundle);

            // Set our view from the "main" layout resource
            SetContentView (Resource.Layout.Main);

            Button btn = FindViewById<Button> (Resource.Id.loginButton);

            EditText username = FindViewById<EditText> (Resource.Id.userName);
            EditText password = FindViewById<EditText>(Resource.Id.password);

            btn.Click += delegate {
                if (username.Text == "admin" && password.Text == "admin")
                {
                    var intent = new Intent(this, typeof(Hellyon.PotActionPage));
                    try
                    {
                        StartActivity(intent);
                    }
                    catch (System.Exception e)
                    {
                        System.Console.WriteLine(e);
                        throw;
                    }
                }
                else
                {
                    Toast.MakeText(this, "Nem jó", ToastLength.Long).Show();
                }
            };   
        }
    }
}

