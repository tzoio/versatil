<?php
//seção de inicialização
session_start();

//inclusões
include '../modelo/postagem.class.php';
include '../dao/postdao.class.php';
//*********************************************************************************//
if(isset($_GET['op'])){
    switch ($_GET['op']){  
        case '1'://cadastrar
            $p = new Postagem();
            $p->titulo= $_POST['titulo'];
            $p->postagem = $_POST['noticia'];
            $p->imgLink = $_POST['imgLink'];          
            print_r($p);
            $postDAO = new PostagemDAO();
            $postDAO->postar($p);
            header('location:../view/lista-noticias.php');         
        break;
//*********************************************************************************//    
        case '2'://buscar
            $pDAO = new PostagemDAO;
            $array = $pDAO->buscarPost();
            $_SESSION['postagem'] = serialize($array);
            header('location:../view/lista-noticias.php');
        break;
//*********************************************************************************//        
        case '3':// deletar
            if(isset($_GET['id'])){
                $pDAO = new PostagemDAO;
                $pDAO->delPost($_GET['id']);
                header('location: post.controle.php?op=2');
            }//fecha if
        break;
//*********************************************************************************//        
        case '4'://filtrar
            if(isset($_POST['pesquisa'])){ 

                $query = "where titulo like '%".$_POST['pesquisa']."%' or "
                ."postagem like '%".$_POST['pesquisa']."%' or "
                ."idPostagem='".$_POST['pesquisa']."'";
                $pDAO = new PostagemDAO;
                $array = $pDAO->filtPost($query);
                $_SESSION['postagem'] = serialize($array);
                header('location:../view/lista-noticias.php');                       
            }//fecha if
        break;
//*********************************************************************************//                
        case '5'://alterar
            if(isset($_GET['id'])){
                $pDAO = new PostagemDAO;
                $query = "where idPostagem=".$_GET['id'];
                $array = $pDAO->filtPost($query);
                $_SESSION['alterar'] = serialize($array[0]);
                if (isset($_GET['noticia'])) {
                    header('Location: ../view/noticia.php');
                } else {

                    header('location:../view/alterar-noticia.php');
                }
            }//fecha if 5
        break;  
//*********************************************************************************//                     
        case '6'://confirmar alteração  
            if (isset($_GET['id'])) {
                $conteudo = new Postagem;
                $conteudo->titulo = $_POST['titulo'];
                $conteudo->postagem = $_POST['noticia'];
                $conteudo->idPostagem = $_GET['id'];
                $pDAO = new PostagemDAO;
                $pDAO->altPost($conteudo);
                header('location: post.controle.php?op=2');
            }         
        break;    
  }//fecha switch
}//fechaif