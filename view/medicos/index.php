<h2>Index Médicos</h2>

<table>
<?php foreach($this->model->all() as $r): ?>
    <tr>
        <td><?php echo $r->nome; ?></td>
        <td><?php echo $r->email; ?></td>
        <td>
            <a  class="btn btn-warning" href="?c=medicos&action=edit&id=<?php echo $r->id; ?>">Editar</a>
        </td>
        <td>
            <a  class="btn btn-danger" onclick="javascript:return confirm('Você tem certeza que deseja apagar este médico?');" href="?c=medicos&action=destroy&id=<?php echo $r->id; ?>">Apagar</a>
        </td>
    </tr>
<?php endforeach; ?>
</table>