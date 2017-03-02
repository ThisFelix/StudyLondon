<!-- Modal de Exclusão -->
<div id="deleteModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Excluir Item</h4> </div>
            <div class="modal-body"> Deseja realmente excluir este item? </div>
            <div class="modal-footer">
                <a href="excluirtrabalho.php?cod_trabalho=<?php echo $cod_trab; ?>&disciplina=<?php echo $disc; ?>">
                    <button class="btn btn-default btn-sm" name="Sim">Sim</button>
                </a>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" name="não">N&atilde;o</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->

<!-- Modal de Adição -->
<div id="AddModal" class="modal fade" data-toggle="validator" role="form">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="inserirtrabalho.php" method="POST" class="inline-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Adicionar Novo Trabalho</h4> </div>
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label>Tema: </label>
                        <input type="text" name="tema" placeholder="Tema do Trabalho" class="form-control" required>
                        <div class="help-block with-errors"></div>
                    </div>
                    <div class="form-group" requ>
                        <label>Tipo: </label>
                        <input type="text" name="tipo" placeholder="Tipo do Trabalho" class="form-control" data-error="Por favor, informe o tipo do trabalho." required> </div>
                    <div class="form-group">
                        <label>Disciplina: </label>
                        <select class="form-control" name="disciplina">
                            <option value="">...</option>
                            <option value="Estudo">Estudo</option>
                            <?php
                        $query = "SELECT * FROM tb_disciplina WHERE cod_aluno = '$matricula'";
                        $query = mysqli_query($conn, $query);
                        
                        while($mostra = mysqli_fetch_array($query)){
                        $value = $mostra['nome'];
                            
                        echo "<option value='$value'>$value</option>";  
                        }
                        ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Data da Entrega: </label>
                        <input type="date" name="data" class="form-control" placeholder="00/00/00" data-error="Por favor, informe a data de entrega do trabalho." required> </div>
                    <div class="form-group">
                        <label>Data Entregue: </label>
                        <input type="date" name="data_entregue" class="form-control" placeholder="00/00/00"> </div>
                    <div class="form-group">
                        <label>Situacao: </label>
                        <input type="text" name="situacao" class="form-control"> </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-sm"> Salvar </button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="sucessoModal" class="modal fade" data-toggle="validator" role="form">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modalLabel">Edição de Trabalho</h4> </div>
            <div id="sucessomodalbody" class="modal-body">
                <h2> Dados Alterados Com Sucesso </h2>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">OK</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Modal de Edição -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form action="editaTrabalho.php" method="POST" class="inline-form">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="modalLabel">Editar Trabalho</h4> </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Tema: </label>
                            
                            <input type="text" name="tema" class="form-control" value="<?php echo $tema; ?>"> </div>
                        <div class="form-group">
                            <label>Tipo: </label>
                            <input type="text" name="tipo" class="form-control" value="<?php echo $tipo; ?>"> </div>
                        <div class="form-group">
                            <label>Disciplina: </label>
                            <select class="form-control" name="disciplina" placeholder="selecione..">
                                <option value="">...</option>
                                <option value="Estudo">Estudo</option>
                                <?php
                        $query = "SELECT * FROM tb_disciplina WHERE cod_aluno = '$matricula'";
                        $query = mysqli_query($conn, $query);
                        
                        while($mostra = mysqli_fetch_array($query)){
                        $value = $mostra['nome'];
                            
                        echo "<option value='$value'>$value</option>";  
                        }
                        ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Data Entrega: </label>
                            <input type="date" name="data_entrega" class="form-control" value="<?php echo $data_entrega; ?>"> </div>
                        <div class="form-group">
                            <label>Data Entregue: </label>
                            <input type="date" name="data_entregue" class="form-control" value="<?php echo $data_entregue; ?>"> </div>
                        <div class="form-group">
                            <label>Situacao: </label>
                            <input type="text" name="situacao" class="form-control" value="<?php echo $situacao; ?>"> </div>
                        <input type="hidden" name="codigo" value="<?php echo $cod_trab; ?>"> </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary btn-sm" onclick="cadastrar()">Salvar</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>