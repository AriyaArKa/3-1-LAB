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
    public partial class UpdateCourse : System.Web.UI.Page
    {   
       
        protected void Page_Load(object sender, EventArgs e)
        {
            string strcon = ConfigurationManager.ConnectionStrings["dbconnection"].ConnectionString;
            SqlConnection con = new SqlConnection(strcon);

            if(!this.IsPostBack)
            {
                string id = Request.QueryString["ID"].Trim();
                Console.WriteLine(id);

                SqlConnection conn = new SqlConnection(strcon);
                if(conn.State == System.Data.ConnectionState.Closed)
                {
                    conn.Open();
                }

                SqlCommand cmd = new SqlCommand("SELECT * FROM Courses WHERE ID='" + id + "'", conn);
                SqlDataReader sdr = cmd.ExecuteReader();
                if(sdr.HasRows)
                {
                    sdr.Read();

                    CourseIdTextBox.Text = sdr.GetValue(0).ToString();
                    CourseCodeTextBox.Text = sdr.GetValue(1).ToString();
                    CourseNameTextBox.Text = sdr.GetValue(2).ToString();
                    CourseTeacher1TextBox.Text = sdr.GetValue(3).ToString();
                    CourseTeacher2TextBox.Text = sdr.GetValue(4).ToString();
                    CourseYearDropDownList.SelectedValue = sdr.GetValue(5).ToString();
                    CourseTermDropDownList.SelectedValue = sdr.GetValue(6).ToString();

                }
                con.Close();

            }
        }
        protected void CourseUpdateButton_Click(object sender, EventArgs e)
        {
            string strcon = ConfigurationManager.ConnectionStrings["dbconnection"].ConnectionString;
            SqlConnection con = new SqlConnection(strcon);
            if(con.State == System.Data.ConnectionState.Closed)
            {
                con.Open();
            }
            SqlCommand cmd = new SqlCommand("UPDATE Courses SET Code=@Code, Name=@Name, Teacher1=@Teacher1, Teacher2=@Teacher2, Year=@Year, Term=@Term WHERE ID=@ID", con);
            cmd.Parameters.AddWithValue("@ID", CourseIdTextBox.Text.Trim());
            cmd.Parameters.AddWithValue("@Code", CourseCodeTextBox.Text.Trim());
            cmd.Parameters.AddWithValue("@Name", CourseNameTextBox.Text.Trim());

            cmd.Parameters.AddWithValue("@Teacher1", CourseTeacher1TextBox.Text.Trim());
            cmd.Parameters.AddWithValue("@Teacher2", CourseTeacher2TextBox.Text.Trim());
            cmd.Parameters.AddWithValue("@Year", CourseYearDropDownList.SelectedValue);
            cmd.Parameters.AddWithValue("@Term", CourseTermDropDownList.SelectedValue);
            cmd.ExecuteNonQuery();
            con.Close();
            Response.Redirect("~/ListCourses.aspx");

        }
    }
}