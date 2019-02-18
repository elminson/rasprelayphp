<?php

namespace Elminson\rasprelayphp;
require __DIR__ . '/vendor/autoload.php';

$rasprelayphp = new rasprelayphp();
?>
<html>

<meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

<!-- Loading Bootstrap -->
<link href="dist/css/vendor/bootstrap.min.css" rel="stylesheet">

<!-- Loading Flat UI -->
<link href="dist/css/flat-ui.css" rel="stylesheet">
<link href="docs/assets/css/demo.css" rel="stylesheet">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">// <![CDATA[

    $(document).ready(function () {
        updateStatus();
        $('.on').click(function () {
            var relay_id = $(this).val();
            var status = $(this).attr("relay-status");
            console.log("relay-status " + status);
            if(status ==1 ){
                status ='off';
                $(this).removeClass('btn-primary');
                $(this).addClass('btn-default');
                $(this).attr("relay-status",0);
            } else {
                status ='on';
                $(this).removeClass('btn-default');
                $(this).addClass('btn-primary');
                $(this).attr("relay-status",1);
            }

            console.log(status);

            var a = new XMLHttpRequest();

            a.open("GET", "switchRelay.php?relay_id=" + relay_id + "&status="+status+"&command=switchRelay");
            a.onreadystatechange = function () {

                if (a.readyState == 4) {
                    if (a.status == 200) {
                        updateStatus();
                    } else console.log("http error");
                }
            }

            a.send();

        });

        function updateStatus() {
            var xhr = new XMLHttpRequest();

            xhr.open("GET", "switchRelay.php?command=status");
            xhr.onreadystatechange = function () {

                if (xhr.readyState == 4) {

                    if (xhr.status == 200) {
                        var resp = JSON.parse(xhr.responseText);
                        $("#status").html("");
                        for (var prop in resp) {
                            //alert("Key:" + prop);
                            //alert("Value:" + jsonObject[prop]);
                            $("#status").append(prop + "=>" + resp[prop] + "<br>");
                        }
                        console.log(resp);
                    } else alert("http error");
                }
            }

            xhr.send();
        }

        $('.off').click(function () {
            var relay_id = $(this).val();
            $(this).removeClass('btn-primary');
            $(this).addClass('btn-default');
            var a = new XMLHttpRequest();

            a.open("GET", "switchRelay.php?relay_id=" + relay_id + "&status=off&command=switchRelay");

            a.onreadystatechange = function () {

                if (a.readyState == 4) {

                    if (a.status == 200) {
                        updateStatus();
                    } else alert("http error");
                }
            }

            a.send();

        });

    });

</script>
<div class="row demo-row">
    <?php
    $relays = $rasprelayphp->getStatus();
    foreach ($relays as $relay => $value) {
        $css = 'btn-default';
        if($value == 1) {
            $css = 'btn-primary';
        }
        ?>
      <div class="col">
        <button relay-status="<?=$value?>" class="on btn btn-block btn-lg <?=$css?>" type="button" id="<?= $relay ?>" value="<?= $relay ?>"> Switch Lights On <?= $relay ?></button>
      </div>
      <div class="col">
      </div>
        <?php
    }

    ?>
</div>
<div id="status"></div>


