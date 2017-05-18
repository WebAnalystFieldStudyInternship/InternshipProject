<?php
/**
 * Created by PhpStorm.
 * User: correywinke
 * Date: 5/18/17
 * Time: 5:22 AM
 */
//puts results from SQL query into an array called $results
$results = handleSQL("SELECT * FROM Resources r INNER JOIN ResourceTypeAssignment rta ON r.resourceID = rta.resourceID 
INNER JOIN ResourceTypes rt ON rta.resourceTypeID = rt.ResourceTypeID WHERE rt.ResourceTypeName = :resourceTypeName", array(":resourceTypeName"), array($_POST['curResType']), 1);
echo $_POST['curResType'];
//puts everything in $results array into a table
echo "<table class = 'table table-striped'>
<caption>Resources for {$_POST['curResType']}</caption>
<tr>
<th>ID</th>
<th>Resource</th>
<th>Address</th>
<th>City</th>
<th>Zip Code</th>
<th>Phone</th>
<th>Fax</th>
<th>Email</th>
<th>Edit</th>
<th>Delete</th>
</tr>
<tbody>";

for($i = 0; $i < count($results); $i++) {
    echo "<tr>";
    echo "<td>" . $results[$i]['ResourceID'] . "</td>";
    echo "<td>" . $results[$i]['ResourceName'] . "</td>";
    echo "<td>" . $results[$i]['StreetAddress'] . "</td>";
    echo "<td>" . $results[$i]['City'] . "</td>";
    echo "<td>" . $results[$i]['ZIP'] . "</td>";
    echo "<td>" . $results[$i]['PhoneNUMBER'] . "</td>";
    echo "<td>" . $results[$i]['Fax'] . "</td>";
    echo "<td>" . $results[$i]['Email'] . "</td>";
    echo "<td>" ."<form action=\"admin_add.php\" method=\"post\">
                    <input type=\"hidden\" name=\"action\" value=\"edit\">
                    <input type=\"hidden\" name=\"curID\" value=\"{$results[$i]['ResourceID']}\">
                    <button type=\"submit\" class=\"btn btn-info\">Edit</button>
                 </form>" . "</td>";
    echo "<td>" ."<form action=\"../controller/adminChange.php\" method=\"post\">
                    <input type=\"hidden\" name=\"action\" value=\"delete\">
                    <input type=\"hidden\" name=\"curID\" value=\"{$results[$i]['ResourceID']}\">
                    <button class=\"btn btn-info\">Delete</button>
                 </form>" . "</td>";
    echo "</tr>";
}

echo "</tbody>
</table>"
?>

