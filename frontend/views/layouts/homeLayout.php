<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\HomeAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

HomeAsset::register($this);

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>



    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/97c38de7/css/Footer-with-button-logo.css">


    <link href="assets/97c38de7/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Theme CSS -->
    <link href="css/agency.min.css" rel="stylesheet">


    <style type="text/css">
    body {
    /*background: url('/images/home/home.jpg') no-repeat center 30px;*/
    /* background: url('./images/WC1.png') no-repeat center 30px;
        }
    </style>



    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/webb.png', ['alt'=>Yii::$app->homeUrl]),
        //'brandOptions' => ['class' => 'myclass'],//options of the brand
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',//options of the navbar
  ],
]);
   // NavBar::begin([
   //     'brandLabel' => 'Proyecto2',
   //     'brandUrl' => Yii::$app->homeUrl,
   //     'options' => [
   //         'class' => 'navbar-inverse navbar-fixed-top',
    //    ],
    //]);
    
    $menuItems = [
        ['label' => 'Home', 'url' => ['/site/index']],
        ['label' => 'About', 'url' => ['/site/about']],
        ['label' => 'Contact', 'url' => ['/site/contact']],
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }





    /*echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>*/

    echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'encodeLabels' => false,
    'items' => [
        ['label' => '<span class="glyphicon glyphicon-home"></span> Home', 'url' => ['/site/index']],
        ['label' => '<span class="glyphicon glyphicon-phone-alt"></span> About', 'url' => ['/site/about']],
        ['label' => '<span class="glyphicon glyphicon-envelope"></span> Contact', 'url' => ['/site/contact']],
        Yii::$app->user->isGuest ?
            ['label' => '<span class="glyphicon glyphicon-user"></span> Login', 'url' => ['/site/login']] :
            ['label' => '<span class="glyphicon glyphicon-off"></span> Logout (' . Html::encode(Yii::$app->user->identity->username) . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']],
    ],
    ]);
    NavBar::end();
    ?>





    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>



<!--NUEVOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO -->

<!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Services</h2>
                    <h3 class="section-subheading text-muted">Ready to simplify tournament management?</h3>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-trophy fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Multitude of functions</h4>
                    <p class="text-muted">Create box of single or double eliminators, leagues, schedules and rankigs. User registration, visitor logging, hybrid tournaments and more.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-group fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Social Tools</h4>
                    <p class="text-muted">Integrate and share your tournament. Collaborate with multiple administrators and chat with users in real-time.</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-cloud fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading">Access from anywhere</h4>
                    <p class="text-muted">BracketCloud keeps all your tournaments in the cloud for seamless access from any computer, tablet or phone.</p>
                </div>
            </div>
        </div>
    </section>

<!--NUEVOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO -->




<!--NUEVOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO -->


<!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">DEVELOPERS</h2>
                    <h3 class="section-subheading text-muted">Creating and sharing your tournaments is easy.</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="team-member">
                        <img src="images/Barcenas.png" class="img-responsive img-circle" alt="">
                        <h4>Luis Barcenas</h4>
                        <p class="text-muted">Web developer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="team-member">
                        <img src="images/Marioso.png" class="img-responsive img-circle" alt="">
                        <h4>Mario Perez</h4>
                        <p class="text-muted">Web developer</p>
                        <ul class="list-inline social-buttons">
                            <li><a href="#"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
              
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted">Join the millions of people who trust Challonge to manage their tournaments.</p>
                </div>
            </div>
        </div>
    </section>




<!--NUEVOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOO -->





<div class="content">
</div>
    <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                  <!-- <h2 class="logo"><a href=""> LOGO </a></h2> -->
                  <br><br><br>
                  <img src="images/webb.png" class="img-responsive" >
                </div>
                <div class="col-sm-2">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="#">Contact us</a></li>
                       
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <button type="button" class="btn btn-default" >Contact us</button>

                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p>© 2017 Copyright Text </p>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>