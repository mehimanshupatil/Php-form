<?php
   session_start();
   ?>
<html>
   <head>
      <title>id card</title>
      <link href = "end.css" type = "text/css" rel = "stylesheet" />
   </head>
   <body>
      <div class="id-card-tag"></div>
      <div class="id-card-tag-strip"></div>
      <div class="id-card-hook"></div>
      <div class="id-card-holder">
         <div class="id-card">
            <div class="header">
               <img src="https://getmyuni.azureedge.net/college-image/small/atharva-college-of-engineering-ace-mumbai.jpg" align="left">
               <center>
               <br/>
               <h3>
                  ATHARVA EDUCATION TRUST'S
               </h3>
               ATHARVA COLLEGE OF ENGINEERING
               <p>
                  (Approved by AICTE Recognised by DTE and affiliated to the University of Mumbai)<br/>
                  (ISO 9001-2000 Certified)
               </p>
               <h2>ACADEMIC YEAR 2017-18</h2>
               <br/>
            </div>
            <br/>
            <div class="photo">
               <img src="<?php echo $_SESSION['photo'] ?>" alt="John" style="">
            </div>
            <A >NAME : <?php echo $_SESSION['name']; ?></A><br><br>
            <A>Class : <?php echo $_SESSION['department']."-".$_SESSION['class']."-".$_SESSION['rollno'] ; ?></a><br><br>
            <A>DOB : <?php echo $_SESSION['dob']; ?></a><br><br>
            <a style="float:right; margin-right: 80px; ">Principal's Signature</a>
            <br/>
         </div>
      </div>
      <?php
         // remove all session variables
         session_unset(); 
         
         // destroy the session 
         session_destroy(); 
         ?>
   </body>
</html>
