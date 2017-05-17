<!DOCTYPE HTML>
<html>
    <head>
        <title>
          Resource Page
        </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- JQuery -->
<!--        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>-->

        <!-- Latest compiled and minified JavaScript -->
<!--        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        
        <style>.h-underline{text-decoration: underline solid black;}</style>
        
        <style>
            ::-webkit-scrollbar { background-color: grey;}
            ::-webkit-scrollbar-button { background-color:#337ab7; }
            ::-webkit-scrollbar-track { background-color:#337ab7 }
            ::-webkit-scrollbar-track-piece { background-color:#a1bdde; border-radius: 5px; }
            ::-webkit-scrollbar-thumb { background-color:#337ab7; border-radius:5px;  border-color: #2e6da4; border-style:solid; border-width:1px; }
            ::-webkit-scrollbar-corner { background-color:pink }
            ::-webkit-resizer { background-color:black;color:black; }
        </style>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="h-underline">Resource</h2>
                    <p id="resource-description">
                    Bacon ipsum dolor amet pork chop ribeye jerky sirloin rump                           chuck. Sirloin jerky pork belly fatback brisket rump kevin                           shankle prosciutto. Pork chop capicola filet mignon alcatra                         brisket spare ribs. Kevin shank meatloaf pork, ham hock alcatra                     ground round bacon boudin beef ribs filet mignon.
                    </p>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-6">
                    <h3 class="h-underline">Phone</h3>
                    <p>(111)-111-1111</p>
                </div>
                <div class="col-xs-6">
                    <h3 class="h-underline">Email</h3>
                    <p>email@emailHost.com</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <h3 class="h-underline">Address</h3>
                    <address>
                    1111 Some Street<br>
                    WI, SomeCity<br>
                    11111
                    </address>
                </div>
                <div class="col-xs-6">
                    <h3 class="h-underline">Website</h3>
                    <a href="#">www.resourc_website.com</a>
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-6" tabindex="0" role="link" label>
                    <a class="btn btn-primary btn-block" href="#">Web</a>
                </div>
                <div class="col-xs-6" tabindex="1" role="button">
                    <div class="btn btn-primary btn-block">Location</div>
                </div>
            </div>
        </div><!-- container end -->
        
                <script>
        <?php echo file_get_contents(__DIR__.'\\bootstrap.native-master\\dist\\bootstrap-native.min.js') ?>
        </script>
    </body>
</html>