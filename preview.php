  <?php error_reporting(0);
       
      date_default_timezone_set('Europe/London');
      
      $title = $_COOKIE['title'];
      $content = $_COOKIE['content'];

      //get rid of quotes on cookies
      $title = ltrim($title, '"');     
      $title = rtrim($title, '"');

      $content = ltrim($content, '"');     
      $content = rtrim($content, '"');


      //for user to see
      $date = date("Y/m/d");
      $time = date("H:i:sa");
  ?>

  <html>
    <header>

      <hgroup>
        <meta charset="utf-8">
        <title> Preview </title>
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="blog_page.css">
      </hgroup>

    </header>

    <body>

    <article style = "text-align: center; id = "blog">
      <h1> PREVIEW POST </h1> 
      
      <hr>

      <?php
           echo "<p style = 'color:green;'> <small>" . $date . "</small> <p style = 'color:green;'> <small>" . $time . "</small> <p>" . $title . "</p>" . "<p>" . $content . "</p>";
      ?>
      
      <form id = "pre" method = POST action = post_blog.php>
           <button style = "height: 25; width: 75;" onclick = "toSubmit()"> Submit </button>
           <button style = "height: 25; width: 75;" onclick = "goBack()"> Cancel </button>
           <input type = "hidden" id = "title" name = "title" value = "<?php echo htmlspecialchars($title);?>" > 
           <input type = "hidden" id = "subject" name = "subject" value = "<?php echo htmlspecialchars($content);?>" > 
      </form>

      <hr>
      

      <script>
        function preventForm(event) 
        {
          event.preventDefault(); 
        } 

        function goBack()
        {
          var form = document.getElementById("pre");
          form.addEventListener("submit", preventForm);
          
          preventForm(event);
          window.location.assign("blog_page.php");
        }

        function toSubmit()
        {
           document.getElementById("pre").submit();
        }
      </script>

    </article>

    </body>

    <footer>
      <hr>
      <p id = "copy"> &copy; 2022 </p>
    </footer>

</html>

