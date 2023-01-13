<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="container">
        <?= $this->Form->create($user) ?> 
        <div class="" style="text-align:center;">
            <h1 class="heading mt-5">
                <?= __('Reset Password Here') ?>
            </h1>

            <div class="form-outline">
                <span class="error-message" id="email-error"></span>
                <?= $this->Form->control('email', ['required' => false]) ?>

                    <?= $this->Form->button(__('Submit')) ?>
                    <?= $this->Form->end() ?>
                    <div class="text-center">
                        <a href="">
                            <?= $this->Html->link(__('Register Here!'), ['action' => 'register'], ['class' => 'nav-link active']) ?>
                        </a>
                    
                    <div class="text-center">
                        <a href="">
                            <?= $this->Html->link(__('IF Already have account?Login here!'), ['action' => 'login'], ['class' => 'nav-link active']) ?>
                        </a>
                    </div>
            </div>
        </div>
</div>