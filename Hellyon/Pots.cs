using Android.App;
using Android.OS;
using Android.Views;
using Android.Widget;

namespace Hellyon
{
    [Activity(Label = "Pots")]
    public class Pots : Activity
    {
        [Android.Runtime.Register("onBackPressed", "()V", "GetOnBackPressedHandler")]
        public override void OnBackPressed()
        {
            AlertDialog.Builder alert = new AlertDialog.Builder(this);
            alert.SetTitle("Kilépés");
            alert.SetMessage("Biztosan ki akarsz lépni?");
            alert.SetPositiveButton("Igen", (senderAlert, args) => {
                System.Environment.Exit(0);
            });

            alert.SetNegativeButton("Nem", (senderAlert, args) => {
                //valami
            });

            Dialog dialog = alert.Create();
            dialog.Show();
        }
        protected override void OnCreate(Bundle savedInstanceState)
        {
            base.OnCreate(savedInstanceState);
            RequestWindowFeature(WindowFeatures.NoTitle);
            // Create your application here
            SetContentView(Resource.Layout.Pots);
        }
    }
}