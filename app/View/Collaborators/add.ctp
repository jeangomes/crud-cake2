<h1>Cadastrar Colaborador</h1>
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
echo $this->Form->input('telephone', array('placeholder' => '(99) 9999-9999'));
echo $this->Form->file('img');
$options = array(
    'label' => 'Cadastrar',
    'class' => 'btn btn-primary',
    'div' => array(
        'class' => 'text-center',
    )
);
echo $this->Form->end($options);
?>
<script>
    $("#CollaboratorAddForm").validate({
        rules: {
            'data[Collaborator][cpf]': {
                cpfBR: true,
            },
            'data[Collaborator][telephone]': {
                telefoneBR: true,
            }
        }
    });
</script>
