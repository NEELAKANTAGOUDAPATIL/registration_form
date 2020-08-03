<?php 

$connect =new mysqli("localhost","root","","detailsdb");
if (mysqli_connect_error()) {
		
		die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}
else{
$name=$gender=$phone=$education='';
if(!isset($_POST['name'])||!isset($_POST['gender'])||!isset($_POST['phone'])||!isset($_POST['education']))
	echo "feilds mssing";
else{
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $phone=$_POST['phone'];
    $education=$_POST['education'];

    $sql1 = "SELECT phone FROM people WHERE phone = ? Limit 1";
    $sql="INSERT INTO people(name,gender,phone,education) VALUES(?,?,?,?)";
     			$stmt = $connect->prepare($sql1);
			$stmt->bind_param("s",$phone);
			$stmt->execute();
			$stmt->bind_result($phone);
			$stmt->store_result();
			$rnum = $stmt->num_rows;


			//get data from db and check
			if ($rnum==0) {
				$stmt->close();

					$stmt = $connect->prepare($sql);
					$stmt->bind_param("ssss",$name,$gender,$phone,$education);
					$stmt->execute();
					    $act="registration successful";
				}
				else{
					$act="phone number already registered";
				}
				$stmt->close();
			
	}
	$connect->close();
	}		
?>
<html>
<head>
	 <link rel="stylesheet" type="text/css" href="style.css"></head>
<body>
	<div class=res>
		<h1><?php echo $act ?></h1>
			<br> </br>
			<a href="index.php"><h1>go to registration</h1></a>
			
			<a href="search.php"><h1>search name</h1></a>
		</div>
	</body>
	</html>


	 
