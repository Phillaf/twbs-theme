<?php 
    use Permissions\Model\Entity\Role;
    $_user = false;
    if ($this->request->session()->check('Auth.User')) {
        $_user = $this->request->session()->read('Auth.User');
    }
?>

<div class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <?php echo $this->Html->link(
                $this->Html->image(
                    'TwbsTheme.logo.png',
                    [
                        "class" => "img-responsive navbar-img",
                        "alt" => 'GintonicCMS'
                    ]
                ),
                '/',
                ['escape' => false,'class' => ['navbar-brand']]
            );?>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#user-menu">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="user-menu">
            <?php if ($this->request->session()->check('Auth.User')) : ?>
            <ul class="nav navbar-nav">
                <li>
                    <?= $this->Html->link('Posts',
                        [
                            'controller' => 'posts',
                            'plugin' => 'GintonicCMS',
                        ]
                    ) ?>
                </li>
                <li>
                    <?= $this->Html->link('Messages',
                        [
                            'controller' => 'threads',
                            'plugin' => 'GintonicCMS',
                        ]
                    ) ?>
                </li>
            </ul>
            <?php endif; ?>
            <ul class="nav navbar-nav navbar-right">
                <?php if ($_user) : ?>
                <li class="dropdown">
                    <?= $this->Html->link(
                        $_user['username'] .  '<span class="caret"></span>',
                        '#',
                        [
                            'escape'=>false,
                            'class'=>'dropdown-toggle',
                            'data-toggle'=>'dropdown',
                            'role'=>'button',
                            'aria-expanded'=>false
                        ]
                    ) ?>
                    <ul class="dropdown-menu" role="menu">
                        <?php if ($_user['role'] === Role::ADMIN) : ?>
                            <li>
                                <?= $this->Html->link(
                                    __('Administration'),
                                    ['controller'=>'Users', 'action'=>'index', 'prefix' => 'admin']
                                ) ?>
                            </li>
                            <li role="separator" class="divider"></li>
                        <?php endif ?>
                        <li>
                            <?= $this->Html->link(
                                __('Preferences'),
                                ['controller'=>'Users', 'action'=>'edit']
                            ) ?>
                        </li>
                        <?php echo $this->fetch('topMenuActions'); ?>
                        <li>
                            <?= $this->Html->link(
                                __('Sign out'),
                                [
                                    'plugin'=>'Users',
                                    'controller'=>'Users',
                                    'action'=>'signout',
                                    'prefix' => false
                                ]
                            ) ?>
                        </li>
                    </ul>
                </li>
                <?php else : ?>
                    <li class="connect">
                        <a href="/signin">Sign in</a>
                        |
                        <a href="/signup">Sign up</a>
                    </li>
                <?php endif ?>
            </ul>
        </div>
    </div>
</div>
