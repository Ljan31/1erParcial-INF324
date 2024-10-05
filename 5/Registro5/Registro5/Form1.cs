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
    public partial class Form1 : Form
    {
        DataSet ds = new DataSet();

        private void datos()
        {
            ds.Clear();
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=BDLimberg;Integrated Security=True;";
            SqlDataAdapter ada = new SqlDataAdapter();
            ada.SelectCommand = new SqlCommand();
            ada.SelectCommand.Connection = con;
            ada.SelectCommand.CommandText = "select * from persona";
            ada.SelectCommand.CommandType = CommandType.Text;
            ada.Fill(ds, "persona");
            ada.SelectCommand.CommandText = "select * from catastro";
            ada.SelectCommand.CommandType = CommandType.Text;
            ada.Fill(ds, "catastro");
        }

        public Form1()
        {
            InitializeComponent();
            dataGridView1.CellEndEdit += dataGridView1_CellEndEdit;
        }

        private void Form1_Load(object sender, EventArgs e)
        {
            datos();
        }

        private void dataGridView1_CellEndEdit(object sender, DataGridViewCellEventArgs e)
        {

            if (dataGridView1.DataMember == "catastro")
            {
                SqlConnection con = new SqlConnection();
                con.ConnectionString = "server=(local);database=BDLimberg;Integrated Security=True;";
                SqlCommand cmd = new SqlCommand();
                cmd.Connection = con;
                string id = dataGridView1.Rows[e.RowIndex].Cells["id"].Value.ToString();
                string zona = dataGridView1.Rows[e.RowIndex].Cells["zona"].Value.ToString();
                string xini = dataGridView1.Rows[e.RowIndex].Cells["xini"].Value.ToString();
                string yini = dataGridView1.Rows[e.RowIndex].Cells["yini"].Value.ToString();
                string xfin = dataGridView1.Rows[e.RowIndex].Cells["xfin"].Value.ToString();
                string yfin = dataGridView1.Rows[e.RowIndex].Cells["yfin"].Value.ToString();
                string superficie = dataGridView1.Rows[e.RowIndex].Cells["superficie"].Value.ToString();
                string ci = dataGridView1.Rows[e.RowIndex].Cells["ci"].Value.ToString();
                string distrito = dataGridView1.Rows[e.RowIndex].Cells["distrito"].Value.ToString();
                cmd.CommandText = "update catastro set ID='" + id + "', ci='" + ci + "', zona='" + zona + "', xini='" + xini + "', yini='" + yini + "', xfin='" + xfin + "', yfin='" + yfin + "', superficie='" + superficie + "', distrito='" + distrito + "' where id='" + id + "'";
                cmd.CommandType = CommandType.Text;
                con.Open();
                cmd.ExecuteNonQuery();
                con.Close();
                datos();
                dataGridView1.DataSource = ds;
                dataGridView1.DataMember = "catastro";
            }
            else
            {
                SqlConnection con = new SqlConnection();
                con.ConnectionString = "server=(local);database=BDLimberg;Integrated Security=True;";
                SqlCommand cmd = new SqlCommand();
                cmd.Connection = con;
                string ci = dataGridView1.Rows[e.RowIndex].Cells["ci"].Value.ToString();
                string nombre = dataGridView1.Rows[e.RowIndex].Cells["nombre"].Value.ToString();
                string paterno = dataGridView1.Rows[e.RowIndex].Cells["paterno"].Value.ToString();
                cmd.CommandText = "update persona set ci='" + ci + "', nombre='" + nombre + "', paterno='" + paterno + "' where ci='" + ci + "'";
                cmd.CommandType = CommandType.Text;
                con.Open();
                cmd.ExecuteNonQuery();
                con.Close();
                datos();
                dataGridView1.DataSource = ds;
                dataGridView1.DataMember = "persona";
            }

        }


        private void button1_Click(object sender, EventArgs e)
        {
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "persona";
        }

        private void button2_Click(object sender, EventArgs e)
        {
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "catastro";
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Form2 f = new Form2();
            f.ShowDialog();
            datos();
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "persona";
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Form3 f = new Form3();
            f.ShowDialog();
            datos();
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "catastro";
        }

        private void button5_Click(object sender, EventArgs e)
        {
            Form4 f = new Form4();
            f.ShowDialog();
            datos();
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "persona";
        }

        private void button6_Click(object sender, EventArgs e)
        {
            Form5 f = new Form5();
            f.ShowDialog();
            datos();
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "catastro";
        }

        private void button8_Click(object sender, EventArgs e)
        {
            UpdP f = new UpdP();
            f.ShowDialog();
            datos();
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "persona";
        }

        private void button7_Click(object sender, EventArgs e)
        {
            UpdC f = new UpdC();
            f.ShowDialog();
            datos();
            dataGridView1.DataSource = ds;
            dataGridView1.DataMember = "catastro";
        }
    }
}
