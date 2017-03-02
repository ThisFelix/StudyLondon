<?php 
    SESSION_START();
    if($_SESSION['slogin'] && $_SESSION['smatricula']){
        $logado = $_SESSION['slogin'];
        $matricula = $_SESSION['smatricula'];
    }else{
        unset($_SESSION['slogin']);
        unset($_SESSION['smatricula']);
        SESSION_DESTROY();
        header('Location: index.html');
    }
    
            include_once 'common/conecta.php';
            
            $tema = $_POST['tema'];
            $tipo = $_POST['tipo'];
            $disciplina = $_POST['disciplina'];
            $data = $_POST['data'];
            $entregue = $_POST['data_entregue'];
            
            $inserir = mysqli_query($conn, "INSERT INTO tb_trabalho (cod_aluno,tipo,tema,disciplina,data_entrega,data_entregue) VALUES ('$matricula','$tipo','$tema','$disciplina','$data','$entregue')");
                
            include_once 'common/header.php';
            include_once 'common/nav.php';
    
            if($inserir){
                echo '<h3> Dados Inseridos Com Sucesso </h3';
            }else{
                echo '<h3> Erro ao inserir </h3';
            }

            include_once 'common/footer.php';