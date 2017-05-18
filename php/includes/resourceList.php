<?php
//allows connection to database
require("../model/db.php");

//if no county has been clicked yet, gets information for nationwide resources
if (!isset($_GET['county']) || !isset($_GET['number'])) {
	$county = "Statewide";
	$number = 73;
} else {
	//gets information from clicked county
	$county = strval($_GET['county']);
	$number = strval($_GET['number']);
}

//variables to pass as arguments to the handleSQL function
$countyAssignment = array(":countyAssignmentID");
$countyNumber = array($number);

//query to find all resource categories that are located in the selected county
$sql="SELECT DISTINCT rt.ResourceTypeID, ResourceTypeName FROM ResourceTypes rt Inner Join ResourceTypeAssignment rta ON rt.ResourceTypeID = rta.ResourceTypeID INNER JOIN Resources r ON r.ResourceID = rta.ResourceID INNER JOIN CountyAssignment ca ON ca.CountyAssignmentID = r.CountyAssignmentID INNER JOIN Counties c ON c.CountyID = ca.CountyID WHERE c.CountyID = :countyAssignmentID";

//puts results from SQL query into an array called $results
$results = handleSQL($sql, $countyAssignment, $countyNumber, 1);

//puts everything in $results array into a dropdown list with an onchange method to display a table of resources in the selected category
echo "<form>";
echo "<fieldset>";
echo "<legend>Resources for " .$county ." County</legend>";
$county = '"' .$county .'"';
echo "<select name='resourceType' onchange='showResources(this.value, " .$county . ", " .$number .")'>";
echo "<option value = '0'>Select the type of resource you need:</option>";

for($i = 0; $i < count($results); $i++) {
    echo '<option value="' .$results[$i]["ResourceTypeID"] .'">' .$results[$i]["ResourceTypeName"] . '</option>';
}

echo '</select>
</fieldset>
</form>';

?>