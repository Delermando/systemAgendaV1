<?php

ob_start();
session_start();
header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');

ini_set('display_errors', 'on');
error_reporting(E_ALL);
ini_set("log_errors", 1);
ini_set("error_log", "php-error.log");
error_log("erro => ");

require_once("class/clsSetVar.class.php");
require_once("ctlGlobals.php"); 
require_once("class/clsQueryStatement.class.php");
require_once("class/clsMensages.class.php");
require_once("class/clsValidation.class.php");
require_once("class/clsFormatacao.class.php");

switch ($action) {
    case "":
        $linksCabecalho = $arrayLinksCabecalho['default'];
        $title = $arrayTitle['home'];
        $caminho = 'actions/actHome.php';
        break;
    case "cadastro":
        $linksCabecalho = $arrayLinksCabecalho['default'];
        $title = $arrayTitle['cadastro'];
        $caminho = 'actions/actCadastro.php';
        if($cadastrarCartoes == true){
            require_once("actions/actCadastrarCartoes.php");
        }
    
        break;
    case "editar":
        $linksCabecalho = $arrayLinksCabecalho['jquery'];
        $linksCabecalho .= $arrayLinksCabecalho['scripts'];
        $linksCabecalho .= $arrayLinksCabecalho['editOnPageJS'];
        $linksCabecalho .= $arrayLinksCabecalho['editOnPageCSS'];
        $linksCabecalho .= $arrayLinksCabecalho['jeditable'];
        $linksCabecalho .= $arrayLinksCabecalho['configJeditable'];
        $title = $arrayTitle['editar'];
        $caminho = 'actions/actEditar.php';
        if(is_array($arrayExcluir)){
            require_once("actions/actExcluirMensagens.php");
        }
        break;
    default :
        $linksCabecalho = $arrayLinksCabecalho['default'];
        $title = $arrayTitle['error'];
        $caminho = 'actions/actErroMensage.php';
}
