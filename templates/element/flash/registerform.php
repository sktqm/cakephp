<?= $this->Form->create($user) ?>
 <!-- <?= $this->Html->image('backg.jpeg', ['alt' => 'background']);?>  -->
<div class="container mt-6">
<h1 class="heading mt-3 text-center"><?= __('Please Register here') ?></h1>
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
        <div class="col-md-6 ">
            <label for="gender">Gender</label>
            <div class="gender-category ">
                <?= $this->Form-> radio(
                    'gender',
                    ['male' => ' male ', 'female' => ' female  ','other' => ' other '],
                    ['required' => false]
                    ) ?>
                    <span class="error-message" id="gender-error"></span>
            </div>
            <?php
            if ($this->Form->isFieldError('gender')) {
                echo $this->Form->error('gender', '!!!Please chooose your Gender');
            }
            ?> 
            <span class='log'>
                <?= $this->Form->button(__('Submit')) ?>
            </span>
            <hr>
            <span class="log">
                already register? <?= $this->Html->link(__('click here to login'), ['action' => 'login'], ['class' => 'side-nav-item']) ?>
            </span>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>