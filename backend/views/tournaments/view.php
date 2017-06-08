<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tournaments */

$this->title = $model->tournament_id;
$this->params['breadcrumbs'][] = ['label' => 'Tournaments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tournaments-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->tournament_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->tournament_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'tournament_id',
            'tournament_name',
            'tournament_description:ntext',
            'tournament_status',
            'tournament_start_date',
            //'tournament_end_date',
            //'tournament_json:ntext',
        ],
    ]) ?>

</div>

<?php echo 'ADMIN: '.$model->tournament_admin; ?>
<!-->Agregar desde aqui </-->
<?php   
echo '
    <script type="text/javascript">
        var autoCompleteData = '.$model->tournament_json.';
    </script>';
?>
<div>
    <button id="reset-bracket" class='btn btn-default'>Balanced sorting</button>
    <br>
    
    <br>
</div>
<div id="autoComplete" name="admin">    
</div>

<?php 
//Pjax::begin();
if(Yii::$app->request->post('data'))
{
 // echo 'vas bien';
  $id = Yii::$app->request->get('id');
  //echo 'id: '.Yii::$app->request->get('id');
  $json = Yii::$app->request->post('data');
  
  //echo "modificado su json es: ".$json."<br>";

  $connection = Yii::$app->getDb();
  $command = $connection->createCommand(
    "UPDATE tournaments SET tournament_json = '".$json."' WHERE tournament_id = " . $id
  );
  $result = $command->queryAll();
}
//Pjax::end();
?>

<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://web-champions.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>


