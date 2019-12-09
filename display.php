<?php
include("./header.php");

if (!$user == "") {

    $sql = "SELECT * FROM records";
    $result = pg_query($conn, $sql);
    $records = pg_fetch_all($result);
    $total=pg_numrows($result);   
    $i = 0;
    $total_gned=0;
    $total_itce=0;
    $total_netd=0;
    $total_oop=0;
    $total_syde=0;
    $total_sysa=0;
    $total_webd=0;
    $output .= "	<table border=;'1' width='75%'>
    <tr><th width='23%''>Student ID</th><th width='23%'>Student Name</th><th width='10%''>GNED0000</th>
    <th width='23%'>ITCE3200</th><th width='10%'>NETD3202</th><th width='10%'>OOP3200</th><th width='11%'>SYDE3203</th><th width='11%'>SYSA3204</th><th width='11%'>WEBD3201</th>
    <th width='11%'>GPA</th>";
    foreach ($records as $record) {
        $output .= "\n\t<tr>\n\t\t<td>" . $record["student_id"] . "</td>";
        $output .= "\n\t\t<td>" . $record['name']  . "</td>";
        $output .= "\n\t\t<td>" . $record['gned'] . "</td>";
        $output .= "\n\t\t<td>" . $record['itce'] . "</td>";
        $output .= "\n\t\t<td>" . $record['netd']  . "</td>";
        $output .= "\n\t\t<td>" . $record['oop']  . "</td>";
        $output .= "\n\t\t<td>" . $record['syde']  . "</td>";
        $output .= "\n\t\t<td>" . $record['sysa']  . "</td>";
        $output .= "\n\t\t<td>" . $record['webd']  . "</td>";
        $output .= "\n\t\t<td>" . $record['gpa']  . "</td>\n\t</tr>";
        $i++;
        $total_gned+=$record['gned'];
        $total_itce+=$record['itce'];
        $total_netd+=$record['netd'];
        $total_oop+=$record['oop'];
        $total_syde+=$record['syde'];
        $total_sysa+=$record['sysa'];
        $total_webd+=$record['webd'];
        
    }
    $output .= "\n\t<tr>\n\t\t<td>Average</td>";
    $output .= "\n\t\t<td>" ."". "</td>";
    $output .= "\n\t\t<td>" . round(($total_gned/$total),2) . "</td>";
    $output .= "\n\t\t<td>" . round(($total_itce/$total),2) . "</td>";
    $output .= "\n\t\t<td>" . round(($total_netd/$total),2). "</td>";
    $output .= "\n\t\t<td>" . round(($total_oop/$total),2). "</td>";
    $output .= "\n\t\t<td>" . round(($total_syde/$total),2). "</td>";
    $output .= "\n\t\t<td>" . round(($total_sysa/$total),2). "</td>";
    $output .= "\n\t\t<td>" . round(($total_webd/$total),2). "</td>\n\t</tr>";
    $output .= "</table>";
    $output .= "<br/>";
} else {
    header("Location: index.php");

    ob_flush();
}

?>

<div class="content">
    <?php echo $output; ?>
</div>

<?php
include("./footer.php");
?>