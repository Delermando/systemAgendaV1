<?php
ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);
define('DB_HOST', '192.168.0.198');
define('DB_NAME', 'agenda');
define('DB_USER', 'agenda');
define('DB_PASS', 'agenda');
require_once '../class/clsQueryStatement.class.php';

$arrayColunas = array(
    'rm:ml' => array('psnAgendaRemetente', 'agnRemetenteEmail'),
    'rm:nm' => array('psnAgendaRemetente', 'agnRemetenteNome'),
    'dn:ml' => array('psnAgendaDestinatario', 'agnEmailDestinatario'),
    'dn:nm' => array('psnAgendaDestinatario', 'agnNomeDestinatario'),
    'mn:mn' => array('psnAgendaMensagem', 'angMensagem'),
    'ev:dv' => array('psnAgendaEnvio', 'agnDataEnvio')
);

$id = $_POST['id'];
$value = $_POST['value'];
$campoID = explode("-", $id);

$arrayUpdate = array(
    'id' => $campoID[1],
    'table' => $arrayColunas[$campoID[0]][0],
    'column' => $arrayColunas[$campoID[0]][1],
    'value' => $value
);

$query = new QueryStatement();
$queryUpdate = $query->updateLine($arrayUpdate);

if($queryUpdate){    
    $retorno = $value;
}else{
    //$retorno = "<span class='erro'><strong>Ocorreu um erro!</strong></span>";
    $retorno = 'erro';
}
echo $retorno;
