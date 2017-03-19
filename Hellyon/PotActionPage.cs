using Android.App;
using Android.Content;
using Android.OS;
using Android.Util;
using Android.Views;
using Android.Widget;
using Hellyon.Resources;
using Hellyon.Resources.DataHelper;
using Hellyon.Resources.Model;
using System.Collections.Generic;

namespace Hellyon
{
    [Activity(Label = "Pot Action Page")]
    public class PotActionPage : Activity
    {
        ListView lstData;
        List<Pots> lstSource = new List<Pots>();
        DataBase db;

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


            //Create DataBase
            db = new DataBase();
            db.createDataBase();
            string folder = System.Environment.GetFolderPath(System.Environment.SpecialFolder.Personal);
            Log.Info("DB_PATH", folder);

            lstData = FindViewById<ListView>(Resource.Id.lstPots);

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

            Button newPotButton = FindViewById<Button>(Resource.Id.newPotButton);
            newPotButton.Click += delegate
            {
                var intent = new Intent(this, typeof(Hellyon.AddPot));
                try
                {
                    StartActivityForResult(intent,0);
                }
                catch (System.Exception e)
                {
                    System.Console.WriteLine(e);
                    throw;
                }

            };
        }
        protected override void OnActivityResult(int requestCode, Result resultCode, Intent data)
        {
            base.OnActivityResult(requestCode, resultCode, data);
            if (resultCode == Result.Ok)
            {
                LoadData();
            }
        }

        private void LoadData()
        {
            lstSource = db.selectTablePots();
            var adapter = new ListViewAdapterForPots(this, lstSource);
            lstData.Adapter = adapter;
        }
    }
}