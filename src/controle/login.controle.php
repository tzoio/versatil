<?php
//seção de inicialização
session_start();
//inclusões
require_once '../modelo/usuario.class.php';
require_once '../dao/logindao.class.php';
require_once '../util/seguranca.class.php';
require_once '../util/controle-login.class.php';
//*********************************************************************************//
if(isset($_GET['op'])){

    switch($_GET['op']){
        case '1'://cadastrar          
            $u = new Usuario();
            $u->login = $_POST['user'];
            $u->senha =Seguranca::criptografar($_POST['password']);
            //banco
            $uDAO = new UsuarioDAO();
            $uDAO->cadastrarUsuario($u);
            $_SESSION['msg'] = 'Usuário cadastrado com sucesso!';
            header('location:../view/login.php');
        break;
//*********************************************************************************//
        case '2'://buscar
            $uDAO = new UsuarioDAO();
            $array = $uDAO->buscarUsuarios();
            $_SESSION['users'] = serialize($array);
            header('location:../view/lista-usuarios.php');
        break; 
//*********************************************************************************//
        case '3':// deletar
            if(isset($_GET['id'])){                        
                $uDAO = new UsuarioDAO();
                $uDAO->deletarUsuario($_GET['id']);                       
                header('location:login.controle.php?op=2');
            }//fecha if
        break;
//*********************************************************************************//
        case '4'://filtrar
            if(isset($_POST['pesquisa'])){                      
                $query="where login like '%".$_POST['pesquisa']."%' or "
                ."idUsuario = '".$_POST['pesquisa']."'";         
                $uDAO = new UsuarioDAO();
                $array = $uDAO->filtrar($query);
                $_SESSION['users'] = serialize($array);
                header('location:../view/lista-usuarios.php');                      
            }//fecha if
        break;
 //*********************************************************************************//                   
        case '5'://alterar                   
            if(isset($_GET['id'])){
                $uDAO = new UsuarioDAO;
                $query = "where idUsuario=".$_GET['id'];
                $array = $uDAO->filtrar($query);
                $_SESSION['alterar'] = serialize($array[0]);
                header('location:../view/alterar-usuario.php');
            }//fecha if                  
        break;
//*********************************************************************************//                
        case '6': //confirmar alteração
            $u = new Usuario;
            $u->idUsuario = $_GET['id'];
            $u->login = $_POST['username'];
            $u->senha = Seguranca::criptografar($_POST['password']);
            $uDAO = new UsuarioDAO;
            $uDAO->alterarUsuario($u);
            header('location:login.controle.php?op=2');
        break;
//*********************************************************************************//        
        case '7'://logar
            $u = new Usuario();
            $u->login = $_POST['user'];
            $u->senha = Seguranca::criptografar($_POST['password']);
            ControleLogin::logar($u);
        break;
//*********************************************************************************//        
        case '8'://deslogar
            ControleLogin::deslogar();
        break;
//*********************************************************************************//
    }//fecha switch
}//fecha if