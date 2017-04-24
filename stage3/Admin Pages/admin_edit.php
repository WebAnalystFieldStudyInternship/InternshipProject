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
                                    <input class="form-control" value="some info" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Data 2</label>
                                    <input class="form-control" value="some info">
                                </div>
                                <div class="form-group">
                                    <label>Data 3</label>
                                    <input class="form-control" value="some info">
                                </div>
                                <div class="form-group has-warning text-warning">
                                    <label>Data 4</label>
                                    <div class="input-group">
                                    <input class="form-control" value="changed info">
                                    <span class="btn btn-default input-group-addon">Revert</span>
                                    </div>
                                </div>
                                <input type="submit" value="Edit Resource" class="btn btn-primary" data-toggle="modal" data-target="#confirmModal" onclick="focusButton('modal-button-no')">
                                <a href="admin.php" class="btn btn-default">Go Back</a>
                            </form>
                        </div>    
                    </div>
                </div>
            </div>
        </div><!-- container end -->
        
        <!-- Modal -->
<div id="confirmModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div id="confirmModal-content" class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Confirmation Box</h4>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to edit this entry?</p>
      </div>
      <div class="modal-footer">
        <a href="admin.php" role="button" class="btn btn-default" data-dismiss="modl">Yes</a>
          <button id="modal-button-no" type="button" class="btn btn-default" data-dismiss="modal" autofocus="true">No</button>
      </div>
    </div>

  </div>
</div>
        
        <script>
        <?php echo file_get_contents(__DIR__.'\\bootstrap.native-master\\dist\\bootstrap-native.min.js') ?>
        </script>
        <script>
        function focusButton(buttonId)
            {
                var buttonElement = document.getElementById(buttonId);
                buttonElement.setAttribute("autofocus");
            }
        </script>
    </body>

</html>