<style>
    .panel-inspinia {
        background: url(img/4.png) no-repeat;
    }
    .sidebar-collapse div.user-panel {
        height: 50px;
        -webkit-transition: height 0.4s; /* Safari */
        transition: height 0.4s;
    }

    .user-panel {
        height: 100px;
    }
    .user-panel p {
        color: #DFE4ED;
    }
    .user-panel .info a {
        color: #fff !important;
    }

    .sidebar-menu > li.active {
        border-left: 5px solid #1ab394 !important;
    }

    .sidebar-menu > li.active > a > span {
        font-weight: 600;
    }

    .sidebar-menu > li > a > span {
        font-weight: 100;
    }

</style>

<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel panel-inspinia">
            <div class="pull-left image">
                <img src="<?= Yii::getAlias('@web') ?>/img/avatar/avatar.png" class="img-circle" alt="User Image"/>
            </div>
            <div class="info">
                <p>Alexander Pierce</p>

                <a href="#">Online</a>
            </div>
        </div>

        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form> -->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    //['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Dashboard', 'icon' => 'th-large', 'url' => ['site/index'], 'options' => ['class' => 'btn-left-menu']],
                    [
                        'label' => 'PPMP',
                        'icon'  => 'calendar-check-o',
                        'url' => '#',
                        'visible' => !Yii::$app->user->isGuest,
                        'options' => ['class' => 'btn-left-menu-many'],
                        'items' => [
                            ['label' => 'PPMP 2017', 'icon' => 'circle-o', 'url' => ['ppmp/index'], 'options' => ['class' => 'btn-left-menu-child']],
                        ],
                    ],
                    ['label' => 'Tracker', 'icon' => 'list-ul', 'url' => ['pr-tracker/index'], 'visible' => !Yii::$app->user->isGuest, 'options' => ['class' => 'btn-left-menu']],
                    //['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                ],
            ]
        ) ?>

    </section>

</aside>
