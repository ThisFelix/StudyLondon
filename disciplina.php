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
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 mt-2"></div>
            <div class="col-md-8 mt-2">
                <!--Right-->
                <div class="md-form input-group">
                    <input type="search" class="form-control" placeholder="Pesquisar Disciplina..."> <span class="input-group-btn">
                <button class="btn btn-primary btn-sg" type="button"><i class="fa fa-search" aria-hidden="true"></i></button>
                </span> </div>
            </div>
            <div class="col-md-2 mt-2"></div>
        </div>
        <div class="row">
            <div class="mx-auto"><a href="#" data-toggle="modal" data-target="#AddModal" class="btn btn-success btn-sg pull-right">Inserir Disciplina</a> </div>
        </div>
        <div class="row mt-2">
        <?php    
    $disc = mysqli_query($conn, "SELECT * FROM tb_disciplina WHERE cod_aluno='$matricula'");
    $linha = mysqli_num_rows($disc);
    if($linha > 0){
        
    while($mostra_disc = mysqli_fetch_array($disc)){
    $codigo_disciplina = $mostra_disc['codigo_disciplina']
    ?>
            
                <div class="col-md-4 mx-auto mt-2">
                    <!--Panel-->
                    <div class="card text-center">
                        <div data-toggle="collapse" href="#collapse<?php echo $mostra_disc['codigo_disciplina'];?>" class="card-header elegant-color-dark white-text card-danger z-depth-2">
                            <?php echo $nome = $mostra_disc['nome']; ?>
                        </div>
                        <div id="collapse<?php echo $mostra_disc['codigo_disciplina'];?>" class="card-block card-collapse collapse">
                            <p class="card-text">Professor:
                                <?php echo $professor = $mostra_disc['professor']; ?>
                                    <br> Curso:
                                    <?php echo $curso = $mostra_disc['curso']; ?>
                                        <br> <a class="btn btn-warning btn-sm" href="#" data-toggle="modal" data-target="#editModal">Editar</a> <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#deleteModal">Excluir</a> </p>
                            <div class="card-footer text-center elegant-color-dark white-text "> Horário:
                                <?php echo $hora_ini = $mostra_disc['hora_inicio']; ?> -
                                    <?php echo $hora_fim = $mostra_disc['hora_fim']; ?>
                                        <br> Dia :
                                        <?php echo $dia = $mostra_disc['dia']; ?>
                            </div>
                        </div>
                    </div>
                    <!--/.Panel-->
                </div>
            
            <?php
    }}else{
        echo "Não Existem disciplina Disponiveis";
    }
    ?>
    </div>
    <?php
        include_once 'common/modalDisciplinas.php';
        include_once 'common/footer.php';
    ?>