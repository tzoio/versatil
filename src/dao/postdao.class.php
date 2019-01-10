<?php
//inclusões
include_once '../persistencia/conexaobanco.class.php';
include_once '../modelo/postagem.class.php';

/**
* Classe das postagens
*/
class PostagemDAO {
    //conection
    private $conexao = null;

    //construtor
    public function __construct() {
        $this->conexao = ConexaoBanco::getInstancia();
    }//fecha construtor
//*************************************************************************************************************************// 
    //cadastrar postagem
    public function postar($conteudo) {
        try {
            $stat = $this->conexao->prepare("insert into postagem(idPostagem,titulo,postagem,imgLink) values(null,?,?,?)");
            $stat->bindValue(1,$conteudo->titulo);
            $stat->bindValue(2,$conteudo->postagem);
            $stat->bindValue(3,$conteudo->imgLink);
            $stat->execute();
            echo $conteudo;
        } catch (PDOException $exc) {
            echo 'Erro ao Postar! ' . $exc;
        }finally{
            $this->conexao = null;
        }//fecha try/catch
    }//fecha cadPostar
//*************************************************************************************************************************//     
    //postar como uma noticia
    public function lista(){
        try{
            $stat = $this->conexao->query('select * from postagem');             
            $ret=$stat->fetchAll(PDO::FETCH_CLASS,'Postagem');
            return $ret;            
        }catch(PDOException $e){
            echo 'Erro ao buscar postagem! ';
        }finally{
            $this->conexao = null;
        }//fecha try/catch
    }//fecha lista   
//*************************************************************************************************************************//     
    //consulta em tabela as postagens
    public function buscarPost() {
        try {
            $stat = $this->conexao->query('select * from postagem');
            $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Postagem');
            return $array;
        } catch (PDOException $exc) {
            echo 'Erro ao buscar postagens! ' . $exc;
        }finally{
            $this->conexao = null;
        }//fecha try/catch
    }//fecha buscarLogin
//*************************************************************************************************************************// 
    //deleta do banco
    public function delPost($id){
        try {           
            $stat = $this->conexao->prepare('delete from postagem where idPostagem=?');           
            $stat->bindValue(1, $id);
            $stat->execute();           
        } catch (PDOException $exc) {
            echo 'Erro ao deletar postagem! '.$exc;
        }finally{
            $this->conexao = null;
        }//fecha try/catch
    }//fecha delPost
//*************************************************************************************************************************//     
    //filtrar as postagens
    public function filtPost($query) {
        try {
            $stat = $this->conexao->query('select * from postagem '.$query);
            $array = $stat->fetchAll(PDO::FETCH_CLASS, 'Postagem');
            return $array;
        } catch (PDOException $exc) {
            echo 'Erro ao filtrar Postagem! ' . $exc;
        }finally{
            $this->conexao = null;
        }//fecha try/catch
    }//fecha filtPost
//*************************************************************************************************************************//     
    //alterar as postagens
    public function altPost($conteudo) {
        try {
            $stat = $this->conexao->prepare("update postagem set titulo=?, postagem=? where idPostagem=?");
            $stat->bindValue(1,$conteudo->titulo);
            $stat->bindValue(2,$conteudo->postagem);
            $stat->bindValue(3,$conteudo->idPostagem);
            $stat->execute();
        } catch (PDOException $exc) {
            echo 'Erro ao alterar Postagem! ' . $exc;
        }finally{
            $this->conexao = null;
        }//fecha try/catch
    }//fecha altPost
//*************************************************************************************************************************//     
    //geramento de JSON
    public function gerarJSON(){
        try{
            $stat = $this->conexao->query("select * from postagem");
            return json_encode(
             $stat->fetchAll(PDO::FETCH_ASSOC));
        } catch (PDOException $exc) {
            echo 'Erro ao gerar JSON! '.$exc;
        }
    }//fecha gerarJSON
}//fecha classe   