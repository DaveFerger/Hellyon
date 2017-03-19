using System;
using System.Collections.Generic;

using Android.App;
using Android.Views;
using Android.Widget;
using Hellyon.Resources.Model;

namespace Hellyon.Resources
{
    public class ViewHolderForPots : Java.Lang.Object
    {
        public TextView txtpId { get; set; }
        public TextView txtPotname { get; set; }
        public TextView txtpDesc { get; set; }

    }
    public class ListViewAdapterForPots : BaseAdapter
    {
        private Activity activity;
        private List<Pots> lstPots;

        public ListViewAdapterForPots(Activity activity, List<Pots> lstPots)
        {
            this.activity = activity;
            this.lstPots = lstPots;
        }

        public override int Count
        {
            get
            {
                return lstPots.Count;
            }
        }

        public override Java.Lang.Object GetItem(int position)
        {
            return null;
        }

        public override long GetItemId(int position)
        {
            return lstPots[position].pID;
        }

        public override View GetView(int position, View convertView, ViewGroup parent)
        {
            var view = convertView ?? activity.LayoutInflater.Inflate(Resource.Layout.button_list_view_dataTemplate, parent, false);

            var txtpId = view.FindViewById<TextView>(Resource.Id.txtpId);
            var txtPotname = view.FindViewById<TextView>(Resource.Id.txtPotname);
            var txtpDesc = view.FindViewById<TextView>(Resource.Id.txtpDesc);

            txtpId.Text = ""+ lstPots[position].pID;
            txtPotname.Text = lstPots[position].PotName;
            txtpDesc.Text = lstPots[position].pDescription;

            return view;
        }
    }
}