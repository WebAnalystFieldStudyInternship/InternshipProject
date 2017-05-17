<!DOCTYPE HTML>
<html>
		<?php include("admin_php_querys.php"); ?>
        <title>
          Admin Page
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<script type = "text/javascript" src = "../../js/resources.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- Right Navigation Bar (1/4 of screen) -->
                <div class="col-md-3"  style="background-color:slategray; padding-bottom:100vh">
                    <h3><!- Vertical Spacer ->&nbsp;</h3>
                </div>

                <!-- Main Admin Window (3/4 of screen) -->
                <div class="col-md-9">
                    <h3>Welcome, Administrator</h3>
                    <div class="row">
                        <div class="col-xs-12">
                            <form action="admin_php_querys.php" method="post">
                                <div class="form-group">
                                    <label>Resource Type</label><br>
                                    <select id ="ResourceTypeName" name="ResourceTypeName">
									<!--php provides a list of categories currently in the database-->
									<?php echo dropDownCats(); ?>  
									</select>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="ResourceName" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Address</label>
                                    <input type="text" name="StreetAddress" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" name="City" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>State</label><br>
									<!--php provides a list of states that pull up a list of counties when selected-->
                                    <select id = "StateID" name="StateID" onchange="getCounties(this.value)">
									<?php echo dropDownStates(); ?>
									</select>
                                </div>
								<!--counties appear here only when a state with counties in the database is selected from the above dropdown-->
								<div class="form-group" id="countyForState">
                                </div>
								<div class="form-group">
                                    <label>Zip</label>
                                    <input type="text" name="Zip" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Phone</label>
                                    <input type="tel" name="PhoneNumber" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Fax</label>
                                    <input type="tel" name="Fax" class="form-control">
                                </div>
								<div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="Email" class="form-control">
                                </div>
                                <input type="submit" value="Add Resource" name="Add Resource" class="btn btn-primary">
                                <a href="admin.php" class="btn btn-default">Go Back</a>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div><!-- container end -->
        
        <script>
        <?php echo file_get_contents(__DIR__.'\\bootstrap.native-master\\dist\\bootstrap-native.min.js') ?>
        </script>
    </body>

</html>