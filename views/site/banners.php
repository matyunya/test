<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'Баннеры';
?>
<div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    foreach ($banners as $banner) {

    	$model->get($banner['name'], $banner['count']);
    }
    ?>
</div>

<script type="text/javascript">
if (window.location.hash) {
  var id = window.location.hash.replace ( /[^\d.]/g, '' );
  var element = document.getElementById("banner-id-" + id).childNodes[1];
  element.style.border = '1px solid red';
  element.scrollIntoView();
}

function scrollIntoView(eleID) {
   var e = document.getElementById(eleID);
   if (!!e && e.scrollIntoView) {
       e.scrollIntoView();
   }
}
</script>