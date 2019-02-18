<?php

namespace Elminson\rasprelayphp;
require __DIR__ . '/vendor/autoload.php';

$rasprelayphp = new rasprelayphp();
?>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">// <![CDATA[

    $(document).ready(function () {
        updateStatus();
        $('.on').click(function () {
            var relay_id = $(this).val();

            var a = new XMLHttpRequest();

            a.open("GET", "switchRelay.php?relay_id=" + relay_id + "&status=on&command=switchRelay");
            a.onreadystatechange = function () {

                if (a.readyState == 4) {
                    if (a.status == 200) {
                        updateStatus();
                    } else console.log("http error");
                }
            }

            a.send();

        });

        function updateStatus(){
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
                            $("#status").append(prop+"=>"+resp[prop]+"<br>");
                        }
                        console.log(resp);
                    } else alert("http error");
                }
            }

            xhr.send();
        }

        $('.off').click(function () {
            var relay_id = $(this).val();
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
<?php

$relays = $rasprelayphp->getStatus();
foreach ($relays as $relay => $value) {
    ?>
  <button id="on" class="on" type="button" value="<?= $relay ?>"> Switch Lights On <?= $relay ?></button>

  <button id="off" class="off" type="button" value="<?= $relay ?>"> Switch Lights Off <?= $relay ?></button>
    <?php
}

?>
<div id="status"></div>
