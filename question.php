<!DOCTYPE html>
<!--
Patrick Bradshaw 2018, probably.
-->
<html class='bg-black'>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <script src="../_assets/js/jquery-3.3.1.min.js" type="text/javascript"></script>

        <script src="../_assets/js/blotter/blotter.min.js" type="text/javascript"></script>
        <script src="../_assets/js/blotter/channelSplitMaterial.js" type="text/javascript"></script>


        <script src="../_assets/js/bootstrap.js" type="text/javascript"></script>
        <link href="../_assets/css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <script src="../_assets/js/iching.js" type="text/javascript"></script>
        <link href="../_assets/css/tachyons.css" rel="stylesheet" type="text/css"/>


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

        <title>Question</title>

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
            #submit {
                font-family: 'Roboto', sans-serif;
                font-weight: 300;
                background: linear-gradient(45deg, #555555, #777777);
            }
            table tr td {
                font-size: 10rem;
                font-weight: bold;
                line-height: .1;
            }
        </style>
    </head>
    <body class='vollkorn vh-100 pa2 center w-100 cover bg-black'>
        <div class="dt h-100 w-100 mw6 center">
            <div class="dtc v-mid">

                <form id="question-form" method="post" action="editor.php" 
                      class='bg-white-90 ba bw1 ph2 pv2 center br3'>
                    <div id="heading" class='w-100 tc'></div>
                    <textarea type="text" id="question" name="question" 
                              class="w-100 pa2 h4 f5 ba bw1 br3 b--black-10 lh-copy mb0" 
                              placeholder="Ask any open-ended question..."></textarea>
                    <button id="submit" type="submit" 
                            class="btn btn-lg btn-block ttu text-white tracked-mega" 
                            style="font-size:15px">Submit
                        <sub><i data-feather="wind" height="18px" width="18px"></i></sub>
                    </button><!-- 貞 -->

                    <input type='hidden' id='result' name='result'>
                    <input type='hidden' id='context' name='context' value="question">
                </form>
            </div>
        </div>

        <script>
            feather.replace();

            $(function () {

                $("#submit").click(function () {
                    var res = iching();
                    $("#result").val(res);
                });

                var text = new Blotter.Text("易經", {
                    family: "'Vollkorn', serif",
                    size: 84,
                    fill: "#171717",
                    paddingLeft: 40,
                    paddingRight: 40
                });



                var material = new Blotter.ChannelSplitMaterial();


                $("body").mousemove(function (e) {
                    myX = e.pageX;
                    myW = window.innerWidth;
                    myY = e.pageY;
                    myH = window.innerHeight;

                    XoW = Number((myX / myW).toFixed(3));
                    XoW = Math.abs(XoW - 0.5);

                    XoW = 2 * ((0.12 * XoW) + 0.01);


                    YoH = Number((myY / myH).toFixed(3));
                    YoH = Math.round(YoH * 30);

                    material.uniforms.uOffset.value = XoW;
                    material.uniforms.uRotation.value = YoH;
                });


                var blotter = new Blotter(material, {
                    texts: text
                });

                var scope = blotter.forText(text);

                scope.appendTo($('#heading'));
            });


        </script>
    </body>
</html>
