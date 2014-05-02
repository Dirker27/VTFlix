<?php

function QueryDB($sql)
{
	$con = pg_connect("port=5432 dbname=debauchery user=dirker27 password=sH@dow77") 
		or die ("Failed to connect to DB: " . pg_last_error());
	$result = pg_query($con, $sql) 
		or die("Could not process query: " . pg_last_error());
	
	$i = 0;
	$rows = array();	// vals
	$rows[-1] = array();	// columns
	while ($row = pg_fetch_row($result)) {
		$rows[$i] = array();

		$j = 0;
		foreach ($row as $value) {
			$rows[$i][$j] = $value;

			if ($i == 0) {
				$rows[-1][$j] = pg_field_name($result, $j);
			}
			$j += 1;
		}

		$i += 1;
	}

	return $rows;
}

function GenerateTable($rows)
{
	$html = '<table>' . "\n";

	//- Header -------------------------------------------=
	//
	$html .= "\t<thead>\n";
	$html .= "\t\t<tr>\n";
	foreach ($rows[-1] as $col) {
		$html .= "\t\t\t<td>" . $col . "</td>\n";
	}
	$html .= "\t\t</tr>\n";
	$html .= "\t</thead>\n";

	//- Body ---------------------------------------------=
	//
	$html .= "\t<tbody>";
	$c = count($rows);
	for ($i = 0; $i < $c; $i++) {
		$html .= "\t\t<tr>\n";

		foreach ($rows[$i] as $data) {
			$html .= "\t\t\t<td>" . $data . "</td>\n";
		}

		$html .= "\t\t<tr>\n"; 
	}
	$html .= "\t</tbody>";

	$html .= '</table>';

	return $html;	
}

function GetResult()
{
	$q = $_REQUEST['query'];
	
	//~ EXTRACT INPUT TO SQL ================================ ~//
	//
	//- Relation -------------------------------------=
	//
	$sql = null;
	$table = null;


	// <Srub query here somewhere>

	$sql = $q;

	//$rows = QueryDB($sql);

	$rows = array();
	$rows[-1] = array('SSN', 'First_Name', 'Last_Name', 'Gender');
	$rows[0] = array(128629865, 'Sherlock', 'Holmes', 'M');
	$rows[1] = array(577974093, 'Moycroft', 'Holmes', 'M');
	$rows[2] = array(965836254, 'John', 'Watson', 'M');
	$rows[2] = array(971518441, 'Irene', 'Adler', 'F');
	$rows[2] = array(816629811, 'James', 'Moriarty', 'M');
	$rows[2] = array(164816494, 'Greggory', 'Lestate', 'M');

	return GenerateTable($rows);
}

?>
