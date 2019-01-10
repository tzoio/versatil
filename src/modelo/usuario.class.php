<?php
/**
* Classe do login do usuario 
*/
class Usuario{
    //Atributos
        private $idUsuario; //|01- idUsuario gerado automaticamente
        private $login;     //|02- login do usuario
        private $senha;     //|03- senha do usuario

    //Construtor
        public function __construct(){
        }//fecha construtor

    //DESTRUCT
        public function __destruct(){
            unset($this->idUsuario);
            unset($this->login);
            unset($this->senha);
        }//fecha destruct    
    
    //SET's
        public function __set($atrib,$valor){
            $this->$atrib = $valor;
        }//fecha set
    //GET's
        public function __get($atrib){
            return $this->$atrib;
        }//fecha get

    //toString    
        public function __toString(){
            return nl2br("ID: $this->idUsuario
                          Login: $this->login
                          Senha: $this->senha"
                        );
    }//fecha toString
}//fecha classe