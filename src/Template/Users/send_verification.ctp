<?php $this->layout = 'bare' ?>
<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <h1 class="text-center login-title"><?= __('Resend the Email Verification') ?></h1>
        <?= $this->element('site_logo'); ?>
        <?= $this->Form->create('Users', [
            'class' => 'form-signin',
            'url' => ['controller' => 'Users', 'action' => 'sendVerification'],
            'id' => 'UserResendVerificationForm',
            'novalidate' => 'novalidate'
        ])?>
        <?= $this->Flash->render(); ?>
        <?= $this->Form->input('email', [
            'label' => 'Email',
            'class' => 'form-control',
            'placeholder' => 'Email Address',
            'required',
            'autofocus'
        ]) ?>
        <?= $this->Form->submit(
            __('Resend Code'), ['class' => 'btn btn-lg btn-primary btn-block'
        ]) ?>
        <span class="clearfix"></span>
        <?= $this->Form->end(); ?>
    </div>
</div>
