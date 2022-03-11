<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap4\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;
$this->title = 'Connexion';
?>
<div class="site-login">
    <!--<div class="mt-5 offset-lg-3 col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>
        <p>Please fill out the following fields to login:</p>
    </div>
</div>-->
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Bienvenue !</h1>
            </div>
            <?php $form = ActiveForm::begin([
            'id'=>'login-form',
            'options'=>['class'=>'user']
            ]); ?>
            <?= $form->field($model, 'username',[
                'inputOptions'=>[
                    'name'=>'Nom d\utilisateur',
                    'class'=>'form-control form-control-user',
                    'placeholder'=>'Nom d\'utilisateur'
                    ]
            ])->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password',
            ['inputOptions'=>[  
                'name'=>'Mot de passe',
                'class'=>'form-control form-control-user',
                'placeholder'=>'Mot de passe'
                ]
            ])->passwordInput() ?>

            <?= $form->field($model, 'rememberMe')->checkbox() ?>
 
            <?= Html::submitButton('Connexion', ['class' => 'btn btn-primary btn-user btn-block', 'name' => 'login-button']) ?>
            <hr>
            <a href="index.html" class="btn btn-google btn-user btn-block">
                <i class="fab fa-google fa-fw"></i> Connexion avec Google
            </a>
            <a href="index.html" class="btn btn-facebook btn-user btn-block">
                <i class="fab fa-facebook-f fa-fw"></i> Connexion avec Facebook
            </a>
                
            <hr> 
            <?php ActiveForm::end() ?>
            <div class="text-center">
                <a class="small" href="<?php echo Url::to('/site/forgot-password')?>">Mot de passe oublié?</a>
            </div>
            <div class="text-center">
                <a class="small" href="<?php echo Url::to('/site/register')?>">Créez un compte</a>
            </div>
        </div>
    </div>
</div>