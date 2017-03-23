using System;
using System.Collections.Generic;
using Android.App;
using Android.Content;
using Android.Content.PM;
using Android.Graphics;
using Android.OS;
using Android.Provider;
using Android.Widget;
using Java.IO;
using Environment = Android.OS.Environment;
using Uri = Android.Net.Uri;
using Android.Views;
using System.Threading.Tasks;
using System.Net;
using System.IO;
using System.Text;
using Newtonsoft.Json.Linq;

namespace Hellyon
{
    public static class App
    {
        public static Java.IO.File _file;
        public static Java.IO.File _dir;
        public static Bitmap bitmap;
    }

    [Activity(Label = "OpenedPot")]
    public class OpenedPot : Activity
    {
        private ImageView _imageView;

        protected override void OnActivityResult(int requestCode, Result resultCode, Intent data)
        {
            base.OnActivityResult(requestCode, resultCode, data);

            // Make it available in the gallery

            Intent mediaScanIntent = new Intent(Intent.ActionMediaScannerScanFile);
            Uri contentUri = Uri.FromFile(App._file);
            mediaScanIntent.SetData(contentUri);
            SendBroadcast(mediaScanIntent);

            // Display in ImageView. We will resize the bitmap to fit the display
            // Loading the full sized image will consume to much memory 
            // and cause the application to crash.

            int height = Resources.DisplayMetrics.HeightPixels;
            int width = _imageView.Height;
            App.bitmap = App._file.Path.LoadAndResizeBitmap(width, height);
            if (App.bitmap != null)
            {
                _imageView.SetImageBitmap(App.bitmap);
                App.bitmap = null;
            }

            // Dispose of the Java side bitmap.
            GC.Collect();
        }

        protected override void OnCreate(Bundle savedInstanceState)
        {
            RequestWindowFeature(WindowFeatures.NoTitle);
            base.OnCreate(savedInstanceState);

            // Create your application here
            SetContentView(Resource.Layout.OpenedPot);


            if (IsThereAnAppToTakePictures())
            {
                CreateDirectoryForPictures();

                Button button = FindViewById<Button>(Resource.Id.addFlowerImage);
                _imageView = FindViewById<ImageView>(Resource.Id.flowerImageView);
                button.Click += TakeAPicture;
            }

            Button btnReload = FindViewById<Button>(Resource.Id.btnReload);
            btnReload.Click += async (sender, e) => {

                // Get the latitude and longitude entered by the user and create a query.
                string url = "http://bmtech.incom.hu/api/v1/getActive";



                // Fetch the weather information asynchronously, 
                // parse the results, then update the screen:
                JObject json = await FetchWeatherAsync(url);
                ParseAndDisplay (json);
            };

        }

        private async Task<JObject> FetchWeatherAsync(string url)
        {
            // Create an HTTP web request using the URL:
            HttpWebRequest request = (HttpWebRequest)HttpWebRequest.Create(new System.Uri(url));
            request.ContentType = "application/x-www-form-urlencoded";
            request.Method = "POST";
            string postData = "flower_name=Liliom&pot_key=BBCCDDEE";
            byte[] byteArray = Encoding.UTF8.GetBytes(postData);
            request.ContentLength = byteArray.Length;
            Stream dataStream = request.GetRequestStream();
            dataStream.Write(byteArray, 0, byteArray.Length);
            dataStream.Close();

            // Send the request to the server and wait for the response:
            using (WebResponse response = await request.GetResponseAsync())
            {
                // Get a stream representation of the HTTP web response:
                using (Stream stream = response.GetResponseStream())
				{
					StreamReader reader = new StreamReader(stream, Encoding.UTF8);
					String responseString = reader.ReadToEnd();
					JObject jsonDoc = JObject.Parse (responseString);
					return jsonDoc;
				}
            }

            
        }

        private void ParseAndDisplay(JObject json)
        {
            // Get the weather reporting fields from the layout resource:
            TextView light = FindViewById<TextView>(Resource.Id.tvLight);
            TextView waterlevel = FindViewById<TextView>(Resource.Id.tvwaterlevel);
            TextView tempature = FindViewById<TextView>(Resource.Id.tvtempature);
            TextView pressure = FindViewById<TextView>(Resource.Id.tvpressure);
            TextView moustire = FindViewById<TextView>(Resource.Id.tvmoisture);
            TextView humidity = FindViewById<TextView>(Resource.Id.tvhumidity);
            TextView flower_name = FindViewById<TextView>(Resource.Id.tvflowername);
            TextView pot_key = FindViewById<TextView>(Resource.Id.tvpotkey);

            // Extract the array of name/value results for the field name "weatherObservation". 
            string jsonLight = (string) json["light"];
            string jsonWaterLevel = (string) json["waterlevel"];
            string jsonTemp = (string) json["tempature"];
            string jsonPressure = (string) json["pressure"];
            string jsonMoisture = (string) json["moisture"];
            string jsonHumidity = (string) json["humidity"];
            string jsonFlowerName = (string) json["flower_name"];
            string jsonPotKey = (string) json["pot_key"];

            // Extract the "stationName" (location string) and write it to the location TextBox:
            light.Text = jsonLight.ToString();
            waterlevel.Text = jsonWaterLevel.ToString();
            tempature.Text = jsonTemp.ToString();
            pressure.Text = jsonPressure.ToString();
            moustire.Text = jsonMoisture.ToString();
            humidity.Text = jsonHumidity.ToString();
            flower_name.Text = jsonFlowerName.ToString();
            pot_key.Text = jsonPotKey.ToString();
        }

        private void CreateDirectoryForPictures()
        {
            App._dir = new Java.IO.File(
                Environment.GetExternalStoragePublicDirectory(
                    Environment.DirectoryPictures), "Hellyon");
            if (!App._dir.Exists())
            {
                App._dir.Mkdirs();
            }
        }

        private bool IsThereAnAppToTakePictures()
        {
            Intent intent = new Intent(MediaStore.ActionImageCapture);
            IList<ResolveInfo> availableActivities =
                PackageManager.QueryIntentActivities(intent, PackageInfoFlags.MatchDefaultOnly);
            return availableActivities != null && availableActivities.Count > 0;
        }

        private void TakeAPicture(object sender, EventArgs eventArgs)
        {
            Intent intent = new Intent(MediaStore.ActionImageCapture);

            App._file = new Java.IO.File(App._dir, String.Format("myPhoto_{0}.jpg", Guid.NewGuid()));

            intent.PutExtra(MediaStore.ExtraOutput, Uri.FromFile(App._file));

            StartActivityForResult(intent, 0);
        }
    }

}