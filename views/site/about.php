<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<style type="text/css">
	
	.site-about
	{
	   margin-top: 10vh;
       text-align: center;
       margin-bottom: 24vh;
		height: 100%;
	}
</style>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        This is the About page. You may modify the following file to customize its content:
    </p>

    <code><?= __FILE__ ?></code>
</div>
