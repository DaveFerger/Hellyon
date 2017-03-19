using System.Collections.Generic;

using Android.App;
using Android.OS;
using Android.Views;
using Android.Widget;
using Hellyon.Resources.Model;
using Hellyon.Resources.DataHelper;
using Android.Util;
using Hellyon.Resources;

namespace Hellyon
{
    [Activity(Label = "AddPot")]
    public class AddPot : Activity
    {
        ListView lstData;
        List<Flower> lstSource = new List<Flower>();
        DataBase db;

        protected override void OnCreate(Bundle savedInstanceState)
        {
            RequestWindowFeature(WindowFeatures.NoTitle);
            base.OnCreate(savedInstanceState);

            // Create your application here
            SetContentView(Resource.Layout.AddPot);

            //Create DataBase
            db = new DataBase();
            db.createDataBase();
            string folder = System.Environment.GetFolderPath(System.Environment.SpecialFolder.Personal);
            Log.Info("DB_PATH", folder);

            lstData = FindViewById<ListView>(Resource.Id.listView);

            var edtName = FindViewById<EditText>(Resource.Id.edtFlowerName);
            var edtDesc = FindViewById<EditText>(Resource.Id.edtDesc);
            var edtLight = FindViewById<EditText>(Resource.Id.edtLight);
            var edtWaterLevel = FindViewById<EditText>(Resource.Id.edtWaterLevel);
            var edtTemp = FindViewById<EditText>(Resource.Id.edtTemp);
            var edtPressure = FindViewById<EditText>(Resource.Id.edtPressure);
            var edtMoisture = FindViewById<EditText>(Resource.Id.edtMoisture);
            var edtHumidity = FindViewById<EditText>(Resource.Id.edtHumidity);

            var btnAdd = FindViewById<Button>(Resource.Id.btnAdd);
            var btnEdit = FindViewById<Button>(Resource.Id.btnEdit);
            var btnDelete = FindViewById<Button>(Resource.Id.btnDelete);

            //LoadData
            LoadData();

            //Event
            btnAdd.Click += delegate
            {
                Flower flower = new Flower()
                {
                    FlowerName = edtName.Text,
                    Description = edtDesc.Text,
                    Light = int.Parse(edtLight.Text),
                    WaterLevel = int.Parse(edtWaterLevel.Text),
                    Tempature = int.Parse(edtTemp.Text),
                    Pressure = int.Parse(edtPressure.Text),
                    Moisture = int.Parse(edtMoisture.Text),
                    Humidity = int.Parse(edtHumidity.Text)
                };
                db.insertIntoTableFlower(flower);
                LoadData();
            };

            btnEdit.Click += delegate {
                Flower flower = new Flower()
                {
                    ID = int.Parse(edtName.Tag.ToString()),
                    FlowerName = edtName.Text,
                    Description = edtDesc.Text,
                    Light = int.Parse(edtLight.Text),
                    WaterLevel = int.Parse(edtWaterLevel.Text),
                    Tempature = int.Parse(edtTemp.Text),
                    Pressure = int.Parse(edtPressure.Text),
                    Moisture = int.Parse(edtMoisture.Text),
                    Humidity = int.Parse(edtHumidity.Text)
                };
                db.updateTableFlower(flower);
                LoadData();
            };

            btnDelete.Click += delegate {
                Flower flower = new Flower()
                {
                    ID = int.Parse(edtName.Tag.ToString()),
                    FlowerName = edtName.Text,
                    Description = edtDesc.Text,
                    Light = int.Parse(edtLight.Text),
                    WaterLevel = int.Parse(edtWaterLevel.Text),
                    Tempature = int.Parse(edtTemp.Text),
                    Pressure = int.Parse(edtPressure.Text),
                    Moisture = int.Parse(edtMoisture.Text),
                    Humidity = int.Parse(edtHumidity.Text)
                };
                db.deleteTableFlower(flower);
                LoadData();
            };

            lstData.ItemClick += (s, e) => {
                //Set background for selected item
                /*for (int i = 0; i < lstData.Count; i++)
                {
                    if (e.Position == i)
                        lstData.GetChildAt(i).SetBackgroundColor(Android.Graphics.Color.DarkGray);
                    else
                        lstData.GetChildAt(i).SetBackgroundColor(Android.Graphics.Color.Transparent);

                } */

                //Binding Data
                var txtId = e.View.FindViewById<TextView>(Resource.Id.txtId);
                var txtFlowername = e.View.FindViewById<TextView>(Resource.Id.txtFlowername);
                var txtDesc = e.View.FindViewById<TextView>(Resource.Id.txtDesc);
                var txtLight = e.View.FindViewById<TextView>(Resource.Id.txtLight);
                var txtWaterLevel = e.View.FindViewById<TextView>(Resource.Id.txtWaterLevel);
                var txtTemp = e.View.FindViewById<TextView>(Resource.Id.txtTemp);
                var txtPressure = e.View.FindViewById<TextView>(Resource.Id.txtPressure);
                var txtMoisture = e.View.FindViewById<TextView>(Resource.Id.txtMoisture);
                var txtHumidity = e.View.FindViewById<TextView>(Resource.Id.txtHumidity);

                edtName.Text = txtFlowername.Text;
                edtName.Tag = e.Id;
                edtDesc.Text = txtDesc.Text;
                edtLight.Text = txtLight.Text;
                edtWaterLevel.Text = txtWaterLevel.Text;
                edtTemp.Text = txtTemp.Text;
                edtPressure.Text = txtPressure.Text;
                edtMoisture.Text = txtMoisture.Text;
                edtHumidity.Text = txtHumidity.Text;
            };
        }

        private void LoadData()
        {
            lstSource = db.selectTableFlower();
            var adapter = new ListViewAdapter(this, lstSource);
            lstData.Adapter = adapter;
        }
    }
}