
<?php

require_once('connection.php');
$sql = "SELECT srvname FROM rm_services";
$check=mysqli_query($conn,$sql);



while ($row = mysqli_fetch_assoc($check)) {
    $services[]=$row["srvname"];

}

$sql1 = "SELECT username FROM rm_users where srvid=11 OR srvid=14";
$check1=mysqli_query($conn,$sql1);
while ($row1 = mysqli_fetch_assoc($check1)) {
    $Postpaid_users[]=$row1["username"];

}
header('Location: new_index.php?failure');
print(json_encode($Postpaid_users));
print(json_encode($services));

?>
