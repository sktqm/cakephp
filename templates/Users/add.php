<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <?php
                    echo $this->Form->control('firstname');
                    echo $this->Form->control('lastname');
                    echo $this->Form->control('email');
                    echo $this->Form->control('phonenumber');
                    echo $this->Form->control('password');
                echo "<legend>Gender<legend>";
                $gender = "male";
                $option = array(
                    'male' => 'Male',
                    'female' => 'Female',
                    'other' => 'other'
                );
                $attributes=array(
                    'male'=>false,'value'=>$gender);
                 echo $this->Form->radio('type', $option, $attributes);
                    // echo $this->Form->control('user_status');
                    // echo $this->Form->control('date');
                    // echo $this->Form->control('reset');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
