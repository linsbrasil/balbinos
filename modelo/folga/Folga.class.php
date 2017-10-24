<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Folga
 *
 * @author emers
 */
class Folga {
    private $Idunidade;
    private $Idfolga;
    private $Idchefe;
    private $Idusuario;
    private $Usuario;
    private $Chefenome;
    private $Cargo;
    private $Turno;
    private $Data;
    private $Dia;
    private $Mes;
    private $Ano;
    private $Tipo;
    private $Obs;
    
    function __construct() {
        
    }

    protected function getIdunidade() {
        return $this->Idunidade;
    }

    protected function getIdfolga() {
        return $this->Idfolga;
    }

    protected function getIdchefe() {
        return $this->Idchefe;
    }

    protected function getIdusuario() {
        return $this->Idusuario;
    }
    
    protected function getUsuario() {
        return $this->Usuario;
    }

    protected function getChefenome() {
        return $this->Chefenome;
    }
    
    protected function getCargo() {
        return $this->Cargo;
    }
   
    protected function getTurno() {
        return $this->Turno;
    }

    protected function getData() {
        return $this->Data;
    }

    protected function getDia() {
        return $this->Dia;
    }

    protected function getMes() {
        return $this->Mes;
    }

    protected function getAno() {
        return $this->Ano;
    }

    protected function getTipo() {
        return $this->Tipo;
    }

    protected function getObs() {
        return $this->Obs;
    }

    protected function setIdunidade($Idunidade) {
        $this->Idunidade = $Idunidade;
    }

    protected function setIdfolga($Idfolga) {
        $this->Idfolga = $Idfolga;
    }

    protected function setIdchefe($Idchefe) {
        $this->Idchefe = $Idchefe;
    }

    protected function setIdusuario($Idusuario) {
        $this->Idusuario = $Idusuario;
    }
    
    protected function setUsuario($Usuario) {
        $this->Usuario = $Usuario;
    }

    protected function setChefenome($Chefenome) {
        $this->Chefenome = $Chefenome;
    }
    
    protected function setCargo($Cargo) {
        $this->Cargo = $Cargo;
    }
    
    protected function setTurno($Turno) {
        $this->Turno = $Turno;
    }

    protected function setData($Data) {
        $this->Data = $Data;
    }

    protected function setDia($Dia) {
        $this->Dia = $Dia;
    }

    protected function setMes($Mes) {
        $this->Mes = $Mes;
    }

    protected function setAno($Ano) {
        $this->Ano = $Ano;
    }

    protected function setTipo($Tipo) {
        $this->Tipo = $Tipo;
    }

    protected function setObs($Obs) {
        $this->Obs = $Obs;
    }
}
