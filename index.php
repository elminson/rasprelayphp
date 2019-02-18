<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script type="text/javascript">// <![CDATA[

    $(document).ready(function() {

        $('#on').click(function(){
            var relay_id = $(this).val();

            var a= new XMLHttpRequest();

            a.open("GET", "switchRelay.php?relay_id="+relay_id+"&status=on"); a.onreadystatechange=function(){

                if(a.readyState==4){ if(a.status ==200){

                } else console.log("http error"); } }

            a.send();

        });

    });

    $(document).ready(function()

    { $('#off').click(function(){
        var relay_id = $(this).val();
        var a= new XMLHttpRequest();

        a.open("GET", "switchRelay.php?relay_id="+relay_id+"&status=off");

        a.onreadystatechange=function(){

            if(a.readyState==4){

                if(a.status ==200){

                } else alert ("http error"); } }

        a.send();

    });

    });

</script>

<button id="on" type="button" value="24"> Switch Lights On 24</button>

<button id="off" type="button" value="24"> Switch Lights Off 24</button>
