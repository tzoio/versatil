<?php
//inclusões
require '../persistencia/conexaobanco.class.php';
include_once '../modelo/usuario.class.php';
/**
*Classe do Usuario de Login 
*/
class UsuarioDAO {
    //conexão banco
        private $conexao = null;
    //construtor
        public function __construct() {
            $this->conexao = ConexaoBanco::getInstancia();
        }
//*************************************************************************************************************************//        
    //Cadastro do usuario de login    
        public function cadastrarUsuario($u) {
            try {
                $stat = $this->conexao->prepare('insert into usuario (idUsuario, login, senha)'.'values (null, ?, ?);');
                $stat->bindValue(1, $u->login);
                $stat->bindValue(2, $u->senha);
                $stat->execute();
            } catch (PDOException $exc) {
                echo 'Erro ao cadastrar! ' . $exc;
            }finally{
                $this->conexao = null;
            }//fecha try-catch
        }//fecha cadastrarUsuario
//*************************************************************************************************************************//        
    //buacar usuarios    
        public function buscarUsuarios() {
            try {
                $stat = $this->conexao->query('select * from usuario');                
                $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Usuario');               
                return $array;
            } catch (PDOException $exc) {
                echo 'Erro ao buscar usuarios! ' . $exc;
            }finally{
                $this->conexao = null;
            }//fecha catch
        }//fecha buscarUsuarios
//*************************************************************************************************************************//        
    //deletar usuarios
        public function deletarUsuario($id){
            try {               
                $stat = $this->conexao->prepare("delete from usuario where idUsuario = ?");              
                $stat->bindValue(1, $id);
                $stat->execute();
            } catch (PDOException $exc) {
                echo 'Erro ao deletar! '.$exc;
            }finally{
                $this->conexao = null;
            }//fecha catch
        }//fecha deletarUsuario
//*************************************************************************************************************************//        
    //filtrar usuarios
        public function filtrar($query) {
            try {
                $stat = $this->conexao->query('select * from usuario '.$query);           
                $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Usuario');          
                return $array;
            } catch (PDOException $exc) {
                echo 'Erro ao filtrar usuarios! ' . $exc;
            }finally{
                $this->conexao = null;
            }//fecha catch
        }//fecha filtrar
//*************************************************************************************************************************//        
    //alterar usuarios
        public function alterarUsuario($u) {
            try {
                $stat = $this->conexao->prepare("update usuario set login=?,senha=? where idUsuario=?");
                $stat->bindValue(1,$u->login);
                $stat->bindValue(2,$u->senha);
                $stat->bindValue(3,$u->idUsuario);
                $stat->execute();
            } catch (PDOException $exc) {
                echo 'Erro ao alterar usuario! ' . $exc;
            }finally{
                $this->conexao = null;
            }//fecha catch
        }//fecha alterarUsuario
//*************************************************************************************************************************//        
    //geramento de json    
        public function gerarJSON(){
            try{
                $stat = $this->conexao->query("select * from logar");               
                return json_encode(
                 $stat->fetchAll(PDO::FETCH_ASSOC));
            } catch (PDOException $exc) {
                echo 'Erro ao gerar JSON! '.$exc;
            }//fecha catch
        }//fecha gerarJSON
//*************************************************************************************************************************//        
    //verificando o Login do Usuario
        public function verificarLogin($u){
            try{
                $stat = $this->conexao->query("select * from usuario where login='$u->login' and senha='$u->senha'");           
                $pessoa = null;
                $pessoa = $stat->fetchObject('Usuario');
                return $pessoa;
            } catch (PDOException $exc) {
                echo 'Erro ao verificar Login! '.$exc;
            }//fecha catch
        }//fecha verificar login   
}//fecha classe