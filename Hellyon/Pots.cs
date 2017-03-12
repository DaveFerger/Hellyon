using Android.App;
using Android.OS;
using Android.Views;

namespace Hellyon
{
    [Activity(Label = "Pots")]
    public class Pots : Activity
    {
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            RequestWindowFeature(WindowFeatures.NoTitle);
            // Create your application here
            SetContentView(Resource.Layout.Pots);
        }
    }
}