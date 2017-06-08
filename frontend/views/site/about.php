<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>




<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>This is the About page. You may modify the following file to customize its content:</p>

    <?php
            echo "<div class='container'>";
            
                echo "<div class='row'>";
                echo "<div class='col-sm-12 col-md-12 col-lg-12'>";

               
                $url="https://www.youtube.com/watch?v=DyalQVxixfA";
                echo "<iframe width='480' height='360' src=".str_replace("watch?v=", "embed/", $url)." frameborder='1' allowfullscreen></iframe>";
                echo "</div>";

                

                echo "</div>";
            
            echo "</div>";
        ?>

    
</div>


