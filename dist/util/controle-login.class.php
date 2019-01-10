<?php
//inclusões
include_once '../dao/logindao.class.php';
/*
* Classe que permite se logar no site, deslogar e vefivica o acesso
*/
class ControleLogin{

    //logar
        public static function logar($u){
            $uDAO = new UsuarioDAO;
            $usuario = $uDAO->verificarLogin($u);
            
            if($usuario && !is_null($usuario)){
                //usuario foi encontrado no banco
                    $_SESSION['privateUser']=serialize($usuario);
                //Direcionar o usuário para a página desejada!
                    header('location:../view/adicionar-noticia.php');
            }else{
                //usuario não encontrado no banco
                    $_SESSION['msg'] = 'Usuário ou senha inválido(s)';
                    header('location:../view/login.php');
            }//fecha else
        }//fecha método logar

    //deslogar   
        public static function deslogar(){
            unset($_SESSION['privateUser']);
            $_SESSION['msg'] = 'Você foi deslogado!';
            header('location:../view/login.php');
        }
    
    //verificarAcesso    
        public static function verificarAcesso(){
            if(!isset($_SESSION['privateUser'])){
                $_SESSION['msg'] = 'Você precisa estar logado para ver este conteúdo';
                header('location:../view/login.php');
            }//fecha if
        }//fecha verificarAcesso

        public static function verificarLogin(){
            return isset($_SESSION['privateUser']);
        }//fecha verificarAcesso
}//controle-login.class