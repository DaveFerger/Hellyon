using Android.App;
using Android.Content;
using Android.OS;
using Android.Views;
using Android.Widget;

namespace Hellyon
{
    [Activity(Label = "Pot Action Page")]
    public class PotActionPage : Activity
    {
        [Android.Runtime.Register("onBackPressed", "()V", "GetOnBackPressedHandler")]
        public override void OnBackPressed()
        {
            AlertDialog.Builder alert = new AlertDialog.Builder(this);
            alert.SetTitle("Kilépés");
            alert.SetMessage("Biztosan ki akarsz lépni?");
            alert.SetPositiveButton("Igen", (senderAlert, args) => {
                Process.KillProcess(Process.MyPid());
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
            SetContentView(Resource.Layout.PotActionPage);

            Button pot1Btn = FindViewById<Button>(Resource.Id.pot1Button);
            pot1Btn.Click += delegate
            {
                var intent = new Intent(this, typeof(Hellyon.OpenedPot));
                try
                {
                    StartActivity(intent);
                }
                catch (System.Exception e)
                {
                    System.Console.WriteLine(e);
                    throw;
                }

            };
        }
    }
}