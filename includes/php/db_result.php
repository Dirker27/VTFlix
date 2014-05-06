<?php

function QueryDB($sql)
{
	//~ EXECUTE QUERY =========================================== ~//
	//
	// Establish connection
	$con = pg_connect("port=5432 dbname=debauchery user=dirker27 password=sH@dow77") 
		or die ("Failed to connect to DB: " . pg_last_error());
	//
	// Query database at connection
	$result = pg_query($con, $sql) 
		or die("Could not process query: " . pg_last_error());
	
	//~ DUMP RESULTS TO ARRAY =================================== ~//
	///
	// Initialize
	$rows = array();		// rows
	$rows[-1] = array();	// columns
	///
	//- Store by Rows ------------------------------------=
	//
	// Extract Rows
	$i = 0;
	while ($row = pg_fetch_row($result)) {
		$rows[$i] = array();
		//
		// Extract Values
		$j = 0;
		foreach ($row as $value) {
			$rows[$i][$j] = $value;
			//
			// Store Columnn Names on first pass
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

		$html .= "\t\t</tr>\n"; 
	}
	$html .= "\t</tbody>";

	$html .= '</table>';
	return $html;	
}

function GetResult()
{
	$ILLEGAL_COMMANDS = array(	'ALTER',
								'CREATE',
								'DROP',
								'INSERT',
								'MODIFY',
								'TRUNCATE',
								'UPDATE');
	$sql = $_REQUEST['query'];

	//~ QUERY SCRUBBING ========================================= ~//
	///
	//- If No Query Given --------------------------------=
	//
	if ($sql == '') {
		return "<p>No Query Given.</p>";
	}
	///
	//- Scan For Illegal Keywords ------------------------=
	//
	// Tokenize (get first)
	$tok = strtok($sql, " \n\t,;");
	//
	// While unscanned token
	while ($tok) {
		//
		// If in Blacklist, return error.
		$t = strtoupper($tok);
		if (in_array($t, $ILLEGAL_COMMANDS)) {
			return "<p><b>Aborted.</b><br/>Illegal Command Detected: $t</p>";
		}
		//
		// Get next token
		$tok = strtok(" \n\t,;");
	}

	//~ EXECUTE QUERY =========================================== ~//
	///
	$rows = QueryDB($sql);

	return GenerateTable($rows);
}

?>
