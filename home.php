<html>

	<head>
		<title> Debauchary's VTFlix</title>
	</head>

	<body onload="load_content()" style="background-color:#AAAAAA">
		<div id="page_content">
			<?php echo '<p>Hello World!</p>'; ?>
		</div> 
	</body>

</html>


<?php
	include('../ANOTHERFILE.php');

	$header = '<head><title>FART</title></head>' . "\n";
	$body = '<body>BIGGER FART</body>' . "\n";

	$req = 'SELECT * FROM STUDENTS;';
	$res = db->Exec($req);


	while ($res)
	echo $res[0]['FIRST_NAME'];

	echo '<html>' . $header . $body . '</html>';
?>