<?php
class ConexaoBanco extends PDO{
	
	//variavel
	private static $instancia;
	
	//construtor
	public function __construct($dsn,$usuario,$senha){
		//Construtor da classe pai PDO
		parent::__construct($dsn,$usuario,$senha);
    }//fecha construtor
	
    //Instanciamento
	public static function getInstancia() {
        if (!isset(self::$instancia)) {
            try {
                /* Cria e retorna uma nova conexão*/
				self::$instancia = new ConexaoBanco("mysql:dbname=databasewemake;host=databasewemake.mysql.dbaas.com.br","databasewemake","WeMakeSI123");
			}catch(Exception $e){
				echo 'Erro ao conectar: '.$e;
		    	exit();				
			}//fecha catch
		}//fecha if
	  return self::$instancia;
   	}//fecha método
}//fecha classe