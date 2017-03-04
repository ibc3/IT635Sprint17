<html>
<head>
   <title>Sort Book in a Library</title>
</head>
	<?php 
		include("header.php");
		$dbhost = 'localhost:3306';
		$dbuser = 'root';
		$dbpass = 'JESUS+me2';
		$dbname = 'library';
	?>
<body>
   <?php
	 if (isset($_POST['submit'])) {
		 
		$choices = $_POST['choices'];
		$ascdesc = $_POST['ascdesc']; 
		$conn   = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
		if (!$conn) {
		  die('Could not connect: ' . mysqli_error($conn));
		}
		$sql = "SELECT * FROM `DOC` ORDER BY ${choices} ${ascdesc}"; //sql query to retrieve available books

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
	 }

      ?>
   <h1> Sort through books</h1>
   <form method="post" action=action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
      <table width="600" border="0" cellspacing="1" cellpadding="2">
		 <tr>
			 <td>Choose a field</td>
			 <td>
				<select name="choices">
					<option value="ISBN">ISBN</option>
					<option value="Publisher">Publisher</option>
					<option value="PublisherID">Publisher ID</option>
					<option value="LibID">Lib ID</option>
					<option value="Title">Title</option>
					<option value="borrowed">Borrowed</option>
				</select>
			</td>
		 </tr>
         <tr>
			 <td>Order the field by</td>
			 <td>
				<select name="ascdesc">
					<option value="ASC">Ascending</option>
					<option value="DESC">Descending</option>
				</select>
			 </td>
         </tr>
         <tr>
            
            <td>
               <input name="submit" type="submit" id="add" value="sort">
            </td>
         </tr>
      </table>
   </form>	
</body>
</html>