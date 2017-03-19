using System.Collections.Generic;

using Android.App;
using Android.Views;
using Android.Widget;
using Hellyon.Resources.Model;

namespace Hellyon.Resources
{
    public class ViewHolder : Java.Lang.Object
    {
        public TextView txtId { get; set; }
        public TextView txtFlowername { get; set; }
        public TextView txtDesc { get; set; }
        public TextView txtLight { get; set; }
        public TextView txtWaterLevel { get; set; }
        public TextView txtTemp { get; set; }
        public TextView txtPressure { get; set; }
        public TextView txtMoisture { get; set; }
        public TextView txtHumidity { get; set; }

    }
    public class ListViewAdapter:BaseAdapter
    {
        private Activity activity;
        private List<Flower> lstFlower;
        public ListViewAdapter(Activity activity, List<Flower> lstFlower)
        {
            this.activity = activity;
            this.lstFlower = lstFlower;
        }

        public override int Count
        {
            get
            {
                return lstFlower.Count;
            }
        }

        public override Java.Lang.Object GetItem(int position)
        {
            return null;
        }

        public override long GetItemId(int position)
        {
            return lstFlower[position].ID;
        }

        public override View GetView(int position, View convertView, ViewGroup parent)
        {
            var view = convertView ?? activity.LayoutInflater.Inflate(Resource.Layout.list_view_dataTemplate, parent, false);

            var txtId = view.FindViewById<TextView>(Resource.Id.txtId);
            var txtFlowername = view.FindViewById<TextView>(Resource.Id.txtFlowername);
            var txtDesc = view.FindViewById<TextView>(Resource.Id.txtDesc);
            var txtLight = view.FindViewById<TextView>(Resource.Id.txtLight);
            var txtWaterLevel = view.FindViewById<TextView>(Resource.Id.txtWaterLevel);
            var txtTemp = view.FindViewById<TextView>(Resource.Id.txtTemp);
            var txtPressure = view.FindViewById<TextView>(Resource.Id.txtPressure);
            var txtMoisture = view.FindViewById<TextView>(Resource.Id.txtMoisture);
            var txtHumidity = view.FindViewById<TextView>(Resource.Id.txtHumidity);

            txtId.Text = ""+lstFlower[position].ID;
            txtFlowername.Text = lstFlower[position].FlowerName;
            txtDesc.Text = lstFlower[position].Description;
            txtLight.Text = ""+lstFlower[position].Light;
            txtWaterLevel.Text = ""+lstFlower[position].WaterLevel;
            txtTemp.Text = ""+lstFlower[position].Tempature;
            txtPressure.Text = ""+lstFlower[position].Pressure;
            txtMoisture.Text = ""+lstFlower[position].Moisture;
            txtHumidity.Text = ""+lstFlower[position].Humidity;

            return view;
        }
    }
}