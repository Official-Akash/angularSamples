<?php
error_reporting(0);
require("assets/db/db.php");

if ($_POST['sellist1']) {
    $org = $_POST['sellist1'];
}
if ($_POST['sellist2']) {
    $stream = $_POST['sellist2'];
}
if ($_POST['sellist3']) {
    $mode = $_POST['sellist3'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Angluar Assignment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
</head>
<body>

<div class="alert alert-dark text-center">
    <h3>Exam Prepration Online</h3>
</div>

<div class="container" data-ng-app="angularAssignment" data-ng-controller="angularCtrl">
    <div class="row">
        <div class="col-sm-4">
            <div class="row alert alert-dark">
                <form method="post" action="" style="width: 100%">
                    <div class="col-sm-12 text-right">
                        <button type="submit">Apply Filters</button>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="org">Organisation:</label>
                            <select class="form-control" id="org" name="sellist1">
                                <option value="">Select</option>
                                <?php
                                $getallcompanies = mysqli_query($conn, "select infoorg from infodata");
                                if (($num = mysqli_num_rows($getallcompanies)) > 0) {
                                    while ($fte = mysqli_fetch_array($getallcompanies)) {
                                        if($fte[0] == $org){
                                            ?>
                                            <option selected="selected" value="<?php echo $fte[0] ?>"><?php echo $fte[0] ?></option>
                                            <?php
                                        }else {
                                            ?>
                                            <option value="<?php echo $fte[0] ?>"><?php echo $fte[0] ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="stream">Engineering Stream:</label>
                            <select class="form-control" id="stream" name="sellist2">
                                <option value="">Select</option>
                                <?php
                                $getallstreams = mysqli_query($conn, "select stream from infodata");
                                if (($num1 = mysqli_num_rows($getallstreams)) > 0) {
                                    while ($fte1 = mysqli_fetch_array($getallstreams)) {
                                        if($fte1[0] == $stream){
                                            ?>
                                            <option selected="selected" value="<?php echo $fte1[0] ?>"><?php echo $fte1[0] ?></option>
                                            <?php
                                        }else {
                                            ?>
                                            <option value="<?php echo $fte1[0] ?>"><?php echo $fte1[0] ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="mode">Application Mode:</label>
                            <select class="form-control" id="Mode" name="sellist3">
                                <option value="">Select</option>
                                <?php
                                $getallmode = mysqli_query($conn, "select mode from infodata");
                                if (($num2 = mysqli_num_rows($getallmode)) > 0) {
                                    while ($fte2 = mysqli_fetch_array($getallmode)) {
                                        if($fte2[0] == $mode){
                                            ?>
                                            <option selected="selected" value="<?php echo $fte2[0] ?>"><?php echo $fte2[0] ?></option>
                                            <?php
                                        }else {
                                            ?>
                                            <option value="<?php echo $fte2[0] ?>"><?php echo $fte2[0] ?></option>
                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="row alert alert-dark">
                <div class="col-sm-12 text-right"><span style="color:blue; cursor: pointer; text-decoration: underline"
                                                        data-ng-click="clear()">Clear ALL</span>/<span
                            style="color:blue; cursor: pointer; text-decoration: underline" data-ng-click="selct()">Select ALL</span>
                </div>
                <div class="col-sm-12">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" data-ng-click="selection()"
                                   value="Selection" data-ng-checked="checkedq">Selection Procedure
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" data-ng-click="hr()" value="HR"
                                   data-ng-checked="checkedq">HR Questions
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" data-ng-click="technical()"
                                   value="Technical" data-ng-checked="checkedq">Technical Interviews
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" data-ng-click="analytical()"
                                   value="Analytical" data-ng-checked="checkedq">Analytical Questions
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input type="checkbox" class="form-check-input" data-ng-click="suggestion()"
                                   value="Suggestions" data-ng-checked="checkedq">Suggestions
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8" style="max-height: 500px; overflow-y: scroll">
            <h3 class="text-center">Interview Experiences :: <?php echo $org ?></h3>
            <br>
            <?php
            $query = "select * from infodata";
            if ($org != '' || $mode != '' || $stream != '') {
                $query .= " where";
            }
            if ($org != '') {
                $query .= " infoorg='" . $org . "'";
            }
            if ($stream != '' && $org != '') {
                $query .= " and stream='" . $stream . "'";
            } elseif ($stream != '') {
                $query .= " stream='" . $stream . "'";
            }
            if (($mode != '' && $org != '') || ($mode != '' && $stream != '')) {
                $query .= " and mode='" . $mode . "'";
            } elseif ($mode != '') {
                $query .= " mode='" . $mode . "'";
            }
            $alldetils = mysqli_query($conn, $query);
            if (($nos = mysqli_num_rows($alldetils)) > 0) {
                while ($fetch = mysqli_fetch_array($alldetils)) {
                    ?>
                    <div class="card">
                        <div class="card-body">
                            <div class="loc">
                                <strong>Job Location</strong>: <?php echo $fetch[1] ?><br/>
                            </div>
                            <div class="organi">
                                <strong>Organisation</strong>: <?php echo $fetch[2] ?><br/>
                            </div>
                            <div class="appmode">
                                <strong>Application Mode</strong>: <?php echo $fetch[3] ?><br/>
                            </div>
                            <div class="selpro" data-ng-show="selpro">
                                <strong>Selection Procedure</strong>: <?php echo $fetch[4] ?><br/>
                            </div>
                            <div class="techni" data-ng-show="techni">
                                <strong>Technical Interview</strong>: <?php echo $fetch[5] ?><br/>
                            </div>
                            <div class="analy" data-ng-show="analy">
                                <strong>Analytical Questions</strong>: <?php echo $fetch[6] ?><br/>
                            </div>
                            <div class="hrque" data-ng-show="hrque">
                                <strong>HR Questions</strong>: <?php echo $fetch[7] ?><br/>
                            </div>
                            <div class="sugg" data-ng-show="sugg">
                                <strong>Suggestions</strong>: <?php echo $fetch[8] ?><br/>
                            </div>
                            <div class="sharedby">
                                <strong>Shared By</strong>: <?php echo $fetch[9] ?><br/>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }else{
                ?>
            <div class="card">
                <div class="card-body">
                    No Match Found!
                </div>
            </div>
            <?php
            }
            ?>
        </div>

    </div>
    <script src="assets/js/index.js"></script>
</body>
</html>
