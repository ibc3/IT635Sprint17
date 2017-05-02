<html>
<head>
   <title>Generate List of Books in a Library</title>
</head>
	<?php include("header.php");
	  	$dbhost = 'localhost';
		$dbport='3306';
        $dbuser = 'root';
        $dbpass = 'password';
		$dbname = 'library';?>
<body>
	<h1> ALL BOOKS </h1>
	
	<?php
		$conn   = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $dbport);
		if (!$conn) {
		  die('Could not connect: ' . mysqli_error($conn));
		}
		$sql = "SELECT * FROM `DOC`"; //sql query to retrieve available books

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
						<th style="text-align: left">Publisher</th>
						<th style="text-align: left">LibID</th>
						<th style="text-align: left">Borrowed</th>
						
					  </tr>';

		echo $table;
		while ($row = $retval->fetch_assoc()){
			if($row['borrowed'] == 1){
				$row['borrowed'] = 'yes';
			} else {
				$row['borrowed'] = 'no';
			}
			/*foreach($row as $key => $value){
				echo $key . " " .$value;
			}*/
			echo  '<tr align="left">' . '<td>' . $row["Title"] .'</td>' .  '<td>' . $row["ISBN"] . '</td>' . '<td>'. $row['PublisherID'] . '</td>' . '<td>' . $row['branch'] . '</td>'  . '<td>' . $row['Publisher'] . '</td>' 
				 . '<td>' . $row['LibID'] . '</td>'. '<td>' . $row['borrowed'] . '</td>' .'</tr>' ;
		}
		echo '</table>' ;
		mysqli_close($conn);
	?>

</body>
</html>