<?php error_reporting(0);

 include("connect.php");


 //post variables
 $username = $_POST['email'];
 $password = $_POST['password'];

 //prevent sql injection
 $username = stripcslashes($username);
 $password = stripcslashes($password);
 
 //make sql strings/variables
 $username = mysqli_real_escape_string($con, $username);
 $password = mysqli_real_escape_string($con, $password);


 //sql statment for finding the username and password entered by the user in the database
 $sql = "select * from login where username = '$username' and password = '$password'";
 $result = mysqli_query($con, $sql);
 //return results as an array
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 //number of rows which returned a result
 $count = mysqli_num_rows($result);

 if (isset($username) && isset($password))
 {
  
   //if records of database are found within rows then print success
   //if number of records returns a result that there is a match
   if(!$count == 0)
   {
    if($username == "username@username.com" && $password == "password1a")
    {
       echo "Login successful";   
       header("Location: blog_page.php");
    }

    else if($username == "admin@admin.com" && $password == "password2")
    {
      echo "Login successful";
      header("Location:admin.php");
    }
    
   }

   //otherwise do not
   else if ($count == 0)
   {
     echo '<script type = "text/JavaScript">
     window.alert("Enter correct Username and Password");
     </script>';
   }
}

?>

<html lang = "en">
  <header>
    <meta charset = "utf-8">
    <title> Log in page </title>
  </header>
  
  <body style = "background-color: grey;">
    
  </body>
</html>
