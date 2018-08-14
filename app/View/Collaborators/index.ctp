<h1>Colaboradores</h1>

<?php
echo $this->Form->create('Collaborator', array('class' => 'form-horizontal', 'type' => 'get'));
$options = array('1' => 'Ativo', '0' => 'Inativo');
$attributes = array('legend' => 'Status');
echo $this->Form->radio('active', $options, $attributes);
$options = array(
    'label' => 'Filtrar',
    'class' => 'btn btn-primary',
    'div' => array(
        'class' => 'text-center',
    )
);
echo $this->Form->end($options);
?>
<br>
<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>CPF</th>
        <th>Telefone</th>
        <th>Status</th>
        <th>Ações</th>
    </tr>
    <?php foreach ($collaborators as $collaborator): ?>
        <tr>
            <td><?php echo $collaborator['Collaborator']['id']; ?></td>
            <td>
                <?php echo $collaborator['Collaborator']['name']; ?>
                <?php
                if (!is_null($collaborator['Collaborator']['img'])) {
                    ?>
                    <?php echo $this->Html->image($collaborator['Collaborator']['img'], array('width' => '50px')); ?>
                    <?php
                }
                ?>
            </td>
            <td><?php echo $collaborator['Collaborator']['email']; ?></td>
            <td><?php echo $collaborator['Collaborator']['cpf']; ?></td>
            <td><?php echo $collaborator['Collaborator']['telephone']; ?></td>
            <td><?php echo $collaborator['Collaborator']['active']; ?></td>
            <td>
                <?php echo $this->Html->link('Editar',
                    array('controller' => 'collaborators', 'action' => 'edit', $collaborator['Collaborator']['id'])); ?>
                <br>
                <?php
                echo $this->Form->postLink(
                    'Delete',
                    array('action' => 'delete', $collaborator['Collaborator']['id']),
                    array('confirm' => 'Você tem certeza?')
                );
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    <?php unset($collaborator); ?>
</table>