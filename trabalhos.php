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
    include_once 'common/header.php';
    include_once 'common/nav.php';
    ?>
    <script>
        $(document).ready(function(){
           $("#abc").click(function(){
               $("#titulo").css("color","#0000FF");
           })
        });
    </script>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 mt-2"></div>
            <div class="col-md-8 mt-2">
                <!--Right-->
                <div class="md-form input-group">
                    <input type="search" class="form-control" placeholder="Pesquisar Trabalhos..."> <span class="input-group-btn">
                <button class="btn btn-primary btn-sg" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span> </div>
            </div>
            <div class="col-md-2 mt-2"></div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class=" mx-auto"> <a href="#" data-toggle="modal" data-target="#AddModal" class="btn btn-success btn-sg pull-right table-responsive" style="width: 300px;">Inserir Trabalho</a> </div>
            <div class="col-md-2"></div>
        </div>
        <?php
    $trabalhos = mysqli_query($conn, "SELECT * FROM tb_trabalho WHERE cod_aluno = '$matricula'");
    $linha = mysqli_num_rows($trabalhos);
    if($linha > 0){
    ?>
            <div class="row">
                <div class="col-md-2  mt-2"></div>
                <div class="col-md-10 col-md-offset-2 mx-auto mt-2">
                    <table class="table table-striped table-responsive" cellspacing="0" cellpadding="0">
                        <thead colspan="5">
                            <tr>
                                <th>Tema</th>
                                <th>Tipo</th>
                                <th>Disciplina</th>
                                <th>Data Entrega</th>
                                <th>Data Entregue</th>
                                <th>Situação</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  
                        $disciplina = mysqli_query($conn, "SELECT DISTINCT disciplina FROM tb_trabalho");
                        while($mostra_disc = mysqli_fetch_array($disciplina)){
                        
                        $disc = $mostra_disc['disciplina'];
                         $pesquisa_trab = mysqli_query($conn, "SELECT * FROM tb_trabalho WHERE disciplina = '$disc'");
                            
                            while($mostra_trab = mysqli_fetch_array($pesquisa_trab)){
                            $cod_trab = $mostra_trab['cod_trabalho'];
                            ?>
                                <tr>
                                    <td >
                                        <?php echo $tema = $mostra_trab['tema']; ?>
                                    </td>
                                    <td>
                                        <?php echo  $tipo = $mostra_trab['tipo']; ?>
                                    </td>
                                    <td>
                                        <?php echo $disc = $mostra_trab['disciplina']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data_entrega = $mostra_trab['data_entrega']; ?>
                                    </td>
                                    <td>
                                        <?php echo $data_entregue = $mostra_trab['data_entregue']; ?>
                                    </td>
                                    <td>
                                        <?php echo $situacao = $mostra_trab['situacao']; ?>
                                    </td>
                                    <td class="actions"><a class="btn btn-warning btn-sm" id="editBtn" href="#" data-toggle="modal" data-target="#editModal">Editar</a><a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteModal">Excluir</a></td>
                                </tr>
                                <?php }} ?>
                        </tbody>
                        
                        <div id="titulo">ALTERADO</div>
                    </table>
                </div>
            </div>
            <div class="col-md-2 mt-2"></div>
            <?php
           
    }else{
        echo "Não Existem Trabalhos Disponiveis";
    }
    ?>
    </div>

    <?php
        include_once 'common/modalTrabalhos.php';
        include_once 'common/footer.php';
    ?>