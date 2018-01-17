<!DOCTYPE html>

<html>
<head>
    <title>Android Push Notification using GCM</title>
    <script type="text/javascript" src="assets/jquery-3.1.1.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/bootstrap-3.3.7-dist/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="assets/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="assets/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
</head>

<body>




<h2 align="center" >FAAST Android Push Notification </h2>

<form method='post' action='dropdown_result.php'>
<div class="dropdown">
    <select name="dropdown" class="btn btn-success">
        <option value="1">Invoice Generated Notification</option>
        <option value="2">90% Data Consumption</option>
        <option value="3">Due Date Notification For Unpaid Users</option>
    </select>
    <input type="submit"  class="btn btn-primary" value="Submit" onclick="myFunction()"/>
</div>

</form>


<div>
<form action="">

    <?php

    require_once('connection.php');
    $sql = "SELECT srvid, srvname FROM rm_services";
    $check=mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_assoc($check)) {
        $services["name"]=$row["srvname"];
        $services["id"]=$row["srvid"];
        ?>
            <input type="checkbox" name="services[]" value="<?php echo $row["srvid"] ?>"><?php echo $row["srvname"]?><br>

        <?php } ?>

<!--    <input type="checkbox" name="services[]" value="--><?php //echo $fields["srvname"] ?><!--">--><?php //echo $fields["srvname"]?><!--<br>-->

<!--    <input type="checkbox" name="vehicle" value="Car" checked> I have a car<br>-->
    <input type="submit" value="Submit"  class="btn btn-primary" >
</form>
</div>


<form method='post' action='new_send.php'>

    <div class="form-group" >
        <label for="apikey" >API Key</label>
        <input class="form-control input-sm" id="apikey" type='text' name='apikey'>
    </div>
<!--    <input type='hidden' name='apikey' placeholder='Enter API Key' />-->

    <div class="leftdiv" hidden="True">
        <p class="header">Users table who will get notification:-
        </p>
        <table class="table table-bordered">
            <tr id="header"><td>Id</td><td>Username</td></tr>
            <?php

            $servername = "localhost";
            $username = "root";
            $password = "ccpl@1234";
            $db = "radius";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $db);
            $sql = "select * FROM faast_app_notification";


            $users = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($users);

            if ($users != false)
                $no_of_users = mysqli_num_rows($users);
            else
                $no_of_users = 0;
            while ($row = mysqli_fetch_array($users,MYSQL_BOTH)) {
                ?>
                <tr>
                    <td><span><?php echo $row["username"] ?></span></td>
                    <td><span class="wrapper"><input type="text" name="regtoken[]" value="<?php echo $row["gcmid"]?>"/></span></td>
                </tr>
                <?php } ?>
        </table>
    </div>

    <div class="form-group">
        <label for="comment">Enter a message</label>
        <textarea name='message' class="form-control" rows="3" id="comment"></textarea>
    </div>

<!--    <textarea name='message' placeholder='Enter a message'></textarea>-->

    <button  class="btn btn-primary">Send Notification</button>
</form>

<p>
    <?php
    //if success request came displaying success message
    if(isset($_REQUEST['success'])){

        echo "Message has been sent to ".$num_rows." users.</br>.";
        echo "<strong>Cool!</strong> Message sent successfully check your device...";
    }
    //if failure request came displaying failure message
    if(isset($_REQUEST['failure'])){
        echo "<strong>Oops!</strong> Could not send message check API Key and Token...";
    }
    ?>
</p>


</body>

</html>