<?php
	include('./includes/php/db_result.php');
?>

<html>
	
	<head>
		<title> Team Debauchery - Results </title>
		<link rel="stylesheet" type="text/css" href="./includes/css/style.css">
		<link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>
		<style>img{float:right;}</style>
	</head>

	<body>
	
		<div id="header" >
			<a href="http://imgur.com/1ajuN5B"><img src="http://i.imgur.com/1ajuN5B.png" float=right height=150 width=400 style="margin-right:50" /></a>
			<h2> Query Results </h2>
			<h4> Team Debauchery - Ariel Cohen - Dirk Hortensius </h4>
		</div>
	
		<div id="page_content1"
			style="border-top:solid #31F0B1 2px; padding-top:30; padding-left:30; margin-left:5; margin-right:5" >
		</div>
	
		<div id="data_display">
			<?php echo GetResult(); ?>
		</div>
		
		<div id="class details"
			align="right"
			style="font-size:.7em; margin-right:20; margin-bottom:50" >
			CS4604 @ VT - Prakash
		</div>
	</body>

<html>
