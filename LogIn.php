<html>
<head>
   <title>Log Into in MySQL Database</title>
</head>
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
          } //LOGING INTO THE DATABASE
		  
		  $UserName = addslashes($_POST['UserName']); //CREATING THE USERNAME
          $Password = addslashes($_POST['Password']); //CREATING THE PASSWORD
		 
          
      
          $sql = "SELECT * FROM USER  WHERE User_Type_Admin = 'Y'
			  AND LoginName = '$UserName' AND Password = '$Password';"; //GETTING THE USER INFORMATION
			 
		  
		  
          $retval = mysqli_query($conn, $sql);
          if (mysqli_num_rows($retval)==0) { //COUNTS THE NUMBER OF ROW TO FIND THE USER INFORMATION
              echo "Invalid User\n";
          }
		  else{
			  header('Location: http://localhost/addbook.php'); 
			  die;
		  }
          mysqli_close($conn);
      } else {
      ?>
   <form method="post" action="<?php //THE BELOW IS JUST A FORM THE ASK FOR THE USERNAME, PASSWORD,
      $_PHP_SELF;
      ?>">
      <table width="600" border="0" cellspacing="1" cellpadding="2">
         <tr>
            <td width="250">User Name</td>
            <td>
               <input name="UserName" type="text" id="UserName">
            </td>
         </tr>
         <tr>
            <td width="250">Password</td>
            <td>
               <input name="Password" type="Password" id="Password">
            </td>
         </tr>
         <tr>
            <td width="250"> </td>
            <td>
               <input name="add" type="submit" id="add" value="Log In">
            </td>
         </tr>
      </table>
   </form>
   <?php
      }
      ?>
</body>
</html>