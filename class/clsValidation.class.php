<?php

class Validation {
    static function duplicatedPost() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { {
                $request = md5(implode($_POST));
                if (isset($_SESSION['last_request']) && $_SESSION['last_request'] == $request) {
                    $retorno = false;
                } else {
                    $_SESSION['last_request'] = $request;
                    $retorno = true;
                }
            }  
        }
        return $retorno;
    }

}
