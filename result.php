<!DOCTYPE html>
<!--
Patrick Bradshaw 2018, probably.
-->
<?php
require_once 'dbconn.php';
//print_r($_POST);
//
//$queryId = $_POST['queryId'];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
$sql = "SELECT * FROM `queries` WHERE `idqueries` = '" . $_GET['queryId'] . "'";
echo $sql;

$success = $con->query($sql);
if ($success == FALSE) {
    $failmess = "Whole query " . $sql . "<br/>";
    echo $failmess;
    die('Invalid query: ' . mysqli_error($con));
}
while ($row = $success->fetch_assoc()) {
echo $row['DateTime'];
echo '<br>';
echo $row['Title'];
echo '<br>';
echo $row['Question'];
echo '<br>';
echo $row['Result_Key'];
echo '<br>';

$body = $row['Body'];
echo stripslashes($body);
}

?>
    </body>
</html>
