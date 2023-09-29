<?php

$conn = mysqli_connect("localhost:3307",
	"root", "", "clients");

if(isset($_POST["welcome"])){
    $name = mysqli_real_escape_string($conn, $_POST["name"]); 
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $gender = mysqli_real_escape_string($conn, $_POST["gender"]);
    $address = mysqli_real_escape_string($conn, $_POST["address"]);
    $employement_status = mysqli_real_escape_string($conn, $_POST["employement_status"]);

    $insert_article = "INSERT INTO clientels (name, email, gender, address, employment_status) VALUES ('$name', '$email', '$gender', '$address', '$employment_status');";
    
    if(mysqli_query($conn,$insert_article)){
        session_start();
        $_SESSION["addArticle"] = "Article Added Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <name>Put your name on the table</name>
    <link rel="stylesheet" href="css/add.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
<style>
	body{
		background-image: url('pcs/hearts.jpg');
	}
		</style>
    <div class="row">
        <div class="signUpDiv">
            <div class="box">
            <form action="form.php" method="POST" align="centre"> <!-- Corrected form action -->
            <div class="inputBox">
                    <h3>name</h3>
                    <input type="text" name="name" id="name" placeholder="enter name"> 
                </div>
                <div class="inputBox">
                    <h3>email</h3>
                    <input type="text" name="email" id="email" placeholder="enter email"> 
                </div>
                <div class="inputBox">
                    <h3>select gender</h3>
                    <select name="gender" id="gender">
                         <option value="female">female</option>
                         <option value="male">male</option>
                         <option value="other">other</option>
                    </select>
                </div>
                <div class="inputBox">
                    <h3>Address</h3>
                    <input type="text" name="address" id="address" placeholder="enter address"> 
                </div>
                <div class="inputBox">
                    <h3>select employement_status</h3>
                    <select name="employement_status">
                         <option value="Employed">Employed</option>
                         <option value="Unemployed">Unemployed</option>
                         <option value="Student">Student</option>
                         <option value="Retired">Retired</option>
                    </select>
                </div>
               
                <button name="welcome" id="btn">welcome</button>
</div> 
        </div>
    </div>
</body>
</html>
