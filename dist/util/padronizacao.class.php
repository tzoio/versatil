<?php
class Padronizacao{
	public static function dateFromDataBase($value){
		$data[2] = explode(' ', $value);

	    $data[0] = explode('-',$data[2][0]);
	    $data[1][0] = $data[0][2];//dia
	    $data[1][1] = $data[0][1];//mes
	    $data[1][2] = $data[0][0];//dia

	      //$data[0] esta recebendo a data na versao DD/MM/YYYY
	      //$data[1] na versao YYYY/MM/DD
	      //porem as duas estao "explodidas"

	    return implode('/',$data[1]).' a(s) '.$data[2][1];
    }
}