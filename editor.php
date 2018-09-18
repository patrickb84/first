<!DOCTYPE html>
<!--
Patrick Bradshaw 2018, probably.
-->

<?php
require_once "../util/dbconn.php";
include "functions.php";

date_default_timezone_set("America/Denver");
//print_r($_POST);

$question = $_POST['question'];
//echo $question;
$questionSlashed = addslashes($question);
//echo $questionSlashed;

$resultKey = $_POST['result'];

$context = $_POST['context']; // "question", or from journal

$keyArray = explodeKey($resultKey);

$date = date('Y-m-d H:i:s');

if ($context == "question") {
    $sql = "INSERT INTO `iching`.`Questions`(`qDateTime`,`Question`) "
            . "VALUES ('$date', '$questionSlashed');";

    $success = $con->query($sql);
    if ($success == FALSE) {
        $failmess = "Whole query " . $insert . "<br/>";
        echo $failmess;
        die('Invalid query: ' . mysqli_error($con));
    } else {
        //echo "Insert successful.";
    }
}
$uniChar = "\u{4DC0}";
$uniHex = 19904;
$uniHex1 = strtoupper(dechex(19903 + $keyArray['hex1']));
$uniHex1 = "&#x" . $uniHex1;
$uniHex1 = mb_convert_encoding($uniHex1 . ';', 'UTF-8', 'HTML-ENTITIES');

$uniHex2 = strtoupper(dechex(19903 + $keyArray['hex2']));
$uniHex2 = "&#x" . $uniHex2;
$uniHex2 = mb_convert_encoding($uniHex2 . ';', 'UTF-8', 'HTML-ENTITIES');
?>
<html lang="en" class='bg-black'>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="../_assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>

        <script src="../_assets/js/bootstrap.js" type="text/javascript"></script>
        <link href="../_assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <script src="../_assets/js/iching.js" type="text/javascript"></script>
        <link href="../_assets/css/tachyons.css" rel="stylesheet" type="text/css"/>

        <script src="../_assets/js/blotter.min.js" type="text/javascript"></script>
        <script src="../_assets/js/liquidDistortMaterial.js" type="text/javascript"></script>

        <link href="../_assets/css/animate.css" rel="stylesheet" type="text/css"/>

        <!-- icons -->
        <link rel="stylesheet" 
              href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" 
              integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" 
              crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>

        <meta charset="UTF-8">

        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,400i,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Vollkorn:400,400i,700,700i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,700,700i" rel="stylesheet">


        <!-- Include the Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
        <link href="https://cdn.quilljs.com/1.3.6/quill.bubble.css" rel="stylesheet">

        <title>Editor</title>

        <style>
            textarea,
            select, 
            input, 
            button { 
                outline: none; 
            }
            textarea { 
                resize: none;
            }

            /* typography */
            .vollkorn {
                font-family: 'Vollkorn', serif;
            }
            .roboto-cond {
                font-family: 'Roboto Condensed', sans-serif;
            }
            .roboto {
                font-family: 'Roboto', sans-serif;
            }
            /*            #submit {
                            font-family: 'Roboto', sans-serif;
                            font-weight: 300;
                            background: linear-gradient(45deg, #555555, #777777);
                        }*/

            #notes p { font-size: 19px;  }
            #notes h3 { font-size: 24px; }
            #notes h4 { font-size: 21px; padding-top: 14px; }

            #notes h3,
            #notes h4 {
                padding-bottom: 10px; 
                color: #FBF1A9;
            }
            .myTeal { color: #39CCCC }
            #uni {
                letter-spacing: 0
            }
        </style>
    </head>
    <body class="lh-copy w-100 bg-black ph2 pt2 pb5">
        <div class="dt w-100" style="min-height: 100%">
            <div class="dtc v-mid w-100">
                <form id="entry" class="mw6 center" method="post" action="write.php">
                    <input type="hidden" name="result_key" value="<?php echo $resultKey; ?>" />

                    <!--QUESTION-->
                    <div class="form-group">
                        <label class="w-100 tr pr2 light-red roboto-cond tracked ttu pb3 mb3">
                            <?php echo date("m/d/y g:ia"); ?></label>
                        <input type="hidden" id="answerdate" name="answerdate"
                               value="<?php echo date("Y-m-d H:i:s"); ?>">
                        <h2 class="white f2 tc db w-100 bw0 bg-black vollkorn" 
                            id="question"><?php echo $question; ?></h2>
                        <input type="hidden" name="question" value="<?php echo $question; ?>"/>
                        <p id="uni" class="tc tracked-mega f-subheadline silver pt4 mb0 serif">
                            <?php echo $uniHex1 ?> <?php echo $uniHex2 ?>
                        </p>
                        <!--元亨利貞</p>-->
                        <p class="tc mt0 roboto-cond dark-gray pb4">(<?php echo $resultKey ?>)</p>
                    </div>

                    <!--NOTES-->
                    <div id='notes' class="form-group cf">
                        <div id="editor" class="white pa0 br3 vollkorn">
                            <?php
                            // GET HEXAGRAM
                            $sql = "SELECT * FROM `iching`.`_hexs` WHERE `HexId` = '" . $keyArray['hex1'] . "'";
                            $return = $con->query($sql);
                            if (!$return) {
                                $message = "Whole query " . $sql;
                                echo $message;
                                die('Invalid query: ' . mysqli_error($con));
                            }
                            while ($row = $return->fetch_assoc()) {
                                echo "<p>" . $row['Text'] . "</p>";
                                echo "<h4>—" . $keyArray['hex1'] . ", " . $row['Name'] . "</h4>";
                                $hexName = $row['Name'];
                            }
                            echo "<br/>";

                            if ($keyArray['isMoving'] == 1) {
                                for ($i = 0; $i < sizeof($keyArray['lines']); $i++) {
                                    $ind = $keyArray['lines'][$i];
                                    $sql = "SELECT * FROM `iching`.`_lines` WHERE `HexNum` = '" . $keyArray['hex1'] . "' AND `LineNum` = '" . $ind . "'";
                                    $return = $con->query($sql);
                                    if (!$return) {
                                        $message = "Whole query " . $sql;
                                        echo $message;
                                        die('Invalid query: ' . mysqli_error($con));
                                    }
                                    while ($row = $return->fetch_assoc()) {

                                        echo "<p>" . $row['Text'] . "</p>";
                                        echo "<h4>—Line " . $ind . " of " . $hexName . "</h4>";
                                        echo "<br/>";
                                    }
                                }

                                $sql = "SELECT * FROM `iching`.`_hexs` WHERE `HexId` = '" . $keyArray['hex2'] . "'";
                                $return = $con->query($sql);
                                if (!$return) {
                                    $message = "Whole query " . $sql;
                                    echo $message;
                                    die('Invalid query: ' . mysqli_error($con));
                                }
                                while ($row = $return->fetch_assoc()) {
                                    echo "<p>" . $row['Text'] . "</p>";
                                    echo "<h4>—" . $keyArray['hex2'] . ", " . $row['Name'] . "</h4>";
                                }
                            }
                            ?>
                        </div>
                    </div>

                    <!--SUBMIT-->
                    <div class="w-100 pt3 mt3 clearfix">

                        <a href="http://www.jamesdekorne.com/GBCh/hex<?php echo $keyArray['hex1']; ?>.htm" target="_blank" class="btn light-blue hover-blue vollkorn">Hexagram 1</a>
<?php
if ($keyArray['hex2'] != null) {
    echo "<a href='http://www.jamesdekorne.com/GBCh/hex" . $keyArray['hex2'] . ".htm' target='_blank' class='btn light-blue hover-blue vollkorn'>Hexagram 2</a>";
}
?>

                        <div class="fr">
                            <button id="submit" type="submit" 
                                    class="btn btn-outline-light vollkorn">Submit
                            </button>
                        </div>
                    </div>

                    <input type="hidden" id="quillHtml" name="quill">
                </form>
            </div>
        </div>

        <script>
            var quill = new Quill('#editor', {
                modules: {
                    toolbar: [
                        ['bold', 'italic', 'underline', 'strike',{ 'script': 'sub'}, { 'script': 'super' }],
                        [{'list': 'ordered'}, {'list': 'bullet'}],
                        [{'size': ['small', false, 'large', 'huge']}],

                        [{'color': []}, {'background': []}],
                        
                        ['blockquote', 'code-block'],
                    ]
                },
                theme: 'bubble'
            });

            var myEditor = document.querySelector('#editor');

            $(function () {
                $('#submit').click(function () {

                    var html = myEditor.children[0].innerHTML;
                    $('#quillHtml').val(html);
                });
            });
        </script>
    </body>
</html>