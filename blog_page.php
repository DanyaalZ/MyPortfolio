  <?php
  //start session
       session_start();
  ?>

  <html>

    <header>

      <hgroup>
        <meta charset="utf-8">
        <title> Home Page </title>
        <link rel="stylesheet" href="reset.css">
        <link rel="stylesheet" href="blog_page.css">
        <nav>
          <ul>
                 <li> <a href = "blog_page.php"> | Home |</a> </li>
                 <li> <a href = #about> | About Myself  |</a> </li>
                 <li> <a href = "#skills"> | Skills and Achievements |</a> </li>
                 <li> <a href = "#education"> | Education and Qualifications |</a> </li>
                 <li> <a href = "#experience"> | Experience |</a> </li>
                 <li> <a href = "#contact"> | Contact |</a> </li>
                 <li> <a href = "#blog"> | Blog |</a> </li>
            </ul>
        </nav>
      </hgroup>
 
    </header>

    <body>
      <aside>
        <h1> Welcome user </h1>
      </aside>

      <aside>
        <figure>
          <img src = "headshot.jpg" alt = "My headshot" id = "picture" height = "150" width = "200" style = "margin-left: 660; margin-top: 45;"> </img>
          <figcaption Headshot> </figcaption>
        </figure>
      </aside>

      <article>
        <h1> Danyaal Naseem Zar </h1>
      </article>

      <aside id = "logout">
        <form method = "POST" action="logout.php">
          <input type="submit" value="Log out" style="position: absolute;top:70;right:30;">
        </form>
      </aside>

      </br>

      <article style = "padding: 25px;" id = "about">
        <h1> About Myself </h1>
        <p> I am a student at Queen Mary University of London studying a three year bachelor’s course in Computer Science. In my free time, I enjoy working on myself both mentally and physically. This entails meeting new people to offer unique perspectives in life, reading up on a variety of topics, and going to the gym to keep myself physically fit. I am motivated by the prospect of living a luxurious and exorbitant lifestyle, which I hope to achieve through my degree. This links to my ambitions – with my main career goal being to end up in the software engineering sector. </p>
      </article>

     <hr>


     <article style = "text-align: center;" id = "skills">
       <h1> Skills and Achievements </h1>
       <p> Skills </p>
       </br>
       <p id = "small"> • Strong written and verbal communication - having achieved a Level 8 in GCSE English Language, and an A* in A Level English Literature </p>
       </br>
       <p id = "small"> • Drive and Motivation - highly motivated to achieve the greatest I possibly can without limits, and goal oriented </p>
       </br>
       <p id = "small"> • Leadership - never afraid to step up in a situation where it's necessary. Fear is not a quality I associate with myself </p>
      </br>
       <p id = "small"> • Organisation - having things neat and legible is imperative to being able to organise yourself and your work, and I apply this to all aspects of my life </p>
     </article>

     <hr>


     <article style = "text-align: center;" id = "education">
       <h1> Education and Qualifications </h1>
       <p> Education </p>
       <p id = "small"> The Hollyfield School and Sixth Form Centre 2014-2021 </p>
       <p id = "small"> • GCSEs - Achieved 10 GCSEs 9-4. One 9 (Distinction *), Three 8s, Three 7s, One 6 </p>
       <p id = "small"> • A Levels - Achieved A* English Literature, B Computer Science, Distinction * Media (A* equivalent) </p>
       <p id = "small"> Queen Mary University of London 2021-2024 </p>
       <p id = "small"> • Currently studying a Bachelor's degree in Computer Science at Russell Group University Queen Mary University of London </p>
     </article>

     <hr>

     <article style = "text-align: center; padding: 25px;" id = "experience">
       <h1> Experience </h1>
       <p> Two years - delivering newspapers to local residences, in this time I acquired skills such as punctuality and compartmentalisation </p>
     </article>

     <hr>

     <article style = "text-align: center;" id = "contact">
       <h1> Contact </h1>
         <div id = "contact">
         <p> My details - zardanyaal@gmail.com </p>
       </div>
     </article>
    
     <hr>

     <article style = "text-align: center; id = "blog">
       <h1> Blog </h1> 
       <br>
       <p> Blog Entries here: </p>
       <hr>

       <form name = "login" id = "login" method = "POST" action="post_blog.php">
         <fieldset>
         <label for="title">Title</label>
         <input type="text" id="title" name="title" placeholder="Title">
         <label for="subject"> Content </label>
         <textarea id="subject" name="subject" placeholder="Content" style="height:200px"></textarea>
         <button style = "height: 25; width: 75;" id = "submitter" name= "submitter" onclick = "validateForm()"> Post </button>
         <button style = "height: 25; width: 75;" id = "toReset" onclick = "resetter()"> Clear </button> 
         <button style = "height: 25; width: 75;" id = "toPreview" onclick = "preview()"> Preview </button> 
         </fieldset>
       </form>
       <hr>

      <script>
       //reset
       function resetter(event)
       { 
         form.addEventListener('submit', preventForm);

         if (window.confirm("Would you like to clear the post content?") == true)
         {
           document.getElementById("login").reset(); 
         }
      
         preventForm(event);
       }
       
       //prevent default 
       var form = document.getElementById('login');

       function preventForm(event) 
       {
          event.preventDefault(); 
       } 

       //Cookies to parse into php

       function setCookie()
       {  
          var a = document.forms["login"]["title"].value;
          var b = document.forms["login"]["subject"].value;

          document.cookie = "title" + "=" + JSON.stringify(a) + ";path=/";
          document.cookie = "content" + "=" + JSON.stringify(b) + ";path=/";
       }

       //Preview page
       function preview(event)
       {
         form.addEventListener('submit', preventForm);

         var a = document.forms["login"]["title"].value;
         var b = document.forms["login"]["subject"].value;
         
         //ensure fields are not empty
         if (a == "" && b == "")
         {
           alert("One or more fields are empty");
           document.getElementById("title").style.borderColor = "red";
           document.getElementById("subject").style.borderColor = "red";
           preventForm(event);
         }


         if (a == "")
         {
           alert("One or more fields are empty");
           document.getElementById("title").style.borderColor = "red";
           preventForm(event);
         }

         if (b == "")
         {
           alert("One or more fields are empty");
           document.getElementById("subject").style.borderColor = "red";
           preventForm(event);
         }

         else
         {
             //set the cookies
             setCookie();
             window.location="preview.php";
         }

         preventForm(event);
       }

       //check empty fields and if empty return empty
       function validateForm(event)
       {
         form.addEventListener('submit', preventForm);

         var a = document.forms["login"]["title"].value;
         var b = document.forms["login"]["subject"].value;

         if (a == "" && b == "")
         {
           alert("One or more fields are empty");
           document.getElementById("title").style.borderColor = "red";
           document.getElementById("subject").style.borderColor = "red";
           preventForm(event);
         }


         if (a == "")
         {
           alert("One or more fields are empty");
           document.getElementById("title").style.borderColor = "red";
           preventForm(event);
         }

         if (b == "")
         {
           alert("One or more fields are empty");
           document.getElementById("subject").style.borderColor = "red";
           preventForm(event);
         }

         else
         {
          document.getElementById("login").submit();
         }
       }
      
      </script>

      <?php 
        //print out blog
        include("connect_blog.php");

        $sql = "SELECT * FROM entries"; //order by
        $result = mysqli_query($con, $sql);
        

        //if rows exist print them out
        if (mysqli_num_rows($result) > 0) 
        {
          while($row = mysqli_fetch_assoc($result)) 
          {
            echo "<p style = 'color: green;'> <small>". $row["date"]. "</small> <br> <p style = 'color:green;'> <small>". $row["time"] . "</small> <br> <p>". $row["title"]. "<br> <p> <small>". $row["content"] . "</small> <hr>";
          }

        }

        mysqli_close($con);
      ?>

     </article>

     </body>

     <footer>
       <hr>
       <p id = "copy"> &copy; 2022 </p>
     </footer>

</html>

