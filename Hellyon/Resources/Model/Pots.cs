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
using SQLite;

namespace Hellyon.Resources.Model
{
    public class Pots
    {
        [PrimaryKey, AutoIncrement]
        public int pID { get; set; }
        public string PotName { get; set; }
        public string pDescription { get; set; }
        public DateTime Created_Date { get; set; }
    }
}