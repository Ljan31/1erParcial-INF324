using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Registro5
{
    public partial class UpdC : Form
    {
        public UpdC()
        {
            InitializeComponent();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=BDLimberg;Integrated Security=True;";
            SqlCommand cmd = new SqlCommand();
            cmd.Connection = con;
            cmd.CommandText = "select * from catastro where id='" + ID.Text + "'";
            cmd.CommandType = CommandType.Text;
            con.Open();
            SqlDataReader reader = cmd.ExecuteReader();

            if (reader.Read()) // Si hay un registro
            {
                ID.Text = reader["id"].ToString();
                XINI.Text = reader["xini"].ToString();
                YINI.Text = reader["yini"].ToString();
                XFIN.Text = reader["xfin"].ToString();
                YFIN.Text = reader["yfin"].ToString();
                M2.Text = reader["superficie"].ToString();
                CI.Text = reader["ci"].ToString();
                ZONA.Text = reader["zona"].ToString();
                DISTRITO.Text = reader["distrito"].ToString();

            }
            else
            {
                // Si no se encuentra el registro, limpiar los TextBox
                ID.Clear();
                XINI.Clear();
                YINI.Clear();
                XFIN.Clear();
                YFIN.Clear();
                M2.Clear();
                CI.Clear();
                ZONA.Clear();
                DISTRITO.Clear();
            }

            reader.Close();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=BDLimberg;Integrated Security=True;";
            SqlCommand cmd = new SqlCommand();
            cmd.Connection = con;
            String id =ID.Text;
            String zona =  ZONA.Text;
            String xini =  XINI.Text;
            String yini = YINI.Text;
            String xfin = XFIN.Text;
            String yfin = YFIN.Text;
            String superficie = M2.Text;
            String ci = CI.Text;
            String distrito = DISTRITO.Text;
            cmd.CommandText = "update catastro set ID='" + id + "', ci='" + ci + "', zona='" + zona + "', xini='" + xini + "', yini='" + yini + "', xfin='" + xfin + "', yfin='" + yfin + "', superficie='" + superficie + "', distrito='" + distrito + "' where id='" + id + "'";
            cmd.CommandType = CommandType.Text;
            con.Open();
            cmd.ExecuteNonQuery();
            con.Close();
            Close();
        }
    }
}
