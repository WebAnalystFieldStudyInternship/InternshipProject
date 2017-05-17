<?php
// EXPECTED FORM FIELDS BY NAME ATTRIBUTE (Please Read)
// -----------------------------------------------------------------------------------
/*NOTE:
 *All words making up expected name attributes must have its first letter capitalized.
 *Also, please capitalize all letters making up an abbreviation.
 *In other words, expected name attributes should be title cased.
 */
// - ResourceName
// - StreetAddress
// - City
// - StateID
// - Zip
// - PhoneNumber
// - Fax
// - Email

// CREATE PDO OBJ
//------------------------------------------------------------------------------------
$dsn = 'mysql:host=localhost;dbname=resource_db;';
$username = 'root';
$password = '';

$pdoObj;
try{
$pdoObj = new PDO($dsn, $username, $password);
} catch (PDOException $e) {
	echo 'Message: ' .$e->getMessage();
/* undefined action at this time */
}

//if user clicks on add button from admin_add page to add a resource to the database, this method turns a county name into its assignment number & passes it
//on to the insertResource method to be added to the database
if(isset($_POST['Add_Resource'])) {
	$countyAssignmentId = getCountyAssign();
	insertResource($countyAssignmentId);
}

// QUERY FUNCTIONS
//------------------------------------------------------------------------------------
/*SUMMARY:
 *Updates a resource data entry in the database
 */
function updateResource($argResourceID)
{
	//*** Query Building ***
	//**********************
	$query = "
	UPDATE FROM
		resources
	SET
		ResourceName =	{$_POST['ResourceName']}
		StreetAddress =	{$_POST['StreetAddress']}
		City =		{$_POST['City']}
		StateID =	{$_POST['StateID']}
		Zip =		{$_POST['Zip']}
		PhoneNUMBER =	{$_POST['PhoneNumber']}
		Fax =		{$_POST['Fax']}
		Email =		{$_POST['Email']}
	WHERE
		ResourceID =	{$argResourceID}
	";

    global $pdoObj;
	$statement = $pdoObj->prepare($query);

	//*** Query Execution ***
	//***********************
	try { $statement->execute(); }
	catch (Exception $e){
		//TODO: Take admin to error page with meaningfull message

		//For now , though, do this...
		echo 'Message: ' .$e->getMessage();
	}
}

/*SUMMARY:
 *Deletes a resource data entry from the database
 */
function deleteResource($resourceID)
{
	//*** Query Building ***
	//**********************
	$query = "
	DELETE FROM
		resources
	WHERE
		ResourceID = {$argResourceID}
	";

	//*** Query Execution ***
	//***********************
    global $pdoObj;
	$statement = $pdoObj->prepare($query);

	try { $statement->execute(); }
	catch (Exception $e){
		//TODO: Take admin to error page with meaningfull message

		//For now , though, do this...
		echo 'Message: ' .$e->getMessage();
	}
}

/*SUMMARY:
 *Adds a resource data entry into the database
 */
/*REMARKS:
 *This function does not require a resource ID since
 *the ID is added automaticaly
 */
function insertResource($countyAssignmentID)
{
	//*** Query Building ***
	//**********************
	$resourceName = 	($_POST['ResourceName']==null?	'NULL':	$_POST['ResourceName']);
	$streetAddress = 	($_POST['StreetAddress']==null?	'NULL':	$_POST['StreetAddress']);
	$city =			($_POST['City']==null?		'NULL':	$_POST['City']);
	$stateID =		($_POST['StateID']==null?	'NULL': $_POST['StateID']);
	$zip =			($_POST['Zip']==null?		'NULL': $_POST['Zip']);
	$phoneNumber =		($_POST['PhoneNumber']==null?	'NULL': $_POST['PhoneNumber']);
	$fax =			($_POST['Fax']==null?		'NULL': $_POST['Fax']);
	$email =		($_POST['Email']==null?		'NULL': $_POST['Email']);
	$countyAssignmentID =	$countyAssignmentID;

	$query = "
	INSERT INTO resources
		(ResourceName, StreetAddress, City, StateID, ZIP, PhoneNUMBER, Fax, Email, CountyAssignmentID)
	VALUES
		('$resourceName',	'$streetAddress',	'$city',	'$stateID',	'$zip',	'$phoneNumber',	'$fax',	'$email',	'$countyAssignmentID');
	";

	//*** Query Execution ***
	//***********************
    global $pdoObj;
	$statement = $pdoObj->prepare($query);


	//if insert is successful, sends user back to admin page
	try { $statement->execute(); 
		header("Location: admin.php"); }
	catch (Exception $e){
		//TODO: Take admin to error page with meaningfull message

		//For now , though, do this...
		echo 'Message: ' .$e->getMessage();
	}
	
}


/*SUMMARY:
 *Gets all resources from database
 */
/*RETURNS:
 *Array
 */
function getResources()
{
	//*** Query Building ***
	//**********************
	$query = "SELECT * FROM resources";

    global $pdoObj;
	$statement = $pdoObj->prepare($query);
	
	$results = array();
	try { 
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
	}
	catch (Exception $e){
		//TODO: Take admin to error page with meaningfull message

		//For now , though, do this...
		echo 'Message: ' .$e->getMessage();
	}

	return $results;
}

/*SUMMARY
 *Gets all resources of a category from the database
 */
/*PARAMETERS
 *$CategoryString (type: String) - Argument for this parameter must match a string
 *    in the database's "categories" table
 */
/*RETURNS
 *Array
 */
function getResourcesByCategory($categoryString)
{
	//*** Query Building ***
	//**********************
	$query = "
	SELECT *
	FROM
		resources
		INNER JOIN resourcetypeassignment
		ON resources.ResourceID = resourcetypeassignment.ResourceID
		INNER JOIN resourcetypes
		ON resourcetypeassignment.ResourceTypeID = resourcetypes.ResourceTypeID
	WHERE
		ResourceTypeName = {$categoryString};
	";

    global $pdoObj;
	$statement = $pdoObj->prepare($query);
	
	$results = array();
	try { 
		$statement->execute();
		$results = $statement->fetchAll();
		$statement->closeCursor();
	}
	catch (Exception $e){
		//TODO: Take admin to error page with meaningfull message

		//For now , though, do this...
		echo 'Message: ' .$e->getMessage();
	}

	return $results;
}

/*SUMMARY:
 *Returns all existing categories in the database
 */
/*RETURNS:
 *Array of category names
 */
function getCategories()
{
    //*** Query Building ***
	//**********************
	$query = 'SELECT * FROM resourcetypes';
	
    global $pdoObj;
	$statement = $pdoObj->prepare($query);
	$results = array();
	try { 
		$statement->execute();
		$results = $statement->fetchAll();
	}
	catch (Exception $e){
		//TODO: Take admin to error page with meaningfull message

		//For now , though, do this...
		echo 'Message: ' .$e->getMessage();
	}
    
    $temp = array();
    foreach /*thing in*/($results as $thing){
        array_push($temp, $thing['ResourceTypeName']);
    }
    $results = $temp;
    
	
    return $results;
}

//returns a dropdown list of resource categories
function dropDownCats() {
	$results = getCategories();
	echo '<option>Select a category: </option>';
	foreach ($results AS $r) {
		echo '<option>' .$r .'</option>';
	}
}

//returns all states & their abbreviations 
function getStates()
{
    //*** Query Building ***
	//**********************
	$query = 'SELECT * FROM states';
	
    global $pdoObj;
	$statement = $pdoObj->prepare($query);
	$results = array();
	try { 
		$statement->execute();
		$results = $statement->fetchAll();
	}
	catch (Exception $e){
		//TODO: Take admin to error page with meaningfull message

		//For now , though, do this...
		echo 'Message: ' .$e->getMessage();
	}
    
    $temp = array();
    foreach /*thing in*/($results as $thing){
        array_push($temp, $thing['StateID']);
    }
    $results = $temp;
    
	
    return $results;
}

//returns a dropdown list of state abbreviations
function dropDownStates() {
	$results = getStates();
	echo '<option>Select a state: </option>';
	foreach ($results AS $r) {
		echo '<option value=' .$r .'>' .$r .'</option>';
	}
}
//gets county assignment id for a county name
function getCountyAssign() {
	$countyName = $_POST['CountyName'];
	$query = 'SELECT CountyAssignmentID FROM CountyAssignment ca INNER JOIN Counties c ON ca.CountyID = c.CountyID WHERE CountyName = :countyName';
	global $pdoObj;
	$statement = $pdoObj->prepare($query);
	$result;
	try { 
		$statement->bindValue(':countyName', $countyName);
		$statement->execute();
		$result = $statement->fetch();
	}
	catch (Exception $e){
		//TODO: Take admin to error page with meaningfull message

		//For now , though, do this...
		echo 'Message: ' .$e->getMessage();
	}
	
    return $result['CountyAssignmentID'];
}
?>