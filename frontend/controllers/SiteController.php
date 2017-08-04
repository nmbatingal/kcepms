<?php
namespace frontend\controllers;

use Yii;
use yii\helpers\Url;

use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

use common\models\TblLogs;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        //return $this->render('index');

        if ( Yii::$app->request->isAjax ) {

            $html =  $this->renderAjax('index');
            Yii::$app->response->format = Response::FORMAT_JSON;
            return [
                'html'  => $html,
                'url'   => Url::toRoute(['index']),
                'title' => 'Dashboard',
            ];

        } else {
            return $this->render('index');
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {

            return $this->goHome();
        }

        $model = new LoginForm();
        $log   = new TblLogs();

        if ($model->load(Yii::$app->request->post())) {

            if ( $model->login() ) {

                $log->encoder  = Yii::$app->user->identity->id;
                $log->action   = 4;
                $log->details  = "has logged in.";
                $log->log_date = date("Y-m-d H:i:s");

                if ( $log->save() ) {
                    return $this->goHome();
                }
            } else {
                return $this->render('login', [
                    'model' => $model,
                ]);
            }
            
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        $model = new TblLogs();
        $user  = Yii::$app->user->identity->id;

        if ( Yii::$app->user->logout() ) {
            $model->encoder  = $user;
            $model->action   = 4;
            $model->details  = "logged out.";
            $model->log_date = date("Y-m-d H:i:s");

            if ($model->save()) {

                //return $this->goHome();
            }
        }

        //$this->redirect(Yii::$app->urlManager->createUrl(['site/login']));
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            
            if ($user = $model->signup()) {

                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }

            }
        }
        
        $this->layout = 'main-login';
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model  = new PasswordResetRequestForm();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {

                //Yii::$app->session->setFlash('success', 'Check your email for further instructions.');
                //return $this->goHome();
                //return $this->redirect(['login']);

                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'result'  => true,
                ];

            } else {
                //Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
                Yii::$app->response->format = Response::FORMAT_JSON;
                return [
                    'result'  => false,
                ];
            }
        }

        return $this->renderAjax('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            //return $this->goHome();
            return $this->redirect(['login']);
            //Yii::$app->user->login($model);
        }

        $this->layout = 'main-login';
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
