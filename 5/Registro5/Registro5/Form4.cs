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
    public partial class Form4 : Form
    {
        public Form4()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=BDLimberg;Integrated Security=True;";
            SqlCommand cmd = new SqlCommand();
            cmd.Connection = con;
            cmd.CommandText = "delete from persona where ci='" + textBox1.Text + "'";
            cmd.CommandType = CommandType.Text;
            con.Open();
            cmd.ExecuteNonQuery();
            con.Close();
            Close();

        }

        private void textBox1_TextChanged(object sender, EventArgs e)
        {
            
            
        }

        private void button3_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection();
            con.ConnectionString = "server=(local);database=BDLimberg;Integrated Security=True;";
            SqlCommand cmd = new SqlCommand();
            cmd.Connection = con;
            cmd.CommandText = "select * from persona where ci='" + textBox1.Text + "'";
            cmd.CommandType = CommandType.Text;
            con.Open();
            SqlDataReader reader = cmd.ExecuteReader();

            if (reader.Read()) // Si hay un registro
            {
                // Asumiendo que tus campos en la base de datos son "nombre", "apellido", "telefono", etc.
                textBox1.Text = reader["ci"].ToString();
                textBox2.Text = reader["nombre"].ToString();
                textBox3.Text = reader["paterno"].ToString();
            }
            else
            {
                // Si no se encuentra el registro, limpiar los TextBox
                textBox1.Clear();
                textBox2.Clear();
                textBox3.Clear();
            }

            reader.Close();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Close();
        }
    }
}
