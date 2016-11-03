<html>
<head>
	<title>Movie Industry Database Query</title>
</head>

<body>
	<h1>Movie/Actor DB Query</h1>
	Project 1B Yiran Wang and Ni Zhang<br />
	Type an SQL query in the following box: <p>
	Example: <tt>SELECT * FROM Actor WHERE id=10;</tt><br />

<p>
	<form action="query.php" method="GET">
		<textarea name="query" cols="60" rows="8">

		</textarea>
		<input type="submit" value="Submit">
	</form>
</p>

<p><small>Note: tables and fields are case sensitive. Run "show tables" to see the list of available tables.</small></p>

<?php
	//establish connection
	$db_connection = new mysqli("localhost", "cs143", "", "CS143");
	if($db_connection->connect_errno > 0){
    	die('Unable to connect to database [' . $db_connection->connect_error . ']');
	}

	//get the user's query
	$mysqlQuery=$_GET["query"];
	//issue a query using database connection
	//if query is erroneous, produce error message "gracefully"
	$rs = $db_connection->query($mysqlQuery);

	if($rs === FALSE){
		print "Cannot execute the query. \n";
		$db_connection->close();
	}
	else{
?>

	<h3>Results from MySQL:</h3>

	<table border="1" cellspacing="1" cellpadding="2">
	<tbody>
	<tr align="center">
		<?php
			$finfo = mysqli_fetch_fields($rs);
			foreach ($finfo as $val) {
            	printf("<td><b>%s</b></td>",$val->name);
   			}
		?>
	</tr>

	<?php
		while($row = $rs->fetch_row()) {
	?>
		<tr align="center">
		<?php
		    foreach ($row as $val) {
		    	printf("<td><b>%s</b></td>",$val);
		    }
		?>
		</tr>
		<?php
		}
		?>
	
	</tbody>
	</table>
<?php
	
	//free up query results
	$rs->close();
	//close the database connection
	$db_connection->close();
}
?> 

</body>
</html>