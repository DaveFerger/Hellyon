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
    public class Flower
    {
        [PrimaryKey, AutoIncrement]
        public int ID { get; set; }
        public string FlowerName { get; set; }
        public string Description { get; set; }
        public int Light { get; set; }
        public int WaterLevel { get; set; }
        public int Tempature { get; set; }
        public int Pressure { get; set; }
        public int Moisture { get; set; }
        public int Humidity { get; set; }
        public DateTime Created_Date { get; set; }
    }
}