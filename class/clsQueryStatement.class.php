<?php

require_once 'clsDBConnection.class.php';

class QueryStatement extends DBConnection {

    private $DB;

    public function __construct() {
        $conn = new DBConnection();
        $this->DB = $conn->Connect();
    }

    public function selectUnicUser($arrayUnicUser) {
        $retorno = false;
        if (is_array($arrayUnicUser)) {
            $sql = "SELECT agnID FROM {$arrayUnicUser['table']} WHERE {$arrayUnicUser['column']} = :email LIMIT 1";
            $stm = $this->DB->prepare($sql);
            $stm->bindValue(":email", $arrayUnicUser['email'], PDO::PARAM_STR);
            $arrayID = $this->RunSelect($stm);
            if (isset($arrayID[0]['agnID'])) {
                $retorno = $arrayID[0]['agnID'];
            }
        }
        return $retorno;
    }

    public function selectAllCard() {
        $sql = "SELECT e.agnID AS idEnvio, r.agnID AS idRemetente, d.agnID AS idDestinatario, m.agnID AS idMensagem ,agnRemetenteEmail,agnRemetenteNome, agnEmailDestinatario,agnNomeDestinatario,angMensagem,agnDataCriacao,agnDataEnvio
                FROM psnAgendaEnvio AS e 
                INNER JOIN psnAgendaRemetente AS r ON (e.agnIDRemetente = r.agnID) 
                INNER JOIN psnAgendaDestinatario AS d ON (e.agnIDDestinatario = d.agnID)
                INNER JOIN psnAgendaMensagem AS m ON (e.agnIDMensagem = m.agnID)";
        $stm = $this->DB->prepare($sql);
        return $this->RunSelect($stm);
    }

    public function deleteCard($id) {
        $retorno = array('status'=>false);
        
        $select1 = "SELECT * FROM psnAgendaEnvio WHERE agnID = :id";
        $stm1 = $this->DB->prepare($select1);
        $stm1->bindParam(":id", $id, PDO::PARAM_INT);
        $arrayID = $this->RunSelect($stm1);  
        
        $retorno['mensagem'] = $arrayID[0]["agnIDMensagem"];
        
        $select3 = "SELECT COUNT(*) AS ocorrencias FROM psnAgendaEnvio WHERE agnIDDestinatario = {$arrayID[0]["agnIDDestinatario"]}";
        $stm3 = $this->DB->prepare($select3);
        $numOcorrenciaDestinatario = $this->RunSelect($stm3); 
        if($numOcorrenciaDestinatario[0]['ocorrencias'] == 1){
            $retorno['destinatario'] = $arrayID[0]["agnIDDestinatario"];
        }
        
        $select5 = "SELECT COUNT(*) AS ocorrencias FROM psnAgendaEnvio WHERE agnIDRemetente = {$arrayID[0]["agnIDRemetente"]}";
        $stm5 = $this->DB->prepare($select5);
        $numOcorrenciaRemetente = $this->RunSelect($stm5);
        if($numOcorrenciaRemetente[0]['ocorrencias'] == 1){
            $retorno['remetente'] = $arrayID[0]["agnIDRemetente"];
        }
        
        $delete2 = "DELETE FROM psnAgendaEnvio WHERE agnID= :id";
        $stm2 = $this->DB->prepare($delete2);
        $stm2->bindParam(":id", $id, PDO::PARAM_INT);
        $retorno['status'] = $this->runQuery($stm2);

        return $retorno; //nao retorna false caso nao seja encontrado o id para deletar
    }
    public function deleteUser($table, $id){
        $delete = "DELETE FROM {$table} WHERE agnID= :id";
        $stm = $this->DB->prepare($delete);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        return $this->runQuery($stm);
    }
    
    public function deleteMessage($id){
        $delete = "DELETE FROM psnAgendaMensagem WHERE agnID= :id";
        $stm = $this->DB->prepare($delete);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        return $this->runQuery($stm);
    }
    
    public function updateLine($array) {
        $sql = "UPDATE {$array['table']} SET {$array['column']} = :value WHERE agnID = :id";
        $stm = $this->DB->prepare($sql);
        $stm->bindParam(":value", $array['value'], PDO::PARAM_STR);
        $stm->bindParam(":id", $array['id'], PDO::PARAM_INT);
        return $this->runQuery($stm);
    }

    public function insertCard($arrayInsert) {
        $this->DB->beginTransaction();
        $retorno = true;

        $tableDestinatario = array(
            'table' => 'psnAgendaDestinatario',
            'column' => 'agnEmailDestinatario',
            'email' => $arrayInsert['emailDestinatario']
        );
        $arrayIDRepetido['destinatario'] = $this->selectUnicUser($tableDestinatario);

        $tableRemetente = array(
            'table' => 'psnAgendaRemetente',
            'column' => 'agnRemetenteEmail',
            'email' => $arrayInsert['emailRemetente']
        );
        $arrayIDRepetido['remetente'] = $this->selectUnicUser($tableRemetente);

        if ($arrayIDRepetido['destinatario'] == false) {
            $sql1 = "INSERT INTO psnAgendaDestinatario(agnEmailDestinatario,agnNomeDestinatario) VALUES (:destinatarioEmail, :destinatarioNome)";
            $stm1 = $this->DB->prepare($sql1);
            $stm1->bindParam(":destinatarioEmail", $arrayInsert['emailDestinatario'], PDO::PARAM_STR);
            $stm1->bindParam(":destinatarioNome", $arrayInsert['nomeDestinatario'], PDO::PARAM_STR);
            $this->runQuery($stm1);
            $insertRelacao['destinatario'] = $this->DB->lastInsertId();
        } else {
            $insertRelacao['destinatario'] = $arrayIDRepetido['destinatario'];
        }

        if ($arrayIDRepetido['remetente'] == false) {
            $sql2 = "INSERT INTO psnAgendaRemetente(agnRemetenteEmail,agnRemetenteNome) VALUES (:remetenteEmail, :remetenteNome)";
            $stm2 = $this->DB->prepare($sql2);
            $stm2->bindParam(":remetenteEmail", $arrayInsert['emailRemetente'], PDO::PARAM_STR);
            $stm2->bindParam(":remetenteNome", $arrayInsert['nomeRemetente'], PDO::PARAM_STR);
            $this->runQuery($stm2);
            $insertRelacao['remetente'] = $this->DB->lastInsertId();
        } else {
            $insertRelacao['remetente'] = $arrayIDRepetido['remetente'];
        }

        $sql3 = "INSERT INTO psnAgendaMensagem(angMensagem) VALUES (:mensagem)";
        $stm3 = $this->DB->prepare($sql3);
        $stm3->bindParam(":mensagem", $arrayInsert['mensagem'], PDO::PARAM_STR);
        $this->runQuery($stm3);
        $insertRelacao['mensagem'] = $this->DB->lastInsertId();

        $sql4 = "INSERT INTO psnAgendaEnvio(agnDataEnvio, agnIDDestinatario, agnIDRemetente, agnIDMensagem) VALUES (:dataEnvio, {$insertRelacao['destinatario']}, {$insertRelacao['remetente']}, {$insertRelacao['mensagem']})";
        $stm4 = $this->DB->prepare($sql4);
        $stm4->bindParam(":dataEnvio", $arrayInsert['dataEnvio'], PDO::PARAM_STR);
        $retorno = $this->runQuery($stm4);

        $this->DB->commit();
        
        return $retorno;
    }
}
