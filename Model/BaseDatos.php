<?php

    function OpenBD ()
    {
        return mysqli_connect("127.0.0.1:3308", "root", "", "proyectoambweb");
    }

    function CloseBD($conn)
    {
        mysqli_close($conn);
    }
?>