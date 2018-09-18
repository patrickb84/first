<?php

require_once "../util/dbconn.php";
//print_r($_POST);

$question = $_POST['question'];
$question = addslashes($question);

$result = $_POST['result_key'];
$date = $_POST['answerdate'];

$quill = $_POST['quill'];
$quill = addslashes($quill);

$insert = "INSERT INTO `iching`.`_questions`(`Question`,`Result`,`Date`,`Notes`)"
        . " VALUES ('$question','$result','$date','$quill');";

$success = $con->query($insert);
if ($success == FALSE) {
    $failmess = "Whole query " . $insert . "<br/>";
    echo $failmess;
    die('Invalid query: ' . mysqli_error($con));
} else {
    header("Location: posts.php");
}
?>
