<html>
<head>
   <title>Borrow Book from a Library Stock</title>
	<style>.error {color: #FF0000;} </style>
</head>
	<?php include("header.php");?>
<body>
   <?php
		$dbhost = 'localhost:3306';
		$dbuser = 'root';
		$dbpass = 'JESUS+me2';
		$dbname = 'library';
	
		if(isset($_POST['borrow'])){
			$err = false;
			if(empty($_POST['document_title'])){ 
			  $titleErr = " Field must have a title";
			  $err = true;
			} else {
			  $document_title  = addslashes($_POST['document_title']);

			}

			if(empty($_POST['publisher'])){
			  $publishErr = " Field must have a publisher";
			  $err = true;
			} else {
			  $publisher = addslashes($_POST['publisher']);

			}

			if(empty($_POST['publisher_id'])){ 
			  $publishidErr = " Field must have a publish ID";
			  $err = true;
			} else {
			  $publisher_id = $_POST['publisher_id'];

			}

			if(empty($_POST['lib_id'])){ 
			  $libidErr = " Field must have a library ID";
			  $err = true;
			} else {
			  $lib_id = $_POST['lib_id'];

			}

			if(empty($_POST['isbn'])){ 
			  $isbnErr = " Field must have an ISBN";
			  $err = true;
			} else {
			  $ISBN = $_POST['isbn'];

			}

			if(empty($_POST['branch'])){ 
			  $branchErr = " Field must have a branch";
			  $err = true;
			} else {
			  $branch = $_POST['branch'];
			}
			
			if(!$err){
				if(isset($_POST['borrow'])) {
					$conn   = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
					if (!$conn) {
					  die('Could not connect: ' . mysqli_error($conn));
					}
					$ISBN = $_POST['isbn'];
					$sql = "UPDATE `DOC` SET borrowed=1 WHERE ISBN=${ISBN}";
					$retval = mysqli_query($conn, $sql); //executing the sql query and result is saved in retval
					if (!$retval) {
						die('Could not enter data: ' . mysqli_error($conn));
					}

					$sql = "SELECT * FROM `DOC` WHERE borrowed=0"; //sql query to retrieve available books


					$retval = mysqli_query($conn, $sql); //executing the sql query and result is saved in retval
					if (!$retval) {
						die('Could not enter data: ' . mysqli_error($conn));
					} //if there is no return value, kill mysql because it can't enter data



					mysqli_close($conn);

					header("Refresh:0");

				}
		}
		}

      ?>

		   <h1>Books Available</h1>
	  <p> 
		  <?php 

			$conn   = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			if (!$conn) {
			  die('Could not connect: ' . mysqli_error($conn));
			}
			$sql = "SELECT * FROM `DOC` WHERE borrowed=0"; //sql query to retrieve available books


			$retval = mysqli_query($conn, $sql); //executing the sql query and result is saved in retval
			if (!$retval) {
				die('Could not enter data: ' . mysqli_error($conn));
			} //if there is no return value, kill mysql because it can't enter data

			//echo "Entered data successfully\n";
			$table =  '<table style="width:100%;">
						  <tr>
							<th style="text-align: left">Book Title</th>
							<th style="text-align: left">ISBN</th> 
							<th style="text-align: left">PublisherID</th>
							<th style="text-align: left">Branch</th>
						  </tr>';

			echo $table;
			while ($row = $retval->fetch_assoc()){
				/*foreach($row as $key => $value){
					echo $key . " " .$value;
				}*/
				echo  '<tr align="left">' . '<td>' . $row["Title"] .'</td>' .  '<td>' . $row["ISBN"] . '</td>' . '<td>'. $row['PublisherID'] . '</td>' . '<td>' . $row['branch'] . '</td>' .'</tr>' ;
			}
			echo '</table>';
			mysqli_close($conn);


		  ?>
	  </p>
		  <div>
	 <h1>Books that have been borrowed</h1>
	 	  <p> 
		  <?php 

			$conn   = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			if (!$conn) {
			  die('Could not connect: ' . mysqli_error($conn));
			}
			$sql = "SELECT * FROM `DOC` WHERE borrowed=1"; //sql query to retrieve available books


			$retval = mysqli_query($conn, $sql); //executing the sql query and result is saved in retval
			if (!$retval) {
				die('Could not enter data: ' . mysqli_error($conn));
			} //if there is no return value, kill mysql because it can't enter data

			//echo "Entered data successfully\n";
			$table =  '<table style="width:100%;">
						  <tr>
							<th style="text-align: left">Book Title</th>
							<th style="text-align: left">ISBN</th> 
							<th style="text-align: left">PublisherID</th>
							<th style="text-align: left">Branch</th>
						  </tr>';

			echo $table;
			while ($row = $retval->fetch_assoc()){
				/*foreach($row as $key => $value){
					echo $key . " " .$value;
				}*/
				echo  '<tr align="left">' . '<td>' . $row["Title"] .'</td>' .  '<td>' . $row["ISBN"] . '</td>' . '<td>'. $row['PublisherID'] . '</td>' . '<td>' . $row['branch'] . '</td>' .'</tr>' ;
			}
			echo '</table>' ;
			mysqli_close($conn);


		  ?>
	  </p>
		  </div>
	<form method="post" action="<?php $_PHP_SELF; ?>">
	  <h1> Borrow a book from the library </h1>
	  <span class="error">* Indicates a required field</span> 
      <table width="800" border="0" cellspacing="1" cellpadding="2">
         <tr>
            <td width="200">Document Title</td>
            <td>
               <input name="document_title" type="text" id="document_title"> <span class="error">* <?php echo $titleErr ?></span>
            </td>
         </tr>
         <tr>
            <td width="200">Publisher</td>
            <td>
               <input name="publisher" type="text" id="publisher"> <span class="error">* <?php echo $publishErr ?></span>
            </td>
         </tr>
         <tr>
            <td width="200">Publisher ID</td>
            <td>
               <input name="publisher_id" type="text" id="publisher_id"> <span class="error">* <?php echo $publishidErr ?></span>
            </td>
         </tr>
		  <tr>
            <td width="200">Lib ID</td>
            <td>
               <input name="lib_id" type="text" id="lib_id"> <span class="error">* <?php echo $libidErr ?></span>
            </td>
         </tr>
         <tr>
            <td width="200">ISBN </td>
            <td> <input name="isbn" type="text" id="isbn"> <span class="error">* <?php echo $isbnErr ?></span> </td>
         </tr>		  
         <tr>
            <td width="200">Branch </td>
            <td> <input name="branch" type="text" id="branch"> <span class="error">* <?php echo $branchErr ?></span> </td>
         </tr>
         <tr>
            <td width="200"> </td>
            <td>
               <input name="borrow" type="submit" id="borrow" value="Borrow Book">
            </td>
         </tr>
      </table>
   </form>

</body>
</html>