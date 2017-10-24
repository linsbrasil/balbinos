<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author emers
 */
abstract class Usuario {
    private $Id;
    private $Nome;
    private $Sobrenome;
    private $Nascimento;
    private $Email;
    private $Cargo;
    private $Senha;
    private $Idunidade;
    private $Turno;
    private $Nivel;
    private $Ativo;
   
    function __construct() {
    }
    function getId() {
        return $this->Id;
    }     
    protected function getNome() {
        return $this->Nome;
    }

    protected function getSobrenome() {
        return $this->Sobrenome;
    }

    protected function getNascimento() {
        return $this->Nascimento;
    }

    protected function getEmail() {
        return $this->Email;
    }

    protected function getCargo() {
        return $this->Cargo;
    }

    protected function getSenha() {
        return $this->Senha;
    }

    protected function getIdunidade() {
        return $this->Idunidade;
    }

    protected function getTurno() {
        return $this->Turno;
    }

    protected function getNivel() {
        return $this->Nivel;
    }
    
    protected function getAtivo() {
        return $this->Ativo;
    }

    protected function setId($Id) {
            $this->Id = filter_var($Id, FILTER_VALIDATE_INT);
    }

    protected function setNome($Nome) {
        $this->Nome = ucfirst(strtolower( trim(filter_var($Nome))));
    }

    protected function setSobrenome($Sobrenome) {
        $this->Sobrenome = ucfirst(strtolower(trim(filter_var($Sobrenome))));
    }

    protected function setNascimento($Nascimento) {
        $this->Nascimento = trim(filter_var($Nascimento));
    }

    protected function setEmail($Email) {
        $Email = trim(filter_var($Email));
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            die('Email inválido');
        }
        $this->Email = $Email;
    }

    protected function setCargo($Cargo) {
        $this->Cargo = strtoupper( trim(filter_var($Cargo)));
    }

    protected function setSenha($Senha) {
        $Senha = trim($Senha);
        if($Senha > 7 && $Senha <= 15){
            $this->Senha = $Senha;
        }
    }

    protected function setIdunidade($Idunidade) {
        $this->Idunidade = trim(filter_var($Idunidade, FILTER_VALIDATE_INT));
    }

    protected function setTurno($Turno) {
        $this->Turno = ucfirst(trim(filter_var($Turno)));
    }

    protected function setNivel($Nivel) {
        $this->Nivel = filter_var($Nivel, FILTER_VALIDATE_INT);
    }
    protected function setAtivo($Ativo) {
        $this->Ativo = trim(filter_var($Ativo));
    }

//Fim da Classe Usuário
}
?>