<?php

if ($cadastrarCartoes == true && Validation::duplicatedPost() == true) {
    $dataEnvio = $selectDia . "/" . $selectMes . "/" . $selectAno;
    if ($txtEmailDestinatario != "" && $txtNomeDestinatario != "" && $txtEmailRemetente != "" && $txtNomeRemetente != "" && $txtMensagem != "" && $dataEnvio != "" && $dataEnvio != "//") {
        $query = new QueryStatement();
        $arrayInsert = array(
            'emailDestinatario' => $txtEmailDestinatario,
            'nomeDestinatario' => $txtNomeDestinatario,
            'emailRemetente' => $txtEmailRemetente,
            'nomeRemetente' => $txtNomeRemetente,
            'mensagem' => $txtMensagem,
            'dataEnvio' => $dataEnvio
        );
        $queryInsert = $query->insertCard($arrayInsert);
        if ($queryInsert == true) {
            $mensagem = $systemMensages['registrationSucess'];
        } else {
            $mensagem = $systemMensages['registratioFailed'];
        }
        extract(Mensages::show($queryInsert, $mensagem));
    } else {
        extract(Mensages::show(false, $systemMensages['fieldIncomplete']));
    }
}

