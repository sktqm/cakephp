<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<?= $this->Form->create($user) ?>
<?= $this->Html->script('script') ?>
<!-- <?= $this->Html->style([
    'background' => "url('/img/961.jpg')",
    'border-bottom' => '1px solid #000',
    'padding' => '10px'
]);?> -->

<div class="container">
    <div class="row">
        <aside class="column">
            <div class="" style="text-align:center;">
                <h1 class="heading mt-5"><?= __('Please LOG IN  Here') ?></h1>
            </div>
        </aside>
        <div class="container mb-5">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center
                    align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card bg-dark text-white" style="border-radius:
                        1rem;">
              <div class="card-body p-5 text-center">

                <!-- <div class="mb-md-5 mt-md-4 pb-5"> -->

                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-5">Please enter your
                    login and password!</p>
                    <div class="form-outline form-white mb-4">
                    <span class="error-message" id="email-error"></span>
                            <?= $this->Form->control('email', ['required' => false]) ?>
            
                  </div>

                  <div class="form-outline form-white mb-4">
                  <span class="error-message" id="password-error"></span>
                            <?= $this->Form->control('password', ['required' => false]) ?>
                  <!-- </div> -->
                <div class="text-center">
                    <a href=""> <?= $this->Html->link(__('Forgot Password?'), ['action' => 'forgotpassword'], ['class' => 'nav-link active']) ?></a>
                </div>
                  <div class="text-center">
                    <a href=""> <?= $this->Html->link(__('Click Here!If Not Registerd'), ['action' => 'register'], ['class' => 'nav-link active']) ?></a>
                </div>
                <?= $this->Form->button(__('Submit')) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>