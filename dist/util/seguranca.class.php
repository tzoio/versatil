<?php
/*
* Classe de segurança criptografada(gera a senha criptografada)
*/
class Seguranca{
    public static function criptografar($v){
        return md5('batata'.$v.'irlanda');
    }
}