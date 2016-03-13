<div class="row">
    <div class="col-md-8">
        <h2>New message</h2>
        <hr>
        <?= $this->Form->create() ?>
        <?= $this->Form->input('users', [
            'data-selectize' => 'username',
            'data-url' => '/api/users.json',
            'data-url' => '/api/users.json',
        ]) ?>
        <?= $this->Form->input('thread.title') ?>
        <?= $this->Form->input('message.body', ['type' => 'textarea']) ?>
        <?= $this->Form->submit('Send', ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->end() ?>
    </div>
    <div class="col-md-4">
        <h2>Conversations</h2>
        <hr>
        <div id="summary"></div>
    </div>
</div>
<?php $this->Require->module('utils/selectize') ?>
<?php $this->Require->module('chat/loadSummary') ?>
