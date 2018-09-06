<?php

/**
 * Description of PessoasDAO
 *
 * @author ronaldo.silva
 */
require_once 'Pessoas.php';

class PessoasDAO extends Pessoas {
    
    protected $tabela = 'pessoas';
    
    public function findUnit($id) {
        $sql = "SELECT * FROM $this->tabela WHERE id = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->execute();
        return $stm->fetch();
    } 
    
    public function findAll() {
        $sql = "SELECT * FROM $this->tabela";
        $stm = DB::prepare($sql);
        $stm->execute();
        return $stm->fetchAll();
    }
    
    public function insert() {
        $sql = "INSERT INTO $this->tabela (nome, ramal, email) VALUES (:nome, :ramal, :email)";
        $stm = DB::prepare($sql);
        $stm->bindParam(':nome', $this->nome);
        $stm->bindParam(':ramal', $this->ramal);
        $stm->bindParam(':email', $this->email);        
        return $stm->execute();        
    }
    
    public function update($id) {
        $sql = "UPDATE $this->tabela SET nome = :nome, ramal = :ramal, email = :email WHERE id = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        $stm->bindParam(':nome', $this->nome);
        $stm->bindParam(':ramal', $this->ramal);
        $stm->bindParam(':email', $this->email);
        return $stm->execute();
    }
    
    public function delete($id) {
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stm = DB::prepare($sql);
        $stm->bindParam(':id', $id, PDO::PARAM_INT);
        return $stm->execute();
    }
}
