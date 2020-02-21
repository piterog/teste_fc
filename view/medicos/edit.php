<h1 class="page-header">
    <?php echo $model->id != null ? $model->nome : 'Cadastrar novo'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=medicos">Médico</a></li>
  <li class="active"><?php echo $model->id != null ? $model->nome : 'Cadastrar Novo'; ?></li>
</ol>

<form id="form-medico" action="?c=medicos&action=createOrUpdate" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $model->id; ?>" />
      <div class="form-group">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $model->nome; ?>" class="form-control" placeholder="Digite o nome do médico" required>
    </div>
    
    <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $model->email; ?>" class="form-control" placeholder="Digite o email do médico" required>
    </div>
    
    <div class="form-group">
        <label>Senha</label>
        <input type="password" name="senha" value="" class="form-control" placeholder="Digite a senha do médico">
    </div>
    
    <div class="form-group">
        <label>Endereço do Consultório</label>
        <input type="text" name="endereco_consultorio" value="<?php echo $model->endereco_consultorio; ?>" class="form-control" placeholder="Digite o endereço do consultório" required>
    </div>     
    
    <hr />
    
    <div class="text-right">
        <button class="btn btn-primary">Salvar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alumno").submit(function(){
            return $(this).validate();
        });
    })
</script>