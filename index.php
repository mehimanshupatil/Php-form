<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href = "home.css" type = "text/css" rel = "stylesheet" />
     
   </head>
   <body>
       <h2>Basic Form</h2>
      <div class="container">
         <form name = "form1" action="submit.php" method = "post" enctype = "multipart/form-data" >
            <div class="row">
               <div class="col-25">
                  <label>Department:</label>
               </div>
               <div class="col-75">
                  <select name="department" >
                     <option value="ce">Computer Engineering</option>
                     <option value="it">Information Technology</option>
                     <option value="ie">Industrial Electronics</option>
                     <option value="ee">Electronic Engineering</option>
                  </select>
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label>Class:</label> 
               </div>
               <div class="col-75">
                  <select name="class" >
                     <option value="1">1</option>
                     <option value="2">2</option>
                  </select>
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label>Name:</label>    
               </div>
               <div class="col-75">
                  <input type = "text" name = "name" value = "" placeholder="Full Name" required/>   
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label>Rollno:</label>    
               </div>
               <div class="col-75">
                  <input type = "text" name = "rollno" value = "" placeholder="Roll No." required/>   
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label>Gender:</label>    
               </div>
               <div class="col-75">
                  <input type="radio" name="gender" value="male" required> Male
                  <input type="radio" name="gender" value="female" required> Female
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label>DOB:</label>     
               </div>
               <div class="col-75">
                  <input type="date" name="dob" required/>   
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label>Blood group:</label>    
               </div>
               <div class="col-75">
                  <select name="blood" >
                     <option value="a+">A Positive</option>
                     <option value="a-">A Negative</option>
                     <option value="b+">B Positive</option>
                     <option value="b-">B Negative</option>
                     <option value="ab+">AB Positive</option>
                     <option value="ab-">AB Negative</option>
                     <option value="o+">O Positive</option>
                     <option value="o-">O Negative</option>
                     <option value="unknown">Unknown</option>
                  </select>
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label>Phoneno:</label>    
               </div>
               <div class="col-75">
                  <input type = "text" name = "phoneno" value = "" required/>    
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label>Email ID:</label>    
               </div>
               <div class="col-75">
                  <input type = "email" name = "email" value = "" required/>        
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label>Photo:</label>    
               </div>
               <div class="col-75">
                  <input type="file" name="photo" value="" id="photo" required/>
               </div>
            </div>
            <div class="row">
               <div class="col-25">
                  <label>Address:</label>    
               </div>
               <div class="col-75">
                  <textarea style="height:200px" name="address" placeholder="Enter address here..."></textarea>
               </div>
            </div>
            <div class="row">
               <input type="submit" name="submit" value="Submit">
            </div>
            <br/>
            <div class="row">
               <button type="reset" value="Reset">Reset</button>
            </div>
         </form>
      </div>
   </body>
</html>
