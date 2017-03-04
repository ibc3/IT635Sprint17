<html>
<head>
   <title>Add book to a Library stock</title>
	<style> .error{color: #FF0000}</style>	
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
      if (isset($_POST['add'])) {
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
			  $borrowed = 0; //has value of 0 or 1, 0 means not borrowed 1 means borrowed
			  //string that reprecents a city
			  $sql = "INSERT INTO DOC (Title,Publisher, PublisherID, LibID,ISBN,borrowed,branch) VALUES " . "('$document_title','$publisher','$publisher_id','$lib_id','$ISBN',0,'$branch')";


			  $conn   = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
			  if (!$conn) {
				  die('Could not connect: ' . mysqli_error($conn));
			  }
			  $retval = mysqli_query($conn, $sql);
			  if (!$retval) {
				  die('Could not enter data: ' . mysqli_error($conn));
			  }

			  echo "Entered data successfully\n";
			  mysqli_close($conn);
	  	 }
      }
      ?>
   <form method="post" action="<?php echo htmlspecialchars(['PHP_SELF']);?>">
	  <h1> Add a book to the library </h1>
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
            <td>
				<input name="isbn" type="text" id="isbn"> <span class="error">* <?php echo $isbnErr ?></span>
			</td>
         </tr>		  
         <tr>
            <td width="200">Branch </td>
            <td>
				<input name="branch" type="text" id="branch">  <span class="error">* <?php echo $branchErr ?></span>
			</td>
         </tr>
         <tr>
            <td width="200"> </td>
            <td>
               <input name="add" type="submit" id="add" value="Add Book">
            </td>
         </tr>
      </table>
   </form>

</body>
</html>