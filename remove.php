<html>
<head>
   <title>Remove a book from the library</title>
	<style> .error { color: #FF0000; }</style>
</head>
	<?php include("header.php");
	  	  $dbhost = 'localhost';
		  $dbport='3306';
          $dbuser = 'root';
          $dbpass = 'password';
		  $dbname = 'library';
	?>
<body>
   <?php
	  
      if (isset($_POST['remove'])) {
        	$err = false;
		    if(!empty($_POST['isbn'])){
				$ISBN = $_POST['isbn'];
				$conn   = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $dbport);

				if (!$conn) {
				  die('Could not connect: ' . mysqli_error($conn));
				}
				$sql = "DELETE FROM `DOC` WHERE ISBN=${ISBN}"; //sql query to retrieve available books

				$retval = mysqli_query($conn, $sql); //executing the sql query and result is saved in retval
				if (!$retval) {
					die('Could not enter data: ' . mysqli_error($conn));
				} //if there is no return value, kill mysql because it can't enter data

				header("Refresh:0");
			} else {
				$err = true;
				$fieldErr = "Field can not be empty";
			}
      }
      ?>
	 <h1>Books Available</h1>
		  <p> 
			  <?php 

				$conn   = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $dbport);
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
   <h1> Remove A Book</h1>
	<span class="error"> *indicates a required field</span>
   <form method="post" action="<?php
      $_PHP_SELF;
      ?>">
      <table width="800" border="0" cellspacing="1" cellpadding="2">
         <tr>
            <td width="250">ISBN</td>
            <td>
               <input name="isbn" type="text" id="isbn"> <span class="error">* <?php echo $fieldErr ?></span>
            </td>
         </tr>
		 <tr>
            <td width="250"> </td>
            <td>
               <input name="remove" type="submit" id="remove" value="remove"> 
            </td>
         </tr>
      </table>
   </form>

</body>
</html>