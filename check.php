<html>
<head> 
	<title> Result Page </title> 
</head>

<body>
	


	<?php
		// get the User Name and Password
		$usrName = $_POST['usrName']; 
		$pwd = $_POST['pwd'];
		echo "User Name: ".$usrName. "<br>". "Password: ".$pwd. "<br>"; 

		// start a connection to the mysql server and choose the database
		$conn = mysql_connect("localhost", "root", "patricia") or
				die("Connection failed");

		$mydb=mysql_select_db("LogIn");
		
			
		// write the required sql query
		$sql = "SELECT * FROM User_information where BINARY User_name='".$usrName."' and BINARY Password='".$pwd."';";
		echo $sql, "<br><br>";
				
		$result = mysql_query($sql);
		$numrows = mysql_num_rows($result);
		echo $numrows, "<br><br>";
		
		if ($numrows != 0)
		{
			$row = mysql_fetch_array($result);
			$name = $row['userName'];
			$passcode = $row['password'];

			echo "it worked";

			if ($name == $usrName and $passcode == $pwd)
			{
				echo "Welcome ".$usrName."!!";
			}
			
		}

		else
		{
			echo $usrName.", Your Log In information is incorrect";
		}
		
		
		

		

	?>

</body>
</html>
