<h1>Edição de Colaborador</h1>
<?php
echo $this->Form->create('Collaborator', array('class' => 'form-horizontal', 'type' => 'file'));
$this->Form->inputDefaults(array(
        'div' => 'form-group',
        'class' => 'form-control',
        'after' => '</div>',
        'between' => '<div class="col-sm-8">',
        'label' => array(
            'class' => 'col-sm-2 control-label',
        ),
    )
);
echo $this->Form->input('name');
echo $this->Form->input('email');
echo $this->Form->input('cpf');
echo $this->Form->input('telephone');
echo $this->Form->file('img');
$options = array('1' => 'Ativo', '0' => 'Inativo');
$attributes = array('legend' => 'Status');
echo $this->Form->radio('active', $options, $attributes);
$options = array(
    'label' => 'Salvar alterações',
    'class' => 'btn btn-primary',
    'div' => array(
        'class' => 'text-center',
    )
);
echo $this->Form->end($options);
?>
<script>
    $("#CollaboratorEditForm").validate();
</script>
