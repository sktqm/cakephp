<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- <li>
                        <a class="navbar-brand" href="">
                          $this->Html->link(__('home'), ['action' => 'home'], ['class' => 'nav-link active']) -->
                <!-- </a>
                    </li>  -->

                <?php
                $session = $this->request->getSession();
                if ($session->read('email') != null) {
                    ?>
                    <!-- 
                            <li class="nav-item">
                                <a class="navbar-brand" href="">
                                    <?= $this->Html->link(__('List'), ['action' => 'list'], ['class' => 'nav-link active']) ?>
                                </a> -->
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="">
                            <?= $this->Html->link(__('logout'), ['action' => 'logout'], ['class' => 'nav-link active']) ?>
                        </a>
                    </li>

                <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="navbar-brand" href="">
                            <?= $this->Html->link(__('login'), ['action' => 'login'], ['class' => 'nav-link active']) ?>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="navbar-brand" href="">
                            <?= $this->Html->link(__('register'), ['action' => 'register'], ['class' => 'nav-link active']) ?>
                        </a>
                    </li>

                <?php
                }
                ?>

            </ul>
        </div>
    </div>
</nav>