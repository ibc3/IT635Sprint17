<html>
<head>
   <title>Search a book in the library</title>
	<style> .error { color: #FF0000;} </style>
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
      $err = false;
      if (isset($_POST['submit'])) {
          if(empty($_POST['data'])){
		  	$err = true;
			$fieldErr = " Field can not be blank";
		  } else {
		  
			  $conn   = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname, $dbport);
			  if (!$conn) {
				  die('Could not connect: ' . mysqli_error($conn));
			  }

			  $document_title  = addslashes($_POST['document_title']);
			  $publisher = addslashes($_POST['publisher']);
			  $publisher_id = $_POST['publisher_id'];
			  $lib_id = $_POST['lib_id'];
			  $ISBN = $_POST['isbn'];
			  $choices = $_POST['choices'];
			  $data = $_POST['data'];

			  $sql = "SELECT * FROM `DOC` WHERE ${choices}=${data}";

			  $retval = mysqli_query($conn, $sql);

			  if (!$retval) {
				  die('Could not enter data: ' . mysqli_error($conn));
			  }

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

				echo  '<tr align="left">' . '<td>' . $row["Title"] .'</td>' .  '<td>' . $row["ISBN"] . '</td>' . '<td>'. $row['PublisherID'] . '</td>' . '<td>' . $row['branch'] . '</td>'  . '<td>' . $row['Publisher'] . '</td>' 
					 . '<td>' . $row['LibID'] . '</td>'. '<td>' . $row['borrowed'] . '</td>' .'</tr>' ;
			 }
			 echo '</table>' ;

			 mysqli_close($conn);
		  }
      }
      ?>
   <form method="post" action="<?php
      $_PHP_SELF;
      ?>">
	  <h1> Search for a book</h1>
	  <span class="error">* Indicates a required field</span>
      <table width="600" border="0" cellspacing="1" cellpadding="2">
		 <tr>
			 <td>Search by:</td>
			 <td>
				<select name="choices">
					<option value="ISBN">ISBN</option>
					<option value="Publisher">Publisher</option>
					<option value="PublisherID">Publisher ID</option>
					<option value="LibID">Lib ID</option>
					<option value="Title">Title</option>
				</select>
			</td>
		 </tr>
         <tr>
            <td width="250">Enter Here</td>
            <td>
				<input name="data" type="text" id="data">  <span class="error">* <?php echo $fieldErr ?></span>
			</td>
         </tr>
         <tr>
            <td width="250"> </td>
            <td>
               <input name="submit" type="submit" id="add" value="Search Book">
            </td>
         </tr>
      </table>
	   

   </form>

</body>
</html>