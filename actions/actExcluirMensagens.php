<?php
//$status = array(true, true);
if (is_array($arrayExcluir)) {
    for($i=0; $i < sizeof($arrayExcluir); $i++){
        $query = new QueryStatement();
        $status[] =  $query->deleteCard($arrayExcluir[$i]);
        $query->deleteMessage($status[$i]['mensagem']);
        
        if(isset($status[$i]['remetente'])){
            //echo "entro";
            $query->deleteUser('psnAgendaRemetente',$status[$i]['remetente']);
        }
        if(isset($status[$i]['destinatario'])){
            //echo "entro";
            $query->deleteUser('psnAgendaDestinatario',$status[$i]['destinatario']);
        }
    }
    
    var_dump($status);
    if(array_search(false, $status) !== false){
        $mensagem = $systemMensages['dataExclusionFailed'];
        $statusFinal = false;
    }else {
        $mensagem = $systemMensages['dataExclusionSucess'].$i;
        $statusFinal = true;
    }
    extract(Mensages::show($statusFinal, $mensagem));
}


