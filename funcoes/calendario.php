<?php
function verDiasDoMesAtual(){
    $mesAtual = date("m"); //01-12
    $anoAtual = date("Y");
    $mesDias = verDiasDoMes($mesAtual, $anoAtual);
    return $mesDias;
}

function verMesAtual(){
    $mesAtual = date("m"); //01-12
    $mes = verMes($mesAtual);
    return $mes;
}

function verDiasDoMes($mes, $ano){
    switch ($mes){
        case 1:
            $mes_dias = 31;
            break;
        case 2:
            if((($ano % 4) == 0 and ($ano % 100)!=0) or ($ano % 400)==0){
                $mes_dias = 29 ;
            } else {
                $mes_dias = 28 ;
            } 
            break;
        case 3:
            $mes_dias = 31;
            break;
        case 4:
            $mes_dias = 30;
            break;
        case 5:
            $mes_dias = 31;
            break;
        case 6:
            $mes_dias = 30;
            break;
        case 7:
            $mes_dias = 31;
            break;
        case 8:
            $mes_dias = 31;
            break;
        case 9:
            $mes_dias = 30;
            break;
        case 10:
            $mes_dias = 31;
            break;
        case 11:
            $mes_dias = 30;
            break;
        case 12:
            $mes_dias = 31;
            break;
    }
    return $mes_dias;
}    

function verMes($mes){
    switch ($mes){
        case 1:
            $mes_extensao = "Janeiro";
            break;
        case 2:
            $mes_extensao = "Fevereiro";
            break;
        case 3:
            $mes_extensao = "Março";
            break;
        case 4:
            $mes_extensao = "Abril";
            break;
        case 5:
            $mes_extensao = "Maio";
            break;
        case 6:
            $mes_extensao = "Junho";
            break;
        case 7:
            $mes_extensao = "Julho";
            break;
        case 8:
            $mes_extensao = "Agosto";
            break;
        case 9:
            $mes_extensao = "Setembro";
            break;
        case 10:
            $mes_extensao = "Outubro";
            break;
        case 11:
            $mes_extensao = "Novembro";
            break;
        case 12:
            $mes_extensao = "Dezembro";
            break;
        default :
            $mes_extensao = "Não existe";
            break;
    }
    return $mes_extensao;
} 
?>