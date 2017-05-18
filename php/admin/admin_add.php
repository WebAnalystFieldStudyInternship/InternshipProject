<?php
    require'../includes/admin-head.php';
    require '../model/db.php'
?>
    <input type="hidden" id="curPage" value="adminAdd">
    <div class="row">
        <!-- Main Admin Window (3/4 of screen) -->
        <div id="addForm" class="col-md-9">
            <h3>Welcome, Administrator</h3>
            <div class="row">
                <div class="col-xs-12">
                    <form action="../controller/adminChange.php" method="post">
                        <div class="form-group">
                            <label>Resource Name</label>
                            <input name="ResourceName" value="<?php
                                if (isset($_POST['curID']) == true) {
                                    echo handleSQL('SELECT * FROM Resources WHERE ResourceID = :ID',[':ID'],[$_POST['curID']],0)['ResourceName'];
                                }
                            ?>" class="form-control" autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input name="StreetAddress" value="<?php
                            if (isset($_POST['curID']) == true) {
                                echo handleSQL('SELECT * FROM Resources WHERE ResourceID = :ID',[':ID'],[$_POST['curID']],0)['StreetAddress'];
                            }
                            ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input name="City" value="<?php
                            if (isset($_POST['curID']) == true) {
                                echo handleSQL('SELECT * FROM Resources WHERE ResourceID = :ID',[':ID'],[$_POST['curID']],0)['City'];
                            }
                            ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Zip Code</label>
                            <input name="Zip" value="<?php
                            if (isset($_POST['curID']) == true) {
                                echo handleSQL('SELECT * FROM Resources WHERE ResourceID = :ID',[':ID'],[$_POST['curID']],0)['ZIP'];
                            }
                            ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input name="PhoneNUMBER" value="<?php
                            if (isset($_POST['curID']) == true) {
                                echo handleSQL('SELECT * FROM Resources WHERE ResourceID = :ID',[':ID'],[$_POST['curID']],0)['PhoneNUMBER'];
                            }
                            ?>" type="tel" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Fax</label>
                            <input name="Fax" value="<?php
                            if (isset($_POST['curID']) == true) {
                                echo handleSQL('SELECT * FROM Resources WHERE ResourceID = :ID',[':ID'],[$_POST['curID']],0)['Fax'];
                            }
                            ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input name="Email" value="<?php
                            if (isset($_POST['curID']) == true) {
                                echo handleSQL('SELECT * FROM Resources WHERE ResourceID = :ID',[':ID'],[$_POST['curID']],0)['Email'];
                            }
                            ?>" class="form-control">
                        </div>
                        <div class="form-group">
                            <?php
                                $resTypes = getAll('Counties');

                                foreach ($resTypes as $curType) {
                                    if (isset($_POST['curID']) == true) {
                                        if($curType['CountyName'] === handleSQL('SELECT * FROM Counties c INNER JOIN CountyAssignment ca ON c.CountyID = ca.CountyID INNER JOIN Resources r ON r.CountyAssignmentID = ca.CountyAssignmentID WHERE r.ResourceID = :ID',[':ID'],[$_POST['curID']],0)['CountyName']){
                                            echo "<div class=\"checkbox\">
                                            <label><input name='Counties[]' type=\"checkbox\" value=\"{$curType['CountyID']}\" checked>{$curType['CountyName']}, County</label>
                                           </div>";
                                        } else {
                                            echo "<div class=\"checkbox\">
                                            <label><input name='Counties[]' type=\"checkbox\" value=\"{$curType['CountyID']}\">{$curType['CountyName']}, County</label>
                                           </div>";
                                        }
                                    } else {
                                        echo "<div class=\"checkbox\">
                                            <label><input name='Counties[]' type=\"checkbox\" value=\"{$curType['CountyID']}\">{$curType['CountyName']}, County</label>
                                           </div>";
                                    }
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            $resTypes = getAll('ResourceTypes');

                            foreach ($resTypes as $curType) {
                                if (isset($_POST['curID']) == true) {
                                    if($curType['ResourceTypeName'] === handleSQL("SELECT * FROM ResourceTypes rt INNER JOIN ResourceTypeAssignment ra ON rt.ResourceTypeID = ra.ResourceTypeID INNER JOIN Resources r ON r.ResourceID = ra.ResourceID WHERE r.ResourceID = :ID",[':ID'],[$_POST['curID']],0)['ResourceTypeName']) {
                                        echo "<div class=\"checkbox\">
                                            <label><input name='ResourceTypeName[]' type=\"checkbox\" value=\"{$curType['ResourceTypeName']}\" checked>{$curType['ResourceTypeName']}, Resource</label>
                                           </div>";
                                    } else {
                                        echo "<div class=\"checkbox\">
                                            <label><input name='ResourceTypeName[]' type=\"checkbox\" value=\"{$curType['ResourceTypeName']}\">{$curType['ResourceTypeName']}, Resource</label>
                                           </div>";
                                    }
                                } else {
                                    echo "<div class=\"checkbox\">
                                            <label><input name='ResourceTypeName[]' type=\"checkbox\" value=\"{$curType['ResourceTypeName']}\">{$curType['ResourceTypeName']}, Resource</label>
                                           </div>";
                                }
                            }
                            ?>
                        </div>
                        <?php
                            if (isset($_POST['curID']) == true) {
                                echo "<input type=\"hidden\" name=\"curID\" value=\"{$_POST['curID']}\">"
                                 ."<input type=\"hidden\" name=\"action\" value=\"edit\">"
                                 ."<input type=\"submit\" value=\"Edit Resource\" class=\"btn btn-primary\">";
                            } else {
                                echo "<input type=\"hidden\" name=\"action\" value=\"add\">";
                                echo "<input type=\"submit\" value=\"Add Resource\" class=\"btn btn-primary\">";
                            }
                        ?>
                        <a href="admin.php" class="btn btn-default">Go Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php require'../includes/admin-footer.php'; ?>