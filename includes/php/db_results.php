<?php

include('./includes/php/query.php');
include('./includes/php/relation.php');

function QueryDB($sql)
{
	$con = pg_connect("port=5432 dbname=debauchery user=dirker27 password=sH@dow77") 
		or die ("Failed to connect to DB: " . pg_last_error());
	$result = pg_query($con, $sql) 
		or die("Could not process query: " . pg_last_error());
	
	return $result;
}

function GetResult()
{
	$r = $_REQUEST['relation'];
	$q = $_REQUEST['query'];
	
	//~ EXTRACT INPUT TO SQL ================================ ~//
	//
	//- Relation -------------------------------------=
	//
	$sql = null;
	$table = null;
	switch($r) {
		case 1:
		$sql = 'SELECT COUNT(*) FROM Performer;';
		$table = Relation1(QueryDB($sql));
		break;

		case 2:
		$sql = 'SELECT COUNT(*) FROM Director;';
		$table = Relation2(QueryDB($sql));
		break;

		case 3:
		$sql = 'SELECT COUNT(*) FROM MovieInfo;';
		$table = Relation3(QueryDB($sql));
		break;

		case 4:
		$sql = 'SELECT COUNT(*) FROM TVEpisodeInfo;';
		$table = Relation4(QueryDB($sql));
		break;

		case 5:
		$sql = 'SELECT COUNT(*) FROM UserInfo;';
		$table = Relation5(QueryDB($sql));
		break;

		default:
		break;
	}

	//- Query ----------------------------------------=
	//
	switch($q) {
		case 1:
		$sql = 'SELECT COUNT(*) FROM Performer;';
		$table = Query1(QueryDB($sql));
		break;

		case 2:
		$sql = 'SELECT COUNT(*) FROM Director;';
		$table = Query2(QueryDB($sql));
		break;

		case 3:
		$sql = 'SELECT COUNT(*) FROM MovieInfo;';
		$table = Query3(QueryDB($sql));
		break;

		case 4:
		$sql = 'SELECT COUNT(*) FROM TVEpisodeInfo;';
		$table = Query4(QueryDB($sql));
		break;

		case 5:
		$sql = 'SELECT COUNT(*) FROM UserInfo;';
		$table = Query5(QueryDB($sql));
		break;

		default:
		break;
	}
	
	return $table;
}

?>
