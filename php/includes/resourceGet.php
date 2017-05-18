<?php
//allows connection to database
require("../model/db.php");

if(intval($_GET['resourceid']) == 0) {
	exit;
}

//if nothing has been selected yet from dropdown list, gets statewide resources
if (!isset($_GET['resourceid']) || !isset($_GET['county']) || !isset($_GET['number'])) {
	$id = 1;
	$county = "Statewide";
	$number = 73;
} else {
	//gets information from selected option from dropdown list
	$id = intval($_GET['resourceid']);
	$county = strval($_GET['county']);
	$county = $county ." County";
	$number = strval($_GET['number']);
}

//variables to pass as arguments to the handleSQL function
$countyAssignment = array(":countyAssignmentID", ":resourceTypeID");
$countyNumber = array($number, $id);

//returns resources from the database that are in the selected category fron the dropdown list
$sql="SELECT * FROM Resources r INNER JOIN CountyAssignment ca ON r.CountyAssignmentID = ca.CountyAssignmentID INNER JOIN ResourceTypeAssignment rta ON r.resourceID = rta.resourceID 
INNER JOIN ResourceTypes rt ON rta.resourceTypeID = rt.ResourceTypeID INNER JOIN Counties c ON c.CountyID = ca.CountyID WHERE c.CountyID = :countyAssignmentID AND rta.resourceTypeID = :resourceTypeID";

//puts results from SQL query into an array called $results
$results = handleSQL($sql, $countyAssignment, $countyNumber, 1);

//puts everything in $results array into a table
echo "<table class = 'table table-striped'>
<caption>Resources for " .$county .", WI</caption>
<tr>
<th>Resource</th>
<th>Address</th>
<th>City</th>
<th>Zip Code</th>
<th>Phone</th>
<th>Fax</th>
<th>Email</th>
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
    echo "</tr>";
}

echo "</tbody>
</table>";

?>