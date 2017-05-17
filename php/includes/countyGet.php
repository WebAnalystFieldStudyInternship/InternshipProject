<?php

require("../model/db.php");

//gets state abbreviation from dropdown menu
$state = strval($_GET['statename']);

//retrieves all counties from selected state currently in database
$query = 'SELECT CountyName FROM Counties c INNER JOIN CountyAssignment ca ON c.CountyID = ca.CountyID 
	INNER JOIN States s ON ca.StateID = s.StateID WHERE s.StateID = :state';

$stateAssignment = array(':state');
$stateName = array($state);

$results = handleSQL($query, $stateAssignment, $stateName, 1);

//if there are no counties for selected state, stop script
if(count($results) == 0) {
	exit;
}

//puts all counties in a dropdown list to be selected
echo '<label>County</label><br>';
echo '<select id = "CountyName" name="CountyName">';
for($i = 0; $i < count($results); $i++) {
	echo '<option value="' .$results[$i]['CountyName'] .'">';
	echo $results[$i]['CountyName'];
	echo '</option>';
}
echo '<select>';

?>