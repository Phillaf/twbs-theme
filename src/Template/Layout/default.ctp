<?php
use Cake\Core\Configure;
use Cake\I18n\I18n;

$languages = Configure::read('Languages');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?= $this->Html->meta('icon') ?>

    <title>
        <?= $this->fetch('title') ?>
    </title>

    <?= $this->Html->css('TwbsTheme.twbs-default') ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?= $this->element('top_menu') ?>
<?= $this->Flash->render(); ?>

<div class="container">
    <?= $this->fetch('content'); ?>
</div>

<footer class="footer">
    <div class="container">
        <div class="pull-left">
            <p class="text-muted">Powered by
                <a href="https://github.com/gintonicweb/GintonicCMS">GintonicCMS</a>
                from
                <a href="http://gintonicweb.com">Gintonic Web</a>
            </p>
        </div>
        <?php if ($languages !== false) : ?>
            <div class="pull-right">
                <div class="btn-group dropup">
                    <i class="fa fa-globe text-muted"></i>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= __('Languages') ?>
                    </a>
                    <ul class="text-muted dropdown-menu">
                        <?php foreach ($languages as $value => $language) : ?>
                            <li<?= $value == I18n::locale() ? ' class="active"' : '' ?>>
                                <?= $this->Html->link(
                                    $language,
                                    ['lang' => $value]
                                ) ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        <?php endif ?>
    </div>
</footer>
<?= $this->Require->module('jquery'); ?>
<?= $this->Require->module('bootstrap'); ?>
<?= $this->Require->load(['TwbsTheme.config', 'Images.config']); ?>
</body>
</html>