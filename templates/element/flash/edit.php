<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */

use function PHPSTORM_META\type;

// $this->Breadcrumbs->add(
//     'Login',
//     ['controller' => 'Users', 'action' => 'login']
// );
// $this->Breadcrumbs->add(
//     'List',
//     ['controller' => 'Users', 'action' => 'listingg']
// );
?>
<div class="container">
    <?= $this->Form->create($user) ?>
    <legend><?= __('Edit User') ?></legend>

    <?= $this->Html->link(__('Back'), ['action' => 'list'], ['class' => 'nav-link active']) ?>
    <h1 class="form-title">Registration form</h1>
    <div class="row">
        <div class="col-md-6">
            <?= $this->Form->control('firstname', ['required' => false]) ?>
            <span class="error-message" id="firstname-error"></span>
        </div>
        <div class="col-md-6">

            <?= $this->Form->control('lastname', ['required' => false]) ?>
            <span class="error-message" id="lastname-error"></span>
        </div>
        <div class="col-md-6">

            <?= $this->Form->control('email', ['required' => false]) ?>
            <span class="error-message" id="email-error"></span>
        </div>
        <div class="col-md-6">

            <?= $this->Form->control('phonenumber', ['required' => false]) ?>
            <span class="error-message" id="phonenumber-error"></span>
        </div>

        <div class="col-md-6">
            <?= $this->Form->control('password', ['required' => false]) ?>
            <span class="error-message" id="password-error"></span>
        </div>
        <div class="col-md-6">
            <?= $this->Form->control('confirmpassword', ['type' => 'password', 'required' => false]) ?>
            <span class="error-message" id="confirmpassword-error"></span>
        </div>
        <div class="col-md-6">
            <label fro="gender">Gender</label>
            <div class="gender-category">
                <?= $this->Form->radio(
                    'gender',
                    ['male' => 'male', 'female' => 'female', 'other' => 'other'],
                    ['required' => false]
                    ) ?>
            <span class="error-message" id="gender-error"></span>
            </div>
        </div>
    </div>
</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>