<?php
include("./header.php");

if (!$user == "") {

    $sql = "SELECT * FROM records";
    $result = pg_query($conn, $sql);
    $records = pg_fetch_all($result);   
    $i = 0;
    foreach ($records as $record) {
        $output .= "	<table border=;'1' width='75%'>
<tr><th width='23%''>Student ID</th><th width='23%'>Student Name</th><th width='10%''>GNED0000</th>
<th width='23%'>ITCE3200</th><th width='10%'>NETD3202</th><th width='10%'>OOP3200</th><th width='11%'>SYDE3203</th><th width='11%'>SYSA3204</th><th width='11%'>WEBD3201</th>
<th width='11%'>GPA</th>";

        $output .= "\n\t<tr>\n\t\t<td>" . $record["student_id"] . "</a></td>";
        $output .= "\n\t\t<td>" . $record['name']  . "</td>";
        $output .= "\n\t\t<td>" . $record['gned'] . "</td>";
        $output .= "\n\t\t<td>" . $record['itce'] . "</td>";
        $output .= "\n\t\t<td>" . $record['netd']  . "</td>";
        $output .= "\n\t\t<td>" . $record['oop']  . "</td>";
        $output .= "\n\t\t<td>" . $record['syde']  . "</td>";
        $output .= "\n\t\t<td>" . $record['sysa']  . "</td>";
        $output .= "\n\t\t<td>" . $record['webd']  . "</td>";
        $output .= "\n\t\t<td>" . $record['gpa']  . "</td>\n\t</tr>";
        $output .= "</table>";
        $output .= "<br/>";
        $i++;
    }
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