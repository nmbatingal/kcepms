<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <?php

                    $user = Yii::$app->user->identity;

                    if ( Yii::$app->user->isGuest ) {
                        echo '<p>Guest</p>';
                    } else {
                        echo '
                            <p>'.$user->firstname . ' ' . $user->mi[0] .'. ' . $user->lastname.'</p>

                            <a href="#">'. $user->position_abr .'</a>';
                    }
                ?>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Menu Admin', 'options' => ['class' => 'header']],
                    ['label' => 'Home', 'icon' => 'home', 'url' => ['/site/index']],
                    ['label' => 'Trackers', 'icon' => 'list-ul', 'url' => ['/pr-tracker/index']],
                    ['label' => 'Users', 'icon' => 'user-circle', 'url' => ['/user/index']],
                    ['label' => 'Logs', 'icon' => 'file-text', 'url' => ['/tbl-logs/index']],
                ],
            ]
        ) ?>

    </section>

</aside>
