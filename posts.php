<!DOCTYPE html>
<!--
Patrick Bradshaw 2018, probably.
-->
<?php
require_once "../util/dbconn.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
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

        <!--<meta charset="UTF-8">-->
        
        <style>
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

            p { font-size: 19px;  }
            h3 { font-size: 24px; }
            h4 { font-size: 21px; }
            h1, h2, h3, h4, h5, h6 {
                font-weight: normal
            }
            h3,
            h4 {
                color: #9EEBCF;
            }
        </style>
        <script>
            $(function() {
                
            $('.quill > p').addClass('near-white');
            });
        </script>
            
    </head>
    <body class="w-100 helvetica bg-black pv3">
        <div class="pa2"><a href="question.php" class="btn roboto-cond ttu tracked text-light">Ask again</a></div>
        
        
        <!--And LINK to DeKorne, and Wilhelm-->
        
        
        
        <form name="result" id="result" method="get" action="result.php">
            <div id="grid" class="mw6 center white vollkorn">
                <?php
                $sql = "SELECT * FROM iching._questions ORDER BY Date DESC;";
                $return = $con->query($sql);
                while ($row = mysqli_fetch_array($return)) { ?>
                    <div class="mv5 pt5">
                        <div class='post' data-id='<?php echo $row['qId']; ?>'>
                            <h6 class="tr dark-gray f5 roboto-cond ttu"><?php
                                $date = date_create($row['Date']);
                                echo date_format($date, "m/d/y g:i a");
                                ?></h6>
                            <h2 class="tc mv4 pb3"><?php echo $row['Question']; ?></h2>
                            <div class="quill"><?php echo $row['Notes']; ?></div>
                        </div>
                    </div>
                <?php } ?>

            </div>
            <input name="queryId" type="hidden" id="queryId">
        </form>



    </body>
</html>
