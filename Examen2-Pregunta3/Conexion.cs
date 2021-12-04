using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Data;
using System.Data.SqlClient;

namespace Imagenes
{
    class Conexion
    {
        public static SqlConnection Conectar()
        {
            SqlConnection cn = new SqlConnection("SERVER=DESKTOP-RMB721I\\SQLEXPRESS; DATABASE=colores;Integrated security=true");
            cn.Open();
            return cn;
        }
    }
}
