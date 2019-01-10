<?php  
/**
* Classe para Postagens
*/
class Postagem{
    //Atributos
        private $idPostagem; //|01- ID da Postagem
        private $titulo;     //|02- Títlulo da Postagem
        private $postagem;   //|03- Postagem (caixa de texto/textarea)
        private $dataHora;   //|04- Data e Hora gerada automaticamente
        private $imgLink;
    //FIM Dos Atributos	

    //CONSTRUCT
        public function __construct(){}

    //DESTRUCT
        public function __destruct(){
            unset($this->idPostagem);
            unset($this->titulo);
            unset($this->postagem);
            unset($this->dataHora);
            unset($this->imgLink);
        }//fecha destruct

    //SET's
        public function __set($a, $v){
            $this->$a = $v;
        }//fecha set

    //GET's
        public function __get($a){
            return $this->$a;
        }//fecha get

    //toString
        public function __toString(){
            return nl2br("Codigo da Postagem: $this->idPostagem
                                      Titulo: $this->titulo
                                    Texto: $this->postagem
                                  Postado em: $this->dataHora
                                  Imglink: $this->imgLink"
                        );
        }//fecha toString		
}//fecha classe