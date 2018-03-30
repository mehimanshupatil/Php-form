<?php
// Start the session
session_start();
header("refresh:2;url=end.php");
//initial value assign if there is error submitting data
$_SESSION["rollno"] = "0";
$_SESSION["name"] = "error";
$_SESSION["department"] = "error"; 
 $_SESSION["class"] = "0";
  $_SESSION["dob"] = "0000-00-00";
 $_SESSION["photo"] = "images/error.jpg";

?> 

<?php
$servername = "localhost";
$username   = "id2479884_admin";
$password   = "admin";
$dbname     = "id2479884_student";
// Create connection
$conn       = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully<br/>";
?> 

<?php
//data fetch
$name       = $_POST['name']; // required
$rollno     = $_POST['rollno']; // required
$phoneno    = $_POST['phoneno']; // required
$photo      = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
$department = $_POST['department'];
$class      = $_POST['class'];
$gender     = $_POST['gender'];
$blood      = $_POST['blood'];
$email      = $_POST['email'];
$address    = $_POST['address'];
$dob        = $_POST['dob'];
?>
<?php
//photo validation
$target_dir    = "images/";
$target_file   = $target_dir . basename($_FILES["photo"]["name"]);
$uploadOk      = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["photo"]["tmp_name"]);
    if ($check !== false) {
        echo "<br/>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["photo"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<br/>Sorry, your data was not uploaded.";
    // if everything is ok, try to upload file
} else {
    //start of main bracket
    //inset data
    $post_image = "$target_dir" . $department . "-" . $class . "-" . $rollno . "." . $imageFileType;
    $sql        = "INSERT INTO student (rollno, name, phoneno, photo, department,class,gender,dob,email,blood,address)
VALUES ('$rollno', '$name', '$phoneno' ,'$post_image','$department','$class','$gender','$dob','$email','$blood','$address')";
    
    //start
    if ($conn->query($sql) === TRUE) {
        echo "your data inserted";
        //img upload
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "<br/>The photo " . basename($_FILES["photo"]["name"]) . " has been uploaded.";
            
            //rename uploaded file
            rename($target_file, $post_image);
            
        } else
            echo "Sorry, there was an error uploading your file.";
        //retrive data
        $sql    = "SELECT * FROM student where rollno='$rollno' AND department='$department' AND class='$class'";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                $_SESSION["rollno"]     = $row['rollno'];
                $_SESSION["name"]       = $row['name'];
                $_SESSION["department"] = $row['department'];
                $_SESSION["class"]      = $row['class'];
                $_SESSION["dob"]        = $row['dob'];
                $_SESSION["photo"]      = $row['photo'];
                //   echo "<br/>--------------------------------<br>" . "<br/>Rollno :{$row['rollno']}  <br> " . "--------------------------------<br>" . "NAME : {$row['name']} <br> " . "--------------------------------<br>" . "Department : {$row['department']} <br> " . "--------------------------------<br>" . "Class : {$row['class']} <br> " . "--------------------------------<br>" . "DOB : {$row['dob']} <br> " . "--------------------------------<br>" . "Email : {$row['email']} <br> " . "--------------------------------<br>" . "Gender : {$row['gender']} <br> " . "--------------------------------<br>" . "Blood Group : {$row['blood']} <br> " . "--------------------------------<br>" . "Address : {$row['address']} <br> " . "--------------------------------<br>" . "Phone No : {$row['phoneno']} <br> " . "--------------------------------<br>" . "<img src=$row[photo] height=200px width=200px>";
            }
        } else
            echo "0 results";
        
    } else
        echo "Error: <br>" . $conn->error;
    //  echo "Error: " . $sql . "<br>". $conn->error;
}
?>

        
<?php
$conn->close();
?>
