<?php
	
	$sponsorName = filter_var($_POST['spon1Name'], FILTER_SANITIZE_STRING);
	$to = filter_var($_POST['spon1Email'], FILTER_SANITIZE_EMAIL);
	$sponsorPhone = filter_var($_POST['spon1phone'], FILTER_SANITIZE_PHONE);
	
	$comp = filter_var($_POST['compEnt'], FILTER_SANITIZE_NUMBER_INT);
	$geom = filter_var($_POST['geomEnt'], FILTER_SANITIZE_NUMBER_INT);
	$trig = filter_var($_POST['trigEnt'], FILTER_SANITIZE_NUMBER_INT);
	$total = filter_var($_POST['total'], FILTER_SANITIZE_NUMBER_INT);
	
	$school = filter_var($_POST['autocomplete'], FILTER_SANITIZE_STRING);
	$address = filter_var($_POST['schoolAddr'], FILTER_SANITIZE_STRING);
	$city = filter_var($_POST['city'], FILTER_SANITIZE_STRING);
	$zip = filter_var($_POST['schoolZip'], FILTER_SANITIZE_INT);
	$state = filter_var($_POST['state'], FILTER_SANITIZE_STRING);
	
	$subject = "ACTM Receipt";
	
	$message = "Receipt for ".$school.": \n\t Comprehensive: ".$comp." \n \t Algebra II W/Trig: ".$trig." \n \t Geometry: ".$geom." \n\t Total: ".$total;
	
	mail($to, $subject, $message);
	


	$conn = new mysqli($servername, $username, $password, $dbname);

	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql1 = "INSERT INTO ActmEntries (comprehensiveEntries, trigEntries, geometryEntries, total)VALUES (".$comp."," $trig.",".$geom.",".$total.")";
	$sql2 = "INSERT INTO Schools (School_Name, Address, Zip_Code, School_State)VALUES (".$school.",".$address.",".$zip.",". $state.")";
	$sql3 = "INSERT INTO Sponsors (SponsorName, SponsorEmail, SPonsorPhone)VALUES (".$sponsorName.",".$to.",".$sponsorPhone.")";
	if ($conn->query($sql1) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE ) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn->close();
	
	

echo <<< RECEIPT

	<!doctype html>
	<html lang="en">
	<head>
		<link rel="stylesheet" href="bootstrapValidator.min.css"/>
		<!-- Martin Tuck, Amy Brown, Stephen Mardis -->
		<meta name="generator" content=
			"HTML Tidy for Linux/x86 (vers 25 March 2009), see www.w3.org" />
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href=
			"https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" type=
			"text/css" /><!-- Optional theme -->
		<link rel="stylesheet" href=
			"https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css" type=
			"text/css" /><!-- Latest compiled and minified JavaScript -->
 
		<meta charset="utf-8" />

		<title>Registration Form</title>
		<link rel="stylesheet" href=
			"http://yui.yahooapis.com/pure/0.5.0/grids-responsive-min.css" type="text/css" />
		<link rel="stylesheet" href="math.css" type="text/css" />
	</head>
	<body>
		<img class="logo" src="logo.png" alt="alabama statewide math contest" />

		<div class="container">
			<h3>Thank You for registering!</h3>
			<p>An email of your receipt has been sent to you.
		</div>
	</body>
	</html>
RECEIPT;

?>