using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace CRUD_Pract
{
    public partial class WebForm3 : System.Web.UI.Page
    {
        //Get connection string from web.config file  

        string strcon = ConfigurationManager.ConnectionStrings["dbconnection"].ConnectionString;
        //create new sqlconnection and connection to database by using connection string from web.config file  
            
            

        protected void Page_Load(object sender, EventArgs e)
        {

        }
        protected void CourseAddButton_Click(object sender, EventArgs e)
        {
            SqlConnection con = new SqlConnection(strcon);
            con.Open();


            SqlCommand cmd = new SqlCommand("INSERT INTO Courses ([ID],[Code],[Name], " + " [Teacher1],[Teacher2],[Year],[Term]) VALUES(@ID, @Code,@Name,@Teacher1,@Teacher2,@Year,@Term )", con);
            cmd.Parameters.AddWithValue("@ID", CourseIdTextBox.Text.Trim());
            cmd.Parameters.AddWithValue("@Code", CourseCodeTextBox.Text.Trim());
            cmd.Parameters.AddWithValue("@Name", CourseNameTextBox.Text.Trim());
            cmd.Parameters.AddWithValue("@Teacher1", CourseTeacher1TextBox.Text.Trim());
            cmd.Parameters.AddWithValue("@Teacher2", CourseTeacher2TextBox.Text.Trim());
            cmd.Parameters.AddWithValue("@Year", CourseYearDropDownList.SelectedValue);
            cmd.Parameters.AddWithValue("@Term", CourseTermDropDownList.SelectedValue);


            cmd.ExecuteNonQuery();
            con.Close();
        }

    }
}