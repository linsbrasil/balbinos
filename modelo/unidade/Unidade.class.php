<?php
/**
 * Description of Unidade
 *
 * @author emers
 */
abstract class Unidade {
    private $Idunidade;
    private $Idcoord;
    private $Nome;
    private $Endereco;
    private $Bairro;
    private $Cidade;
    private $Uf;
    private $Cep;
    private $Cxpostal;
    private $Tel;
    private $Email;
    private $Tipo;
    
    function __construct() {}
    
    protected function getIdunidade() {
        return $this->Idunidade;
    }

    protected function getIdcoord() {
        return $this->Idcoord;
    }

    protected function getNome() {
        return $this->Nome;
    }

    protected function getEndereco() {
        return $this->Endereco;
    }

    protected function getBairro() {
        return $this->Bairro;
    }

    protected function getCidade() {
        return $this->Cidade;
    }

    protected function getUf() {
        return $this->Uf;
    }

    protected function getCep() {
        return $this->Cep;
    }

    protected function getCxpostal() {
        return $this->Cxpostal;
    }

    protected function getTel() {
        return $this->Tel;
    }

    protected function getEmail() {
        return $this->Email;
    }

    protected function getTipo() {
        return $this->Tipo;
    }

    protected function setIdunidade($Idunidade) {
        $this->Idunidade = trim(filter_var($Idunidade, FILTER_VALIDATE_INT));
    }

    protected function setIdcoord($Idcoord) {
        $this->Idcoord = trim(filter_var($Idcoord, FILTER_VALIDATE_INT));
    }

    protected function setNome($Nome) {
        $this->Nome = trim(filter_var($Nome));
    }

    protected function setEndereco($Endereco) {
        $this->Endereco = trim(filter_var($Endereco));
    }

    protected function setBairro($Bairro) {
        $this->Bairro = trim(filter_var($Bairro));
    }

    protected function setCidade($Cidade) {
        $this->Cidade = trim(filter_var($Cidade));
    }

    protected function setUf($Uf) {
        $this->Uf = trim(filter_var($Uf));
    }

    protected function setCep($Cep) {
        $this->Cep = trim(filter_var($Cep));
    }

    protected function setCxpostal($Cxpostal) {
        $this->Cxpostal = trim(filter_var($Cxpostal));
    }

    protected function setTel($Tel) {
        $this->Tel = trim(filter_var($Tel));
    }

    protected function setEmail($Email) {
        $Email = trim(filter_var($Email));
        if(!filter_var($Email, FILTER_VALIDATE_EMAIL)){
            die('Email inválido');
        }
        $this->Email = $Email;
    }

    protected function setTipo($Tipo) {
        $this->Tipo = trim(filter_var($Tipo));
    }

}
?>
