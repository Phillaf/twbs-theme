<div class="row">
    <h1>Preferences</h1>
    <?= $this->Form->create($user) ?>
    <?= $this->Form->input('username', ['label' => 'Username']) ?>
    <?= $this->Form->input('email', ['label' => 'Email']) ?>
    <?= $this->Form->input('pwd', [
        'label' => 'Password',
        'type' => 'password',
        'default' => 'dummy'
    ]) ?>
    <?= $this->Form->submit('Save', [
        'div' => false,
        'class' => 'btn btn-primary'
    ]) ?>
</div>
<?= $this->Form->end() ?>
