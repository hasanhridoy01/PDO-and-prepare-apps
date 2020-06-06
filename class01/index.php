<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>PDO AND PREPARE</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.3.1-dist/css/bootstrap.css">
</head>
<body>
    
     <?php 
        
        //Database Connection
        // $connection = new mysqli('localhost','root','','ct_366');
        $connection = new PDO('mysql:host=localhost;dbname=ct_366','root','');
        
        /**
         * Data form manage
         */
        if ( isset($_POST['submit']) ) {
        	
        	//Get Data
        	$fname = $_POST['fname'];
        	$lname = $_POST['lname'];
        	$cell = $_POST['cell']; 


            /**
             * for mysqli Connection
             */
            // $sql = "INSERT INTO pdo (fname, lname, cell) VALUES (?, ?, ?)";
        	// $stmt = $connection -> prepare($sql);
        	// $stmt -> bind_param("sss", $fname, $lname, $cell);
        	// $stmt -> execute();

        	/**
            * for PDO Connection
            */ 
        	// $sql = "INSERT INTO pdo (fname, lname, cell) VALUES (:fname, :lname, :cell)";
        	// $stmt = $connection -> prepare($sql);
            // $stmt -> bindParam(':fname', $fname);
            // $stmt -> bindParam(':lname', $lname);
            // $stmt -> bindParam(':cell', $cell);
        	// $stmt -> execute();


           /**
             * for PDO Connection
             */ 
            $sql = "INSERT INTO pdo (fname, lname, cell) VALUES (:fname, :lname, :cell)";
        	$stmt = $connection -> prepare($sql);
        	$stmt -> execute([
               
            ':fname'  => $fname,
            ':lname'  => $lname,
            ':cell'   => $cell
 
        	]);

            

        }


      ?>

	 <div class="container">
	 	<div class="row">
	 		<div class="card mt-4 mx-auto shadow-lg">
	 			<div class="card-header">
	 				<h2 align="center">impromation Here</h2>
	 			</div>
	 			<div class="card-body">
	 				<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
	 					
	 					<label>First_name</label>
	 					<input type="text" placeholder="First_name" class="form-control" name="fname">

	 					<label>Last_name</label>
	 					<input type="text" placeholder="Last_name" class="form-control" name="lname">

	 					<label>Cell</label>
	 					<input type="text" placeholder="Cell" class="form-control" name="cell">

                        <input type="submit" class="btn btn-outline-info mt-2" value="Submit" name="submit">

	 				</form>
	 			</div>
	 		</div>
	 	</div>
	 </div>
      

      <script src="js/jquery-3.4.1.js"></script>
      <script src="bootstrap-4.3.1-dist/js/bootstrap.js"></script>
      <script src="js/script.js"></script>
</body>
</html>