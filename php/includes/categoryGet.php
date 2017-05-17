<?php 
//allows connection to database
require("../model/db.php");

//if no category is set, does nothing
if(strval($_GET['categoryname']) == "") {
	exit;
//otherwise retrieves all resources under selected category and returns them in a table
} else {
	$catName = strval($_GET['categoryname']);
	$query = 'SELECT * FROM resources r INNER JOIN resourceTypeAssignment rta ON r.ResourceID = rta.ResourceID INNER JOIN resourceTypes rt ON 
	rt.ResourceTypeID = rta.ResourceTypeID WHERE rt.ResourceTypeName = :catname';
	$statements = array(":catname");
	$values = array($catName);
	$results = handleSQL($query, $statements, $values, 1);
	
	echo "<table class = 'table table-striped'>
	<tr>
	<th>Resource</th>
	<th>Address</th>
	<th>City</th>
	<th>Zip Code</th>
	<th>Phone</th>
	<th>Fax</th>
	<th>Email</th>
	<th></th>
	</tr>
	<tbody>";
	
	for($i = 0; $i < count($results); $i++) {
		echo "<tr>";
		echo "<td>" . $results[$i]['ResourceName'] . "</td>";
		echo "<td>" . $results[$i]['StreetAddress'] . "</td>";
		echo "<td>" . $results[$i]['City'] . "</td>";
		echo "<td>" . $results[$i]['ZIP'] . "</td>";
		echo "<td>" . $results[$i]['PhoneNUMBER'] . "</td>";
		echo "<td>" . $results[$i]['Fax'] . "</td>";
		echo "<td>" . $results[$i]['Email'] . "</td>";
		echo "<td><input type='radio' value='" .$results[$i]['ResourceID'] ."' name='resourceID'></input></td>";
		echo "</tr>";
	}

	echo "</tbody>
	</table>";
}

?>