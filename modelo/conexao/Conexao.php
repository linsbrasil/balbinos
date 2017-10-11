<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Conexao
 *
 * @author emers
 */


include_once '../../config.php';
class conexao {
    private $conecta;
    function __construct() {
        $this->conecta = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            mysqli_query($this->conecta,"SET NAMES 'utf8'");
            mysqli_query($this->conecta,'SET character_set_connection=utf8');
            mysqli_query($this->conecta,'SET character_set_client=utf8');
            mysqli_query($this->conecta,'SET character_set_results=utf8');

        if (mysqli_connect_errno($this->conecta)) {
            echo "Connection (MySQL) failed: " . mysqli_connect_error();
        }
    }
     public function getConecta(){
        return $this->conecta;
    }

}
?>