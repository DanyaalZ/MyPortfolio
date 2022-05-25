<?php error_reporting(0);

 include("connect_blog.php");
 
 date_default_timezone_set('Europe/London');

 //post variables, date and time to insert into database
 $date = date("Y/m/d");
 $time = date("H:i:sa");
 $title = $_POST['title'];
 $content = $_POST['subject'];

 //prevents sql injection for security purposes
 $date = stripcslashes($date);
 $time = stripcslashes($time);
 $title = stripcslashes($title);
 $content = stripcslashes($content);
 
 // variables becomes sql strings/variables
 $date = mysqli_real_escape_string($con, $date);
 $time = mysqli_real_escape_string($con, $time);
 $title = mysqli_real_escape_string($con, $title);
 $content = mysqli_real_escape_string($con, $content);

 //sql statment  for insertion order by month
 $sql = "INSERT INTO entries (date, time, title, content) VALUES ('$date', '$time', '$title', '$content') ORDER BY date DESC";
 
 //if query is successful redirect
 if (mysqli_query($con, $sql))
 {
  header("Location: blog_page.php");
 } 

 else 
 {
  echo "Error: " . $sql . "<br>" . mysqli_error($con);
 }

?>
