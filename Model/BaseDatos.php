<?php

    function OpenBD (){
        return mysqli_connect("localhost:3308", "root", "", "proyectoambweb");
    }

    function CloseBD($conn){

        mysqli_close($conn);

    }
?>