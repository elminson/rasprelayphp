<html>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">// <![CDATA[

    $(document).ready(function() {

        $('#on').click(function(){

            var a= new XMLHttpRequest();

            a.open("GET", "switchRelay.php?relay_id=24&status=on"); a.onreadystatechange=function(){

                if(a.readyState==4){ if(a.status ==200){

                } else alert ("http error"); } }

            a.send();

        });

    });

    $(document).ready(function()

    { $('#Off').click(function(){

        var a= new XMLHttpRequest();

        a.open("GET", "switchRelay.php?relay_id=24&status=off");

        a.onreadystatechange=function(){

            if(a.readyState==4){

                if(a.status ==200){

                } else alert ("http error"); } }

        a.send();

    });

    });

</script>

<button id="on" type="button"> Switch Lights On </button>

<button id="off" type="button"> Switch Lights Off </button>