<?php
require_once('connection.php');
$used_data_gb1=0;
$month_start = date('Y-04-').'01'.' 00:00:00';
$result = "Select ru.username rs.srvname, rs.trafficunitcomb, racc.acctinputoctets, racc.acctoutputoctets from rm_users ru INNER JOIN rm_services rs ON ru.srvid = rs.srvid INNER JOIN radacct racc ON racc.username = ru.username where racc.acctstarttime > '".$month_start."'  ";
echo $check=mysqli_query($conn,$result);
if((mysqli_affected_rows($conn)) > 0 )
{
    $tmp = array();         // temporary array to create single match information
    $used_data = 0; $used_data_gb1=0;

    while($row = mysqli_fetch_assoc($check))
    {

        $down_limit= $row["acctoutputoctets"];
        $up_limit= $row["acctinputoctets"];
        $comb_limit=$row["trafficunitcomb"];
        $total_data=$comb_limit/1024;
        $total_data_gb=number_format(($total_data), 2, '.', '');


        $up_limit_1 = (($up_limit/1024)/1024)/1024;
        $down_limit_1 = (($down_limit/1024)/1024)/1024;

        $used_data += $down_limit_1 + $up_limit_1;
        $used_data_gb1=number_format(($used_data), 2, '.', '');
        $temp=10/100*$total_data_gb;
        if($used_data_gb1>=$temp)
        {
            echo $users[]=$row["username"];
        }
    }
    print(json_encode($users));

}


?>