<?php
$this->pageTitle=Yii::app()->name . ' - '. Yii::t('app', 'Error');
$this->breadcrumbs=array(
	Yii::t('app', 'Error'),
);
?>

<h2><?php echo Yii::t('app', 'Error'); ?> <?php echo $code; ?></h2>

<div class="error">
<?php echo CHtml::encode($message); ?>
</div>