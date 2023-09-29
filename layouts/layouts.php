<?php
   class layouts{
       public function headers($conf){
           ?>

<html lang="en" data-bs-theme="auto">
   <head>
   <meta charset="UTF-8">
        <meta name=" viewport" content=" width=device-width, initial-scale=1.0">
        <title>FORMS</title>
        <!--Where i am getting my fonts :D -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

        <!--CSS FILE LINK-->
        <link rel="stylesheet" href="css/lay.css">
   </head>
   <body>
   <header>

<div id="menu-bar" class="fas fa-bars">  </div>

<a href="#" class="logo"><span>Hello</span>(๑•̀ㅂ•́)و✧</a>

<nav class="navbar">
<a href="form.php">Hello</a>
<a href="form.php#">Enter</a>
<a href="form.php#">Your</a>
<a href="form.php#">Details</a>
<a href="form.php#">Logout</a>


</nav>
<div class="icons">
<i class="fas fa-search" id="search-btn"></i>
<a href="#">
<i class="fas fa-user" id="login-btn"></i>
</a>
</div>

<form action="" class="search-bar-container">
<input type="search" id="search-bar" placeholder="search here <3 ">
<label for="search-bar" class="fas fa-search"></label>
</form>
       </body>
      <?php
         }
             public function table($conf){
               

                   ?>
                   <?php

// Connect syntax
$connect = mysqli_connect("localhost:3307",
	"root", "", "clients");

// Display data from geeksdata table
$query ="SELECT * FROM clientels";

// Storing it in result variable
$result = mysqli_query($connect, $query);
?>


<html>

<head>
<link rel="stylesheet" href="css/lay.css">
	<script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
	</script>
	
	<link rel="stylesheet" href=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	
	<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js">
	</script>
	</head>

<body>
	<div class="container" style="width:900px;">
		

		
		<br />
		
		<!-- After clicking on submit button
			export.php code is revoked -->
		<form method="post" action="#"
			align="center">
			<input type="submit" name="export"
				value="hallo"
				class="btn btn-success" />
		</form>
		<br />

		<!-- Code for table because our data is
			displayed in tabular format -->
		<div class="table-responsive" id="employee_table">
			<table class="table table-bordered">
				<tr>
					

					<th width="35%">id</th>
					<th width="10%">name</th>
					<th width="20%">email</th>
					<th width="20%">gender</th>
					<th width="20%">address</th>
               
				</tr>
				<?php
				
				// Fetching all data one by one using
				// while loop
				while($row = mysqli_fetch_array($result)) {
				?>
				
				<!-- taking attributes and storing
					in table cells -->
				<tr>
					<!-- column names in table -->
					<td><?php echo $row["id"]; ?></td>
					<td><?php echo $row["name"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["gender"]; ?></td>
					<td><?php echo $row["address"]; ?></td>
					
				</tr>
				<?php	
				}?>
			</table>
			<!-- Closing table tag -->
		</div>
		<!-- Closing div tag -->
	</div>
</body>

</html>
                <?php
                }
    }