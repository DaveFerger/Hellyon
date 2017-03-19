using System.Collections.Generic;
using System.Linq;
using SQLite;
using Android.Util;
using Hellyon.Resources.Model;

namespace Hellyon.Resources.DataHelper
{
    public class DataBase
    {
        string folder = System.Environment.GetFolderPath(System.Environment.SpecialFolder.Personal);
        public bool createDataBase()
        {
            try
            {
                using (var connection = new SQLiteConnection(System.IO.Path.Combine(folder, "Flower.db")))
                {
                    connection.CreateTable<Flower>();
                    return true;
                }
            }
            catch(SQLiteException ex)
            {
                Log.Info("SQLiteEx", ex.Message);
                return false;
            }
        }

        public bool insertIntoTableFlower(Flower flower)
        {
            try
            {
                using (var connection = new SQLiteConnection(System.IO.Path.Combine(folder, "Flower.db")))
                {
                    connection.Insert(flower);
                    return true;
                }
            }
            catch(SQLiteException ex)
            {
                Log.Info("SQLiteEx", ex.Message);
                return false;
            }
        }

        public List<Flower> selectTableFlower()
        {
            try
            {
                using (var connection = new SQLiteConnection(System.IO.Path.Combine(folder, "Flower.db")))
                {
                    return connection.Table<Flower>().ToList();
                   
                }
            }
            catch (SQLiteException ex)
            {
                Log.Info("SQLiteEx", ex.Message);
                return null;
            }
        }

        public bool updateTableFlower(Flower flower)
        {
            try
            {
                using (var connection = new SQLiteConnection(System.IO.Path.Combine(folder, "Flower.db")))
                {
                    connection.Query<Flower>("UPDATE Flower set FlowerName=?,Description=?,Light=?,Waterlevel=?,Tempature=?,Pressure=?,Moisture=?,Humidity=? Where ID=?", 
                        flower.FlowerName, flower.Description, flower.Light, flower.WaterLevel, flower.Tempature, flower.Pressure, flower.Moisture, flower.Humidity, flower.ID);
                    return true;
                }
            }
            catch (SQLiteException ex)
            {
                Log.Info("SQLiteEx", ex.Message);
                return false;
            }
        }

        public bool deleteTableFlower(Flower flower)
        {
            try
            {
                using (var connection = new SQLiteConnection(System.IO.Path.Combine(folder, "Flower.db")))
                {
                    connection.Delete(flower);
                    return true;
                }
            }
            catch (SQLiteException ex)
            {
                Log.Info("SQLiteEx", ex.Message);
                return false;
            }
        }

        public bool selectQueryTableFlower(int Id)
        {
            try
            {
                using (var connection = new SQLiteConnection(System.IO.Path.Combine(folder, "Flower.db")))
                {
                    connection.Query<Flower>("SELECT * FROM Flower Where ID=?", Id);
                    return true;
                }
            }
            catch (SQLiteException ex)
            {
                Log.Info("SQLiteEx", ex.Message);
                return false;
            }
        }

    }
}