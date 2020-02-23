<h1>Lista de Médicos</h1>

<div class="col-12">
    <div class="text-right">
        <a class="btn btn-primary pull-right" href="?c=medicos&action=create">Cadastrar</a>
    </div>
</div>

<div class="col-12 mt-4">
    <table class="table table-striped table-hover table-dark" id="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">End. Consultório</th>
                <th scope="col" class="text-right">Ações</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($this->model->all() as $r): ?>
            <tr>
                <td><?php echo $r->nome; ?></td>
                <td><?php echo $r->endereco_consultorio; ?></td>
                <td class="text-right">
                    <a  class="btn btn-warning" href="?c=medicos&action=edit&id=<?php echo $r->id; ?>">Editar</a>           
                    <a  class="btn btn-danger" onclick="javascript:return confirm('Você tem certeza que deseja apagar este médico?');" href="?c=medicos&action=destroy&id=<?php echo $r->id; ?>">Apagar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tbody>
    </table>
</div>

<?php include_once("../partials/footer.php") ?>