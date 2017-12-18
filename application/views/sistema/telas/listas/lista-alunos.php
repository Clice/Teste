<div class="app-content content container-fluid">
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">        
                        <div class="card-header">
                            <div class="content-header row">
                                <div class="content-header-left col-md-6 col-xs-12 mb-1">
                                    <h2 class="content-header-title">Lista de Alunos</h2>
                                </div>
                            </div>
                            <input type="hidden" name="idAluno" id="idAluno">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Buscar aluno" 
                                                   name="pesquisarAluno" id="pesquisarAluno">
                                            <span class="input-group-btn">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="icon-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div style="float: right;">
                                        <ul class="pl-0 list-unstyled right">
                                            <li class="mb-1">
                                                <button type="button" class="btn btn-secondary btn-block" onclick="window.location.reload()"><i class="icon-refresh"></i> Atualizar</button>
                                            </li>                                            
                                        </ul>
                                    </div>
                                    <div style="float: right; margin-right: 10px;">
                                        <ul class="pl-0 list-unstyled right">
                                            <li class="mb-1">
                                                <button type="button" class="btn btn-primary btn-block" onclick="window.location.href = '<?php echo base_url('cadastrar-editar-aluno'); ?>'">
                                                    <i class="icon-plus2"></i> Novo Aluno</button>
                                            </li>                                            
                                        </ul>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="card-block">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#ativos" 
                                           aria-expanded="true">Ativos</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#bloqueados" 
                                           aria-expanded="false">Bloqueados</a>
                                    </li>
                                </ul>
                                <div class="tab-content px-1 pt-1">
                                    <div role="tabpanel" class="tab-pane active" id="ativos" aria-expanded="true" aria-labelledby="base-tab1">
                                        <div class="content-body">
                                            <div class="row">
                                                <div class="card">
                                                    <div class="card-body collapse in">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nome</th>
                                                                        <th>Telefone</th>
                                                                        <th>Endereço</th>
                                                                        <th style="text-align: center">Data do Pagamento</th>
                                                                        <th style="text-align: center">Opções</th>
                                                                        <th class="col-lg-1 text-center" style="text-align: center">Bloqueado</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($alunosAtivos as $alunoAtivo) { ?>   
                                                                        <tr>
                                                                            <td><?php echo $alunoAtivo->nomeAluno; ?></td>
                                                                            <td><?php echo $alunoAtivo->telefoneAluno; ?></td>
                                                                            <td><?php echo $alunoAtivo->enderecoAluno; ?></td>
                                                                            <td style="text-align: center"><?php echo $alunoAtivo->diaPagamentoAluno; ?></td>
                                                                            <td style="text-align: center;">
                                                                                <button type="button" class="btn mb-1 btn-success btn-sm" 
                                                                                        onclick="window.location.href = '<?php echo base_url('perfil-alunos'); ?>'"><i class="icon-eye"></i> Ver</button>
                                                                                <button type="button" class="btn mb-1 btn-warning btn-sm" 
                                                                                        onclick="window.location.href = '<?php echo base_url('lista-alunos'); ?>'"><i class="icon-edit"></i> Editar</button>
                                                                                <button type="button" class="btn mb-1 btn-danger btn-sm" 
                                                                                        onclick="modalExcluirAluno(<?php echo $alunoAtivo->idAluno; ?>);"><i class="icon-trash-o"></i> Excluir</button>
                                                                            </td>
                                                                            <td style="text-align: center;" class="">
                                                                                <input type="checkbox" name="" onchange="modalDesBloquearAluno(this, <?php echo $alunoAtivo->idAluno; ?>, true);">
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?> 
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="bloqueados" aria-labelledby="base-tab2">
                                        <div class="content-body">
                                            <div class="row">
                                                <div class="card">
                                                    <div class="card-body collapse in">
                                                        <div class="table-responsive">
                                                            <table class="table table-hover mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Nome</th>
                                                                        <th>Telefone</th>
                                                                        <th>Endereço</th>
                                                                        <th style="text-align: center">Data do Pagamento</th>
                                                                        <th style="text-align: center">Opções</th>
                                                                        <th class="col-lg-1 text-center" style="text-align: center">Bloqueado</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php foreach ($alunosBloqueados as $alunoBloqueado) { ?>   
                                                                        <tr>
                                                                            <td><?php echo $alunoBloqueado->nomeAluno; ?></td>
                                                                            <td><?php echo $alunoBloqueado->telefoneAluno; ?></td>
                                                                            <td><?php echo $alunoBloqueado->enderecoAluno; ?></td>
                                                                            <td style="text-align: center"><?php echo $alunoBloqueado->diaPagamentoAluno; ?></td>                                                                            
                                                                            <td style="text-align: center;">
                                                                                <button type="button" class="btn mb-1 btn-success btn-sm" 
                                                                                        onclick="window.location.href = '<?php echo base_url('perfil-alunos'); ?>'"><i class="icon-eye"></i> Ver</button>
                                                                                <button type="button" class="btn mb-1 btn-warning btn-sm" 
                                                                                        onclick="window.location.href = '<?php echo base_url('lista-alunos'); ?>'"><i class="icon-edit"></i> Editar</button>
                                                                                <button type="button" class="btn mb-1 btn-danger btn-sm" 
                                                                                        onclick="modalExcluirAluno(<?php echo $alunoBloqueado->idAluno; ?>);"><i class="icon-trash-o"></i> Excluir</button>
                                                                            </td>
                                                                            <td style="text-align: center;" class="">
                                                                                <input type="checkbox" name="" checked="" onchange="modalDesBloquearAluno(this, <?php echo $alunoBloqueado->idAluno; ?>, false);">
                                                                            </td>
                                                                        </tr>
                                                                    <?php } ?> 
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL - DESEJA EXCLUIR O ALUNO? -->
<div class="modal fade text-xs-left" id="excluir-aluno" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center">Deseja excluir o aluno?</h4>
                <div class="modal-footer">                
                    <button type="button" class="btn btn-primary" onclick="excluirAluno();">Sim</button>
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL - ALUNO EXCLUÍDO COM SUCESSO -->
<div class="modal fade text-xs-left" data-backdrop="static" id="excluir-sucesso-aluno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" 
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="modal-title text-xs-center">Aluno excluído com sucesso</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = '<?php echo base_url('lista-alunos'); ?>'">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL - ERRO AO EXCLUIR O ALUNO -->
<div class="modal fade text-xs-left" data-backdrop="static" id="excluir-erro-aluno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" 
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="modal-title text-xs-center">Erro ao excluir o aluno</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL - DESEJA BLOQUEAR O ALUNO? -->
<div class="modal fade text-xs-left" id="bloquear-aluno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center">Deseja bloquear o aluno?</h4>
                <div class="modal-footer">                
                    <button type="button" class="btn btn-primary" id="bloqueia-aluno">Sim</button>
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal" id="nao-bloqueia-aluno">Não</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL - ALUNO BLOQUEADO COM SUCESSO -->
<div class="modal fade text-xs-left" data-backdrop="static" id="bloquear-sucesso-aluno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" 
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="modal-title text-xs-center">Aluno bloqueado com sucesso</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = '<?php echo base_url('lista-alunos'); ?>'">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL - ERRO AO BLOQUEAR O ALUNO -->
<div class="modal fade text-xs-left" data-backdrop="static" id="bloquear-erro-aluno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" 
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="modal-title text-xs-center">Erro ao bloquear o aluno</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = '<?php echo base_url('lista-alunos'); ?>'">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL - DESEJA DESBLOQUEAR O ALUNO? -->
<div class="modal fade text-xs-left" id="desbloquear-aluno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-xs-center">Deseja desbloquear o aluno?</h4>
                <div class="modal-footer">                
                    <button type="button" class="btn btn-primary" id="desbloqueia-aluno">Sim</button>
                    <button type="button" class="btn grey btn-secondary" data-dismiss="modal" id="nao-desbloqueia-aluno">Não</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL - ALUNO DESBLOQUEADO COM SUCESSO -->
<div class="modal fade text-xs-left" data-backdrop="static" id="desbloquear-sucesso-aluno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" 
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="modal-title text-xs-center">Aluno desbloqueado com sucesso</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = '<?php echo base_url('lista-alunos'); ?>'">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- MODAL - ERRO AO DESBLOQUEAR O ALUNO -->
<div class="modal fade text-xs-left" data-backdrop="static" id="desbloquear-erro-aluno" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" 
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="modal-title text-xs-center">Erro ao desbloquear o aluno</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="window.location.href = '<?php echo base_url('lista-alunos'); ?>'">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- FUNÇÕES EM JAVASCRIPT -->
<script type="text/javascript">
    function excluirAluno() {
        var dados = "idAluno=" + $('#idAluno').val();
        $.ajax({
            url: "<?php echo base_url('sistema/AlunoController/cExcluirAluno'); ?>",
            type: "POST",
            data: dados,
            dataType: 'json',
            success: function (data) {
                $('#excluir-aluno').modal('hide');
                if (data.success) {
                    $('#excluir-sucesso-aluno').modal('show');
                } else {
                    $('#excluir-erro-aluno').modal('show');
                }
            },
            error: function (request, status, error) {
                alert("Erro: " + request.responseText);
            }
        });
    }

    function bloquearAluno(dados) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('sistema/AlunoController/cBloquearAluno'); ?>",
            dataType: 'json',
            data: dados,
            success: function (data) {
                $('#bloquear-aluno').modal("hide");
                if (data.success) {
                    $('#bloquear-sucesso-aluno').modal("show");
                } else {
                    $('#bloquear-erro-aluno').modal("show");
                }
            },
            error: function (request, status, error) {
                alert("Erro: " + request.responseText);
            }
        });
    }

    function desbloquearAluno(dados) {
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url('sistema/AlunoController/cDesbloquearAluno'); ?>",
            dataType: 'json',
            data: dados,
            success: function (data) {
                $('#desbloquear-aluno').modal("hide");
                if (data.success) {
                    $('#desbloquear-sucesso-aluno').modal("show");
                } else {
                    $('#desbloquear-erro-aluno').modal("show");
                }
            },
            error: function (request, status, error) {
                alert("Erro: " + request.responseText);
            }
        });
    }
</script>