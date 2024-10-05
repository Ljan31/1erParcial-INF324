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
    public partial class Form5 : Form
    {
        public Form5()
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

        private void button1_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=BDLimberg;Integrated Security=True;";
            SqlCommand cmd = new SqlCommand();
            cmd.Connection = con;
            cmd.CommandText = "delete from catastro where id='" + ID.Text + "'";
            cmd.CommandType = CommandType.Text;
            con.Open();
            cmd.ExecuteNonQuery();
            con.Close();
            Close();

        }

        private void button2_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void label10_Click(object sender, EventArgs e)
        {

        }

        private void ZONA_TextChanged(object sender, EventArgs e)
        {

        }

        private void label11_Click(object sender, EventArgs e)
        {

        }

        private void CI_TextChanged(object sender, EventArgs e)
        {

        }

        private void label8_Click(object sender, EventArgs e)
        {

        }

        private void M2_TextChanged(object sender, EventArgs e)
        {

        }

        private void label9_Click(object sender, EventArgs e)
        {

        }

        private void YFIN_TextChanged(object sender, EventArgs e)
        {

        }

        private void label6_Click(object sender, EventArgs e)
        {

        }

        private void XFIN_TextChanged(object sender, EventArgs e)
        {

        }

        private void label7_Click(object sender, EventArgs e)
        {

        }

        private void YINI_TextChanged(object sender, EventArgs e)
        {

        }

        private void label5_Click(object sender, EventArgs e)
        {

        }

        private void XINI_TextChanged(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void ID_TextChanged(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void DISTRITO_TextChanged(object sender, EventArgs e)
        {

        }
    }
}
