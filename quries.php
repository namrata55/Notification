
<?php

require_once('connection.php');
$sql = "SELECT srvid, srvname FROM rm_services";
$check=mysqli_query($conn,$sql);

    while ($row = mysqli_fetch_assoc($check)) {

        $fields[] = array
        (
            'name' => $row["srvname"],
            'id' => $row["srvid"]
        );

        $services["name"]=$row["srvname"];
            $services["id"]=$row["srvid"];

    }


$sql1 = "SELECT username FROM rm_users where srvid=11 OR srvid=14";
$check1=mysqli_query($conn,$sql1);
while ($row1 = mysqli_fetch_assoc($check1)) {
    $Postpaid_users[]=$row1["username"];

}
print(json_encode($Postpaid_users));
print(json_encode($fields));

?>
