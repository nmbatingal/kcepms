<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Login';

$fieldOptions1 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='fa fa-user form-control-feedback'></span>"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group has-feedback'],
    'inputTemplate' => "{input}<span class='fa fa-lock form-control-feedback'></span>"
];
?>

<?php
    Modal::begin([
        'id' => 'modal-reset-password',
        'size' => 'modal-md',
        'header' => '<h4>Request Password Reset</h4>',
        'headerOptions' => [
            'class' => 'header-inspinia',
        ],
        'clientOptions' => [
            'backdrop' => 'static', 
            'keyboard' => FALSE,
        ],
        'options' => [
            'tabindex' => false,
        ],
    ]);

    echo "<div id='modal-content'>
            <div style='text-align:center' class='overlay'>
                <i class='fa fa-refresh fa-spin'></i>
            </div>
        </div>";

    Modal::end();
?>

<div class="login-box">

    <!-- <div class="login-logo">
        <a href="#"><b>KC</b>ePMS</a>
    </div> -->

    <?php
        foreach (Yii::$app->session->getAllFlashes() as $message) {

            echo Alert::widget();
        }
    ?>
    
    <div class="login-box-body bg-shadow">
        <p class="login-box-msg">Login to start your session</p>

        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => true]); ?>

        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['placeholder' => $model->getAttributeLabel('username')]) ?>

        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['placeholder' => $model->getAttributeLabel('password')]) ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox() ?>
            </div>
            <div class="col-xs-4">
                <?= Html::submitButton('Login', ['class' => 'btn btn-success btn-block btn-flat', 'name' => 'login-button']) ?>
            </div>
        </div>


        <?php ActiveForm::end(); ?>

        <div class="social-auth-links text-center">
            <hr>
            <?= Html::a('Continue as Guest', ['site/index'], ['class' => 'btn btn-block btn-flat btn-success']) ?>
            <?= Html::button('Login as admin', ['class' => 'btn btn-block btn-flat btn-default', 'onclick' => 'changeUrl(this)' ]) ?>
        </div>
    </div>
    
    <br>
    <?= Html::a('I forgot my password', ['site/request-password-reset'], ['id' => 'lnk-reset-password', 'class' => '']) ?>
    <br>
    <?= Html::a('Register a new account', ['site/signup'], ['id' => '', 'class' => '']) ?>

</div>

<script>
    function changeUrl(thisInput) {
        window.open('/kc-epms/backend/web', '_self');
    }
</script>