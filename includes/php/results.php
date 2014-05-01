<?php
	$r = $_REQUEST['relation'];
	$q = $_REQUEST['query'];

	//echo 'RELATION: ' . $r . "<br/>";
	//echo 'QUERY: ' . $q . "<br/>";

	$sql = ';';
	switch($q) {
		case 1:
		$sql = 'SELECT COUNT(*) FROM Performer;';
		break;

		case 2:
		$sql = 'SELECT COUNT(*) FROM Director;';
		break;

		default:
		break;
	}

	$con = pg_connect("port=5432 dbname=debauchery user=Dirker27 password=sH@dow77") 
		or die ("Failed to connect to DB: " . pg_last_error());
	$result = pg_query($con, $sql) 
		or die("Could not process query: " . pg_last_error());
?>

<html>
	
	<head>
		<title> Results? </title>
	</head>

	<body>
		<?php echo $result; ?>
	</body>

<html>