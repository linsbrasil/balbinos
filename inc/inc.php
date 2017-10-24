<?php
    define("SITE_URL", "http://localhost/balbinos");
    define("SITE_EMAIL","emerson_linsbrasil@hotmail.com");
    
    function __autoload ( $class_name ){
        //class directories
        $diretorios = array(
            'modelo/',
            'modelo/funcionario/',
            'modelo/folga/',
            'modelo/conexao/',
            'modelo/unidade/',
            '../modelo/',
            '../modelo/funcionario/',
            '../modelo/folga/',
            '../modelo/conexao/',
            '../modelo/unidade/',
            '../../modelo/',
            '../../modelo/funcionario/',
            '../../modelo/folga/',
            '../../modelo/conexao/',
            '../../modelo/unidade/'
        );
        foreach ($diretorios as $diretorio) {
            //Verifica se o diretório existe

            if (file_exists($diretorio . $class_name . '.class.php')) {
                require_once( $diretorio . $class_name . '.class.php' );

            if (file_exists($diretorio . $class_name . '.php')) {
                require_once( $diretorio . $class_name . '.php' );
                return;
            }
        }
}
?>

