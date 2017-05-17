<!DOCTYPE HTML>
<html>
    <head>
		<?php include("../../php/includes/resourceEdit.php"); ?>
		
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
		<script type = "text/javascript" src="../../js/resources.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <!-- Right Navigation Bar (1/4 of screen) -->
                <div class="col-md-3"  style="background-color:slategray; padding-bottom:100vh">
                    <h3><!- Vertical Spacer ->&nbsp;</h3>
					<!-- Echoes out a button for each category of resource in database -->
					<?php echo catButtons(); ?>
                    </div>
                </div>

                <!-- Main Admin Window (3/4 of screen) -->
                <div class="col-md-9">
                    <h3>Welcome, Administrator</h3>
					
                    <div class="row">
                        <div class="col-xs-2"><a href="admin_add.php" class="btn btn-block btn-primary" role="button">Add</a></div>
						<form action="admin_edit.php" method="post" id="resourceHandler">
                        <div class="col-xs-2"><input type="submit" class="btn btn-block btn-primary" role="button" value="Delete"></div>
                        <div class="col-xs-2"><input type="submit" class="btn btn-block btn-primary" role="button" value="Edit"></div>
                    </div>
						
						<!-- Echoes out a table of resources in selected category when button is clicked -->
						<div class="row" id = "sortedResources">
                        </div>
					</form>
                </div>
        </div><!-- container end -->
        
        <script>
        <?php echo file_get_contents(__DIR__.'\\bootstrap.native-master\\dist\\bootstrap-native.min.js') ?>
        </script>
        <script>
            function selectRow(elementId)
            {
                var element = document.getElementById(elementId);
                element.checked = true;
            }
        </script>
    </body>

</html>