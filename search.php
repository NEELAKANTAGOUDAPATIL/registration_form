
<html>
<head><link rel="stylesheet" type="text/css" href="style.css"></head>
<body>

<form method="post">
	<h1>SEARCH HERE</h1>
	<label style=font-size:25px align:center>Name:</label>
	<input type=text name=name required>
	<input type=submit value=submit>
</form>
</body>
</html>

<?php 
if(isset($_POST["name"])){
$connect =new mysqli("localhost","root","","detailsdb");
if (mysqli_connect_error()) {
		
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else{
	$name=$_POST["name"];
	$sql="SELECT * FROM people WHERE name ='$name' ";

   
	$result=$connect->query($sql);
	while($row=$result->fetch_assoc())
	{    
		echo "<table width=50% align:center>
		<tr><th>NAME</th>  <th>GENDER</th>   <th>PHONE</th>   <th>EDU</th></tr>";
		echo "<tr><td>".$row["name"]."</td><td>".$row["gender"]."</td><td>".$row["phone"]."</td><td>".$row["education"]."</td></tr></table>";
		}


$connect->close();
}
}
else{

}
?>