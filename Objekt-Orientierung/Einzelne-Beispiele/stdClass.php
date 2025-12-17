<?php

    $obj = new stdClass();
    $obj->hugo = "sugo";
    $obj->eigenschaft = "Hallo";
    $obj->methode = function () {
        return "bin eine Methode";
    };

    echo $obj->eigenschaft;
?><br>
<?php
    echo call_user_func($obj->methode);
?><br>
<?php
    $func = $obj->methode;
    echo $func();
?>