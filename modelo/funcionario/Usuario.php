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
class Usuario {
    protected $Id;
    protected $Nome;
    protected $Sobrenome;
    protected $Nascimento;
    protected $Email;
    protected $Cargo;
    protected $Senha;
    protected $Idunidade;
    protected $Plantao;
    protected $Nivel;
    protected $Ativo;
   
    function __construct() {
    }
    function getId() {
        return $this->Id;
    }
    
    protected function cadastra($idunidade, $plantao, $nome, $sobreNome, $nascimento, $email, $cargo){
        $this->setIdUnidade($idunidade);
        $this->setPlantao($plantao);
        $this->setNome($nome);
        $this->setSobrenome($sobreNome);
        $this->setNascimento($nascimento);
        $this->setEmail($email);
        $this->setCargo($cargo);
    }
    protected function atualiza($id, $plantao, $nome, $sobreNome, $nascimento, $email, $cargo){
        $this->setId($id);
        $this->setPlantao($plantao);
        $this->setNome($nome);
        $this->setSobrenome($sobreNome);
        $this->setNascimento($nascimento);
        $this->setEmail($email);
        $this->setCargo($cargo);
    }
    protected function login($email, $senha){
        $this->setEmail($email);
        $this->setSenha($senha);
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

    protected function getPlantao() {
        return $this->Plantao;
    }

    protected function getNivel() {
        return $this->Nivel;
    }
    
    protected function getAtivo() {
        return $this->Ativo;
    }

    protected function setId($Id) {
        if(!empty($Id)){
            $id = (Int) $Id;
            $this->Id = filter_var($id, FILTER_VALIDATE_INT);
        }
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
        $email = trim(filter_var($Email));
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            die('Email inválido');
        }
        $this->Email = $Email;
    }

    protected function setCargo($Cargo) {
        $this->Cargo = strtoupper( trim(filter_var($Cargo)));
    }

    protected function setSenha($Senha) {
        $senha = trim($Senha);
        if($senha > 7 && $senha <= 15){
            $this->Senha = $senha;
        }
    }

    protected function setIdunidade($Idunidade) {
        if(is_int($Idunidade)){
            $this->Idunidade = trim(filter_var($Idunidade));
        }
    }

    protected function setPlantao($Plantao) {
        $this->Plantao = ucfirst(trim(filter_var($Plantao)));
    }

    protected function setNivel($Nivel) {
        $nivel = (Int)$Nivel;
        $this->Nivel = filter_var($nivel, FILTER_VALIDATE_INT);
    }
    protected function setAtivo($Ativo) {
        $this->Ativo = trim(filter_var($Ativo));
    }

//Fim da Classe Usuário
}
