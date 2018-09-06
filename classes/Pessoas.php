<?php

/**
 * Description of Pessoas
 *
 * @author ronaldo.silva
 */
require_once 'DB.php';

abstract class Pessoas extends DB{
    
    protected $tabela;
    
    public $nome;
    public $ramal;
    public $email;
    
    function getNome() {
        return $this->nome;
    }

    function getRamal() {
        return $this->ramal;
    }

    function getEmail() {
        return $this->email;
    }

    function setNome($nome) {
        $this->nome = $nome;
    }

    function setRamal($ramal) {
        $this->ramal = $ramal;
    }

    function setEmail($email) {
        $this->email = $email;
    }


}
