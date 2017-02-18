<html>
<head>
   <title>Generate List</title>
</head>
	<?php include("header.php");?>
<body>
   <?php
      if (isset($_POST['add'])) {
          $dbhost = 'localhost:3306';
          $dbuser = 'root';
          $dbpass = 'JESUS+me2';
		  $dbname = 'library';
          $conn   = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
          if (!$conn) {
              die('Could not connect: ' . mysqli_error($conn));
          }
		  
		  $document_title  = addslashes($_POST['document_title']);
          $publisher = addslashes($_POST['publisher']);
		  $publisher_id = $_POST['publisher_id'];
          $lib_id = $_POST['lib_id'];
      
          $sql = "INSERT INTO DOC " . "(Title,Publisher, PublisherID, LibID) " . "VALUES " . "('$document_title','$publisher','$publisher_id','$lib_id')";
		  
		  
          $retval = mysqli_query($conn, $sql);
          if (!$retval) {
              die('Could not enter data: ' . mysqli_error($conn));
          }
          echo "Entered data successfully\n";
          mysqli_close($conn);
      } else {
      ?>
   <form method="post" action="<?php
      $_PHP_SELF;
      ?>">
      <table width="600" border="0" cellspacing="1" cellpadding="2">
         <tr>
            <td width="250">Document Title</td>
            <td>
               <input name="document_title" type="text" id="document_title">
            </td>
         </tr>
         <tr>
            <td width="250">Publisher</td>
            <td>
               <input name="publisher" type="text" id="publisher">
            </td>
         </tr>
         <tr>
            <td width="250">Publisher ID</td>
            <td>
               <input name="publisher_id" type="text" id="publisher_id">
            </td>
         </tr>
		  <tr>
            <td width="250">Lib ID</td>
            <td>
               <input name="lib_id" type="text" id="lib_id">
            </td>
         </tr>
         <tr>
            <td width="250"> </td>
            <td> </td>
         </tr>
         <tr>
            <td width="250"> </td>
            <td>
               <input name="add" type="submit" id="add" value="Generate List">
            </td>
         </tr>
      </table>
   </form>
   <?php
      }
      ?>
</body>
</html>