<?PHP

class setVar {

    public static function post($arrayAssocVarIn = false) {
        if (is_array($arrayAssocVarIn) !== false) {
            $qtdIndices = sizeof($arrayAssocVarIn);
            for ($a = 0; $qtdIndices > $a; $a++) {
                if (!isset($_POST[$arrayAssocVarIn[$a]])) {
                    $arrayAssocVarOut[$a] = "";
                } else {                   
                    if(is_string($arrayAssocVarOut)){
                        $arrayAssocVarOut[$a] = mysql_real_escape_string(trim($_POST[$arrayAssocVarIn[$a]]));
                    }else{
                        $arrayAssocVarOut[$a] = $_POST[$arrayAssocVarIn[$a]];
                    }
                    
                }
            }
            $retorno = array_combine($arrayAssocVarIn, $arrayAssocVarOut);
        } else {
            $retorno = false;
        }
        return $retorno;
    }

    public static function get($arrayAssocVarIn = false) {
        if (is_array($arrayAssocVarIn) !== false) {
            $qtdIndices = sizeof($arrayAssocVarIn);
            for ($a = 0; $qtdIndices > $a; $a++) {
                if (!isset($_GET[$arrayAssocVarIn[$a]])) {
                    $arrayAssocVarOut[$a] = "";
                } else {
                    $arrayAssocVarOut[$a] = $_GET[$arrayAssocVarIn[$a]];
                }
            }
            $retorno = array_combine($arrayAssocVarIn, $arrayAssocVarOut);
        } else {
            $retorno = false;
        }
        return $retorno;
    }

    public static function varIsSet($arrayAssocVarIn = false) {
        if (is_array($arrayAssocVarIn) !== false) {
            $qtdIndices = sizeof($arrayAssocVarIn);
            for ($a = 0; $qtdIndices > $a; $a++) {
                if (!isset($GLOBALS[$arrayAssocVarIn[$a]])) {
                    $retorno[$arrayAssocVarIn[$a]] = "";
                }
            }
        }
        return $retorno;
    }

}
