<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>

<?= $this->element('flash/header') ?>
    <?= $this->element('flash/navbar') ?>
    <main class="main">
        <div class="container-fluid">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>
    <?= $this->element('flash/footer') ?>
    



