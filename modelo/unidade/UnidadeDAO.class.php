<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Unidade
 *
 * @author emers
 */

final class UnidadeDAO extends Unidade {
    private $table;
    private $con;
    function __construct($table, $con) {
        $this->table = "unidade";
        $this->con = (new conexao())->getConecta();
    }
    public function cadastraUnidade($nome, $endereco, $bairro, $cidade, $uf, $tel){
        $sql = "INSERT INTO ".$this->table." (nome, endereco, bairro, cidade, uf, tel) VALUES ('$nome', '$endereco', '$bairro', '$cidade', '$uf', '$tel')";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Dados inseridos com sucesso!";
        } else {
            $resultado = "Falhou! Tente novamente.";
        }
        mysqli_close($this->con);
       return $resultado; 
    }
    public function atualizaDados($id, $nome, $endereco, $bairro, $cidade, $uf, $tel){
        $sql = "UPDATE ".$this->table." SET nome = '$nome',endereco = '$endereco', bairro = '$bairro', cidade = '$cidade', uf = '$uf', tel = '$tel' WHERE id = '$id'";
        $query = mysqli_query($this->con, $sql);
        if(query){
            $resultado = "Dados atualizados com sucesso";
        } else {
            $resultado = "Não foi possível fazer a atualização";
        }
        mysqli_close($this->con);
        return $resultado;
    }
    public function selecionaTudo(){
        $sql = "SELECT * FROM ".$this->table;
        $query = mysqli_query($this->con, $sql);
        if($query){
            $linha = mysqli_num_rows($query);
            if(linha > 0){
               while($obj = mysqli_fetch_array($query)){
                   $resultado[] = $obj;
               }
            } else {
                $resultado = "Não há registros.";
            }
        } else {
            $resultado = "Falha ao consultar a base de dados";
        }
        mysqli_close($this->con);
        return $resultado;
    }
    public function selecionaUnidade($id){
        $sql = "SELECT * FROM ".$this->table." WHERE id = '$id'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $linha = mysqli_num_rows($query);
            if($linha > 0){
               while($obj = mysql_fetch_array($query)){
                   $resultado[] = $obj;
               } 
            } else {
                $resultado = "Não contém dados cadastrados deste usuário.";
            }
        } else {
            $resultado = "Falha ao consultar a base de dados";
        }
        mysqli_close($this->con);
        return $resultado;
    }
     public function excluirUnidade($id){
        $sql = "DELETE FROM ".$this->table." WHERE id = '$id'";
        $query = mysqli_query($this->con, $sql);
        if($query){
            $resultado = "Unidade deletado com sucesso";
        } else {
            $resultado = "Não foi possível deletar a unidade selecionada";
        }
        mysqli_close($this->con);
        return $resultado;
    }

}
