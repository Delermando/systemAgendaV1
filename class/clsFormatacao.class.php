<?PHP

class Formatacao {

    public static function mesExtenso($data) {
        $data = substr($data, 0, 10);
        $data = explode("/", $data);
        $dia = (int) $data[2];
        $mes = $data[1];
        $ano = $data[0];
        switch ($mes) {
            case 1: $mes = "Janeiro";
                break;
            case 2: $mes = "Fevereiro";
                break;
            case 3: $mes = "Março";
                break;
            case 4: $mes = "Abril";
                break;
            case 5: $mes = "Maio";
                break;
            case 6: $mes = "Junho";
                break;
            case 7: $mes = "Julho";
                break;
            case 8: $mes = "Agosto";
                break;
            case 9: $mes = "Setembro";
                break;
            case 10: $mes = "Outubro";
                break;
            case 11: $mes = "Novembro";
                break;
            case 12: $mes = "Dezembro";
                break;
        }
        $retorno[] = $dia;
        $retorno[] = $mes;
        //return $dia." de ".$mes. " de ".$ano;
        return $retorno;
    }

     public static function dateToBR($dataAmericana) {
        //2011-09-11 -> 11/09/2011
        $d = explode('-', $dataAmericana);
        $dOK = $d[2] . '/' . $d[1] . '/' . $d[0];
        return $dOK;
    }

     public static function dateToUS($dataBrasil) {
        //11-09-2011 -> 2011-09-11
        $d = explode('/', $dataBrasil);
        $dOK = $d[2] . '-' . $d[1] . '-' . $d[0];
        return $dOK;
    }

     public static function dateTimeToBR($data_americana_his) {
        $d = explode(' ', $data_americana_his);
        $ok = $this->dateToBR($d[0]) . ' ' . $d[1];
        return $ok;
    }

     public static function dateTimeToUS($data_brasil_his) {
        $d = explode(' ', $data_brasil_his);
        $ok = $this->dateToUS($d[0]) . ' ' . $d[1];
        return $ok;
    }

     public static function convertMaiusculaMinuscula($arrayString, $tp = 0) {
        if (!is_array($arrayString)) {
            $string[] = $arrayString;
        } else {
            $string = $arrayString;
        }

        if ($tp == "1") {
            for ($a = 0; sizeof($string) > $a; $a++) {
                $palavra[] = mb_strtoupper($string[$a], 'UTF-8');
            }
        } elseif ($tp == "0") {
            for ($a = 0; sizeof($string) > $a; $a++) {
                $palavra[] = mb_strtolower($string[$a], 'UTF-8');
            }
        }
        return $palavra;
    }

     public static function formatarNomePropio($nome) {
        if (!is_array($nome)) {
            $string[] = $nome;
        } else {
            $string = $nome;
        }

        $saida = "";
        for ($a = 0; sizeof($string) > $a; $a++) {
            $nome = $this->convertMaiusculaMinuscula($string[$a]); // Converter o nome todo para minúsculo
            $nome = explode(" ", $nome[0]); // Separa o nome por espaços

            for ($i = 0; $i < count($nome); $i++) {
                if ($nome[$i] == "de" or $nome[$i] == "da" or $nome[$i] == "e" or $nome[$i] == "dos" or $nome[$i] == "do") {
                    $saida .= $nome[$i] . ' '; // Se a palavra estiver dentro das complementares mostrar toda em minúsculo
                } else {
                    $saida .= ucfirst($nome[$i]) . ' '; // Se for um nome, mostrar a primeira letra maiúscula
                }
            }
            $nomeFormatado[] = trim($saida);
            $saida = "";
        }



        return $nomeFormatado;
    }

     public static function removerAcento($str) {
        if (!is_array($str)) {
            $string[] = $str;
        } else {
            $string = $str;
        }

        for ($a = 0; sizeof($string) > $a; $a++) {
            $arrayString[] = strtr(utf8_decode($string[$a]), utf8_decode('ŠŒŽšœžŸ¥µÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýÿ'), 'SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy');
        }

        return $arrayString;
    }

     public static function removeEspacosBorda($str) {
        if (!is_array($str)) {
            $string[] = $str;
        } else {
            $string = $str;
        }

        for ($a = 0; sizeof($string) > $a; $a++) {
            $arrayString[] = trim($string[$a]);
        }
        return $arrayString;
    }

     public static function removeEspacosInternos($str) {
        if (!is_array($str)) {
            $string[] = $str;
        } else {
            $string = $str;
        }

        for ($a = 0; sizeof($string) > $a; $a++) {
            $arrayString[] = preg_replace("/(?<=\\S)(\\s+)(?=\\S)/", ' ', $string[$a]);
        }
        return $arrayString;
    }

     public static function removerOuSubstituirCaracter($caracterBuscar, $caracterSubstituir, $str) {
        if (!is_array($str)) {
            $string[] = $str;
        } else {
            $string = $str;
        }

        for ($a = 0; sizeof($string) > $a; $a++) {
            $arrayString[] = str_replace($caracterBuscar, $caracterSubstituir, $string[$a]);
        }
        return $arrayString;
    }

     public static function validarEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $retorno = false;
        } else {
            $retorno = true;
        }
        return $retorno;
    }

     public static function formatarNomeCertificado($nomeEntrada) {
        $nome = explode(" ", trim($nomeEntrada));
        $arrayLength = sizeof($nome);
        if ($arrayLength > 2) {
            $nomeEntrada = $nome[0] . " " . $nome[$arrayLength - 1];
        }
        return $nomeEntrada;
    }

     public static function apenasNumeros($arrayDados) {
        if (!is_array($arrayDados)) {
            $string[] = $arrayDados;
        } else {
            $string = $arrayDados;
        }

        for ($a = 0; sizeof($string) > $a; $a++) {
            $arrayNumeros[] = preg_replace("/[^0-9]/", "", $string[$a]);
        }
        return $arrayNumeros;
    }

     public static function extrairEmail($arrayEmail) {
        if (!is_array($arrayEmail)) {
            $string[] = $arrayEmail;
        } else {
            $string = $arrayEmail;
        }
        for ($a = 0; sizeof($string) > $a; $a++) {
            $emails = preg_match_all('/([\w\d\.\-\_]+)@([\w\d\.\_\-]+)/mi', $string[$a], $matches);
            $array[] = $matches[0][0];
        }
        return $array;
    }

     public static function limitarTamanho($string, $tamanho, $finalString) {
        if (strlen($string) > $tamanho) {
            $final = substr($string, 0, $tamanho) . $finalString;
        } else {
            $final = $string;
        }
        return $final;
    }

}
