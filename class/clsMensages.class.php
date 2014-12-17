<?php
class Mensages {
    public static function show($status, $message) {
        
        if (isset($message)) {
            $messageFinal = $message; 
        }else{
            $messageFinal = "A mensagem não esta setada!";
        }
        
        if($status == true){
            $classe = "messageSucessBackground";
        }else{
            $classe = "messageFailedBackground";
        }
        
        $msgInformativo = sprintf("<div class='message %s'>%s</div>", $classe,$messageFinal);
        $mensagemRetorno = array(
            'msgInformativo' => $msgInformativo
        );
        
       return $mensagemRetorno;
    }
}
