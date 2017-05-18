<?php
/**
 * Created by PhpStorm.
 * User: correywinke
 * Date: 5/18/17
 * Time: 6:11 AM
 */
require '../model/db.php';
require '../controller/defense.php';

switch ($_POST['action']) {
    case 'edit':

        helper($_POST['curID']);

        header('Location: ../admin/admin.php');
        break;
    case 'delete':
        handleSQL("DELETE FROM ResourceTypeAssignment WHERE ResourceID = (SELECT ResourceID FROM  Resources WHERE ResourceID = :ID)",[':ID'],[$_POST['curID']],2);
        handleSQL("DELETE FROM Resources WHERE ResourceID = :ID",[':ID'],[$_POST['curID']],2);

        header('Location: ../admin/admin.php');
        break;
    case 'add':
        handleSQL('INSERT INTO Resources (ResourceName, City) VALUES (:Name, "dfasffsadfjasldflkasjdfka")',[':Name'],[$_POST['ResourceName']],2);
        $newRes = handleSQL("SELECT * FROM Resources WHERE City = 'dfasffsadfjasldflkasjdfka'",[],[], 0);

        helper($newRes['ResourceID']);

        header('Location: ../admin/admin.php');
        break;
}

function helper($newRes) {
    $aryMyValues = allowedValues([
        'ResourceName','Address','StreetAddress','City','Zip','PhoneNUMBER','Fax','Email'
    ]);

    // gets the value from values
    $aryPostValues =  array_values($aryMyValues);
    // get the key from values
    $aryKeys = array_keys($aryMyValues);

    for ($lcv =0;$lcv<sizeof($aryMyValues);$lcv++) {
        // makes sure there a value and is't not hte action value
        if((strlen($aryPostValues[$lcv]) != 0)) {
            handleSQL("UPDATE Resources SET {$aryKeys[$lcv]} = :curPlace WHERE ResourceID = :ID",[":curPlace", ":ID"],[$aryPostValues[$lcv], $newRes],2);
        }
    }

    if(isset($_POST['ResourceTypeName']) == true) {
        foreach ($_POST['ResourceTypeName'] as $curPlace) {
            handleSQL('INSERT INTO ResourceTypeAssignment (ResourceTypeID, ResourceID) VALUES ((SELECT ResourceTypeID FROM ResourceTypes WHERE ResourceTypeName = :curValue), :resID)',[":curValue",":resID"],[$curPlace,$newRes],2);
        }
    }

    handleSQL("UPDATE Resources SET CountyAssignmentID = (SELECT CountyAssignmentID FROM CountyAssignment WHERE CountyID = :curPlace) WHERE ResourceID = :ID",[":curPlace", ":ID"],[$_POST['Counties'][0], $newRes],2);

}

?>