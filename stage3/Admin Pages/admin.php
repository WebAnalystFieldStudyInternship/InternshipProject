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
                    <div class="btn-group-vertical" style="position:fixed">
                    <div class="btn btn-primary" role="button">Category 1</div>
                    <div class="btn btn-primary" role="button">Category 2</div>
                    <div class="btn btn-primary" role="button">Category 3</div>
                    <div class="btn btn-primary" role="button">Category ...</div>
                    </div>
                </div>

                <!-- Main Admin Window (3/4 of screen) -->
                <div class="col-md-9">
                    <h3>Welcome, Administrator</h3>
                    <div class="row">
                        <div class="col-xs-2"><a href="admin_add.php" class="btn btn-block btn-primary" role="button">Add</a></div>
                        <div class="col-xs-2"><a href="admin_delete.php" class="btn btn-block btn-primary" role="button">Delete</a></div>
                        <div class="col-xs-2"><a href="admin_edit.php" class="btn btn-block btn-primary" role="button">Edit</a></div>
                    </div>
                    <div class="row">
                        <!-- Table With Entries -->
                        <div class="table-responsive">
                            <table class="table table-borderd table-striped">
                                <thead>
                                    <th>Col 1</th>
                                    <th>Col 2</th>
                                    <th>Col 3</th>
                                    <th>Check Box</th>
                                </thead>
                                <tbody>
                                    <tr onclick="selectRow('row1')"
                                        style="cursor:pointer">
                                        <td>Data 1</td>
                                        <td>Data 2</td>
                                        <td>Data 3</td>
                                        <td><input id="row1" type="radio" name="rows"></td>
                                    </tr>
                                    <tr onclick="selectRow('row2')"
                                        style="cursor:pointer">
                                        <td>Data 1</td>
                                        <td>Data 2</td>
                                        <td>Data 3</td>
                                        <td><input id="row2" type="radio" name="rows"></td>
                                    </tr>
                                    <tr onclick="selectRow('row3')"
                                        style="cursor:pointer">
                                        <td>Data 1</td>
                                        <td>Data 2</td>
                                        <td>Data 3</td>
                                        <td><input id="row3" type="radio" name="rows"></td>
                                    </tr>
                                    <tr onclick="selectRow('row4')"
                                        style="cursor:pointer">
                                        <td>Data 1</td>
                                        <td>Data 2</td>
                                        <td>Data 3</td>
                                        <td><input id="row4" type="radio" name="rows"></td>
                                    </tr>
                                    <tr onclick="selectRow('row5')"
                                        style="cursor:pointer">
                                        <td>Data 1</td>
                                        <td>Data 2</td>
                                        <td>Data 3</td>
                                        <td><input id="row5" type="radio" name="rows"></td>
                                    </tr>
                                    <tr onclick="selectRow('row6')"
                                        style="cursor:pointer">
                                        <td>Data 1</td>
                                        <td>Data 2</td>
                                        <td>Data 3</td>
                                        <td><input id="row6" type="radio" name="rows"></td>
                                    </tr>
                                    <!--<tr>
                                        <td><input class="form-control"></td>
                                        <td><input class="form-control"></td>
                                        <td><input class="form-control"></td>
                                        <td><div class="btn btn-default">+</div></td>
                                    </tr>-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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