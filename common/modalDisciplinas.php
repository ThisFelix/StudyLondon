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
                <a href="excluirDisciplina.php?codigo_disciplina=<?php echo $codigo_disciplina; ?>&nome=<?php echo $nome; ?>">
                    <button class="btn btn-default btn-sm" name="Sim">Sim</button>
                </a>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" name="não">N&atilde;o</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Modal de Edição -->
<div id="editModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="editaDisciplina.php" method="POST" class="inline-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Editar Trabalho</h4> </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nome: </label>
                        <input type="text" name="nome" class="form-control" value="<?php echo $nome; ?>"> </div>
                    <div class="form-group">
                        <label>Professor: </label>
                        <input type="text" name="tipo" class="form-control" value="<?php echo $professor; ?>"> </div>
                    <div class="form-group">
                        <label>Curso: </label>
                        <input type="text" name="disciplina" class="form-control" value="<?php echo $curso; ?>"> </div>
                    <div class="form-group">
                        <label>Horario de Inicio: </label>
                        <input type="time" name="horaInicio" class="form-control" value="<?php echo $hora_ini; ?>"> </div>
                    <div class="form-group">
                        <label>Horario final: </label>
                        <input type="time" name="horaFim" class="form-control" value="<?php echo $hora_fim; ?>"> </div>
                    <div class="form-group">
                        <label>Dia da Semana: </label>
                        <select name="dia" class="form-control" selected="<?php echo $dia ?>">
                            <option value="Segunda-Feira">Segunda-Feira</option>
                            <option value="Terça-Feira">Terça-Feira</option>
                            <option value="Quarta-Feira">Quarta-Feira</option>
                            <option value="Quinta-Feira">Quinta-Feira</option>
                            <option value="Sexta-Feira">Sexta-Feira</option>
                            <option value="Sábado">Sábado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="cadastrar()">Salvar</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<!-- Modal de Adição -->
<div id="AddModal" class="modal fade" data-toggle="validator" role="form">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <form action="insereDisciplina.php" method="POST" class="inline-form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modalLabel">Adicionar Novo Trabalho</h4> 
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nome: </label>
                        <input type="text" name="nome" class="form-control" pattern="[a-zA-Z]+" maxlength="50" placeholder="Nome da Disciplina"> </div>
                    <div class="form-group">
                        <label>Professor: </label>
                        <input type="text" name="professor" class="form-control" pattern="[a-z\s]+$" maxlength="50" placeholder="Professor da Disciplina"> </div>
                    <div class="form-group">
                        <label>Curso: </label>
                        <input type="text" name="curso" class="form-control" pattern="[a-zA-Z]+" maxlength="50" placeholder="Curso da Disciplina"> </div>
                    <div class="form-group">
                        <label>Horario de Inicio: </label>
                        <input type="time" name="horaIni" class="form-control" pattern="[0-9]{2}:[0-9]{2} [0-9]{2}$" placeholder="Horario Inicio da Disciplina"> </div>
                    <div class="form-group">
                        <label>Horario final: </label>
                        <input type="time" name="horaFim" class="form-control" pattern="[0-9]{2}:[0-9]{2} [0-9]{2}$" placeholder="Horario Final da Disciplina"> </div>
                    <div class="form-group">
                        <label>Dia da Semana: </label>
                        <select name="dia" class="form-control">
                            <option value="Segunda-Feira">Segunda-Feira</option>
                            <option value="Terça-Feira">Terça-Feira</option>
                            <option value="Quarta-Feira">Quarta-Feira</option>
                            <option value="Quinta-Feira">Quinta-Feira</option>
                            <option value="Sexta-Feira">Sexta-Feira</option>
                            <option value="Sábado">Sábado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success btn-sm"> Salvar </button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
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