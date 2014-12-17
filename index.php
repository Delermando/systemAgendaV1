<?php
    require_once('controllers/ctlHeader.php');
    require_once("views/vwsHeader.php");
    if ($caminho != "") {
            require_once($caminho);
    } else {
            require_once("views/vwsErroMensage.php");
    }
    require_once("views/vwsFooter.php");
