<?php 
    if($action == "editar"){
        $query = new QueryStatement();
        $querySelectAll = $query->selectAllCard();
        $html = "";
        $sizeOfArray =  sizeof($querySelectAll);
        
        if($sizeOfArray > 0){
            for($i=0; $i < sizeof($querySelectAll); $i++){
                $remetenteNome= Formatacao::limitarTamanho($querySelectAll[$i]['agnRemetenteNome'], 10, "...");
                $remetenteEmail = Formatacao::limitarTamanho($querySelectAll[$i]['agnRemetenteEmail'], 10, "...");
                $destinatarioNome = Formatacao::limitarTamanho($querySelectAll[$i]['agnNomeDestinatario'], 10, "...");
                $destinatarioEmail= Formatacao::limitarTamanho($querySelectAll[$i]['agnEmailDestinatario'], 10, "...");
                $mensagem = Formatacao::limitarTamanho($querySelectAll[$i]['angMensagem'], 10, "...");

                $html .= "<tr><td><input type='checkbox' name='arrayExcluir[]' value='{$querySelectAll[$i]['idEnvio']}'></td>
                <td class='dblclick' id='rm:ml-{$querySelectAll[$i]['idRemetente']}' >{$remetenteEmail}</td>
                <td class='dblclick' id='rm:nm-{$querySelectAll[$i]['idRemetente']}'>{$remetenteNome}</td>
                <td class='dblclick' id='dn:ml-{$querySelectAll[$i]['idDestinatario']}'>{$destinatarioEmail}</td>
                <td class='dblclick' id='dn:nm-{$querySelectAll[$i]['idDestinatario']}'>{$destinatarioNome}</td>
                <td class='dblclick' id='mn:mn-{$querySelectAll[$i]['idMensagem']}'>{$mensagem}</td>
                <td>{$querySelectAll[$i]['agnDataCriacao']}</td>
                <td class='dblclick' id='ev:dv-{$querySelectAll[$i]['idEnvio']}' >{$querySelectAll[$i]['agnDataEnvio']}</td></tr>";
            }
        }else{
            $html = "<tr><td colspan='8'><h4>Sem registros!</h4></td></tr>";
        }
        require_once("views/vwsEditar.php");
    }
    
