<?php
    $error = 'Something happen';

    if(isset($_POST['action']) == true) {
        switch ($_POST['action']) {
            case 'login':
                if ($_POST['password'] == 'password') {
                    header('Location: ../admin/admin.php');
                } else {
                    exit($error);
                }
                break;
            default:
                exit($error);
                break;
        }
    } else {
        exit($error);
    }
?>