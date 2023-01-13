

<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
// $this->Breadcrumbs->add(
//     'Login',
//     ['controller' => 'Users', 'action' => 'login']
// );
?>
<div class="users index content">
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('firstname') ?></th>
                    <th><?= $this->Paginator->sort('lastname') ?></th>
                    <th><?= $this->Paginator->sort('email') ?></th>
                    <th><?= $this->Paginator->sort('phonenumber') ?></th>
                    <th><?= $this->Paginator->sort('gender') ?></th>
                    <th><?= $this->Paginator->sort('file') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>

                <?php $i = 1 ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= h($user->firstname) ?></td>
                        <td><?= h($user->lastname) ?></td>
                        <td><?= h($user->email) ?></td>
                        <td><?= h($user->phonenumber) ?></td>
                        <td><?= h($user->gender) ?></td>
                        <td><?= $this->Html->image(h($user->file), array('width'=>'60px')) ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__(''), ['action' => 'editdata', $user->id], ['class' => 'fa-solid fa-pen-to-square']) ?>
                            <?= $this->Html->link(__(''), ['action' => 'myview', $user->id], ['class' => 'fa-solid fa-eye']) ?>
                            <?= $this->Form->postLink(__(''), ['action' => 'deletedata', $user->id], ['class' => 'fa-solid fa-trash', 'confirm' => __('Are you sure to delete # {0}?', $user->id)]) ?>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>