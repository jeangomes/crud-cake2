<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CRUD para processo seletivo');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
    <?php echo $this->Html->charset(); ?>
    <title>
        <?php echo $cakeDescription ?>:
        <?php echo $this->fetch('title'); ?>
    </title>
    <?php
    echo $this->Html->meta('icon');

    echo $this->Html->css('bootstrap.min');
    ?>
    <script
            src="https://code.jquery.com/jquery-3.1.1.min.js"
            integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
            crossorigin="anonymous"></script>
    <?php
    echo $this->Html->script('jquery-validation-1.17.0/dist/jquery.validate');
    echo $this->Html->script('jquery-validation-1.17.0/dist/additional-methods');
    echo $this->Html->script('jquery-validation-1.17.0/dist/localization/messages_pt_BR');

    echo $this->fetch('meta');
    echo $this->fetch('css');
    echo $this->fetch('script');
    ?>
</head>
<body>
<div id="container">
    <div id="header">
        <h1><?php echo $this->Html->link($cakeDescription, '/'); ?></h1>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Crud</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li>
                            <?php echo $this->Html->link('Cadastrar Colaborador',
                                array('controller' => 'collaborators', 'action' => 'add')); ?>
                        </li>
                        <li>
                            <?php echo $this->Html->link('Listar Colaborador',
                                array('controller' => 'collaborators', 'action' => 'index')); ?>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>
    </div>
    <div id="content" class="container">

        <?php echo $this->Flash->render(); ?>

        <?php echo $this->fetch('content'); ?>
    </div>
    <div id="footer">
        <?php echo $this->Html->link(
            $this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
            'https://cakephp.org/',
            array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
        );
        ?>
        <p>
            <?php echo $cakeVersion; ?>
        </p>
    </div>
</div>
<?php echo $this->element('sql_dump'); ?>
</body>
</html>
