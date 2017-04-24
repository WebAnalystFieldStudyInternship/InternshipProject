<!DOCTYPE HTML>
<html>
    <head>
        <title>
          Admin Page
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- JQuery -->
        <!--<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>-->

        <!-- Latest compiled and minified JavaScript -->
        <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
                            <form action="admin.php">
                                <div class="form-group">
                                    <label>Data 1</label>
                                    <input class="form-control" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Data 2</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Data 3</label>
                                    <input class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Data 4</label>
                                    <input class="form-control">
                                </div>
                                <input type="submit" value="Add Resource" class="btn btn-primary">
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