using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Drawing.Imaging;
using System.Linq;
using System.Text;
using System.Windows.Forms;
using System.Data.SqlClient;
namespace Imagenes
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        public int contador=0;
        public int cR, cG, cB;
        public String id;
        public String[] rojos = new String[5];
        public String[] verdes = new String[5];
        public String[] azules = new String[5];
        private void button1_Click(object sender, EventArgs e)
        {
            openFileDialog1.ShowDialog();
            Bitmap bmp = new Bitmap(openFileDialog1.FileName);
            pictureBox1.Image = bmp;
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Color c = new Color();
            c = bmp.GetPixel(10, 10); //Toma el punto 10, 10
            textBox1.Text = c.R.ToString();
            textBox2.Text = c.G.ToString();
            textBox3.Text = c.B.ToString();

        }

        private void pictureBox1_MouseClick(object sender, MouseEventArgs e)
        {
            //Obtenemos la media por segmentos
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Color c = new Color();
            int x, y, mR=0, mG=0, mB=0;
            x = e.X;
            y = e.Y;
            for(int i = x; i < x + 10; i++)
            {
                for(int j = y; j<y+10; j++)
                {//Leemos los valores del pixel
                    c = bmp.GetPixel(i, j);
                    mR += c.R;
                    mG += c.G;
                    mB += c.B;
                }
            }
            mR = mR / 100;
            mG = mG / 100;
            mB = mB / 100;
            cR = mR;
            cG = mG;
            cB = mB;
            textBox1.Text = cR.ToString();
            textBox2.Text = cG.ToString();
            textBox3.Text = cB.ToString();
        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click_1(object sender, EventArgs e)
        {
            //Boton para recuperar los colores de la base de datos
            SqlConnection con = Conexion.Conectar();
            String query = "SELECT * FROM colores WHERE id like '"+ textBox4.Text+"%';";
            SqlCommand comando = new SqlCommand(query, con);
            SqlDataReader reader = comando.ExecuteReader();
            List<int> resultado = new List<int>();
            int indice = 0;
            while (reader.Read())
            {
                rojos[indice] = reader["r"].ToString();  
                verdes[indice] = reader["g"].ToString();
                azules[indice] = reader["b"].ToString();
                indice++;
            }
           // MessageBox.Show(rojos[0] + "\n" + verdes[0] + "\n" + azules[0]);
            
        }

        private void button5_Click(object sender, EventArgs e)
        {
            //CAMBIAMOS COLOR POR TEXTURAS
            int medR, medG, medB;
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap copia = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width-10; i+=10)
            {//IMAGEN
                for (int j = 0; j < bmp.Height-10; j+=10)
                {
                    medR = 0;
                    medG = 0;
                    medB = 0;
                    for(int k=i; k < i + 10; k++)
                    {//Textura
                        for(int l=j; l<j+10; l++)
                        {
                            c = bmp.GetPixel(k, l);
                            medR += c.R;
                            medG += c.G;
                            medB += c.B;
                        }
                    }
                    medR = medR / 100;
                    medG = medG / 100;
                    medB = medB / 100;
                    if ((medR < Int32.Parse(rojos[0]) + 10 && medR > Int32.Parse(rojos[0]) - 10) && (medG < Int32.Parse(verdes[0]) + 15 && medG > Int32.Parse(verdes[0]) - 15) && (medB < Int32.Parse(azules[0]) + 15 && medB > Int32.Parse(azules[0]) - 15))
                    {//Primera textura cambiamos por amarillo
                        for (int k = i; k < i + 10; k++)
                        {
                            for (int l = j; l < j + 10; l++)
                            {
                                copia.SetPixel(k, l, Color.Yellow);
                            }
                        }
                    }
                    else if ((medR < Int32.Parse(rojos[1]) + 15 && medR > Int32.Parse(rojos[1]) - 15) && (medG < Int32.Parse(verdes[1]) + 15 && medG > Int32.Parse(verdes[1]) - 15) && (medB < Int32.Parse(azules[1]) + 15 && medB > Int32.Parse(azules[1]) - 15))
                    {//Segunda textura cambiamos por Cafe
                        for (int k = i; k < i + 10; k++)
                        {
                            for (int l = j; l < j + 10; l++)
                            {
                                copia.SetPixel(k, l, Color.Brown);
                            }
                        }
                    }
                    else if ((medR < Int32.Parse(rojos[2]) + 15 && medR > Int32.Parse(rojos[2]) - 15) && (medG < Int32.Parse(verdes[2]) + 15 && medG > Int32.Parse(verdes[2]) - 15) && (medB < Int32.Parse(azules[2]) + 15 && medB > Int32.Parse(azules[2]) - 15))
                    {//Tercera textura cambiamos por negro
                        for (int k = i; k < i + 10; k++)
                        {
                            for (int l = j; l < j + 10; l++)
                            {
                                copia.SetPixel(k, l, Color.Black);
                            }
                        }
                    }
                    else
                    {
                        for (int k = i; k < i + 10; k++)
                        {
                            for (int l = j; l < j + 10; l++)
                            {
                                c = bmp.GetPixel(k, l);
                                copia.SetPixel(k, l, c); 
                            }
                        }

                    }

                }
            }
            pictureBox2.Image = copia;
        }

        private void button3_Click(object sender, EventArgs e)
        {   //CAMBIAR COLOR POR PUNTOS
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap copia = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width; i++)
            {
                for (int j = 0; j < bmp.Height; j++)
                {
                    c = bmp.GetPixel(i, j);
                    if ((c.R<Int32.Parse(rojos[0])+15 && c.R > Int32.Parse(rojos[0]) - 15) && (c.G< Int32.Parse(verdes[0]) + 15 && c.G> Int32.Parse(verdes[0]) - 15) && (c.B< Int32.Parse(azules[0]) + 15 && c.B> Int32.Parse(azules[0]) - 15))
                    {//Primera textura cambiamos por amarillo
                        copia.SetPixel(i, j, Color.Yellow);
                    }
                    else if((c.R < Int32.Parse(rojos[1]) + 15 && c.R > Int32.Parse(rojos[1]) - 15) && (c.G < Int32.Parse(verdes[1]) + 15 && c.G > Int32.Parse(verdes[1]) - 15) && (c.B < Int32.Parse(azules[1]) + 15 && c.B > Int32.Parse(azules[1]) - 15))
                    {//Segunda textura cambiamos por Cafe
                        copia.SetPixel(i, j, Color.Brown);
                    }else if ((c.R < Int32.Parse(rojos[2]) + 15 && c.R > Int32.Parse(rojos[2]) - 15) && (c.G < Int32.Parse(verdes[2]) + 15 && c.G > Int32.Parse(verdes[2]) - 15) && (c.B < Int32.Parse(azules[2]) + 15 && c.B > Int32.Parse(azules[2]) - 15))
                    {//Tercera textura cambiamos por negro
                        copia.SetPixel(i, j, Color.Black);
                    }
                    else
                    {
                        copia.SetPixel(i, j, c);
                    }
                    
                }
            }
            pictureBox2.Image = copia;
        }

        private void button4_Click(object sender, EventArgs e)
        {
            //Guardamos el color que se seleccionó
            contador++;
            SqlConnection con = Conexion.Conectar();
            //MessageBox.Show("Conexion Exitosa");
            int r = int.Parse(textBox1.Text);
            int g = int.Parse(textBox2.Text);
            int b = int.Parse(textBox3.Text);
            id = textBox4.Text;
            SqlCommand query = new SqlCommand("INSERT INTO colores VALUES('"+id+contador.ToString()+"',"+r+","+g+","+b+");", con);
            int resp = query.ExecuteNonQuery();
            if (resp > 0)
            {
                MessageBox.Show("Datos guardados");
            }
            else
            {
                MessageBox.Show("No se guardaron los datos.");
            }
        }
    }
}
