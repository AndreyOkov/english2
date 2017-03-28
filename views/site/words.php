<?php foreach ($words as $word) { ?>

    <?= 'Hello my name is ' . $name ?>
    <a style="display: block;"
       href="<?= Yii::$app->urlManager->createUrl(['admin/words/index']) ?>"><?= $word['enword'] ?></a>
<?php } ?>
<?= \yii\widgets\LinkPager::widget(['pagination' => $pagination]) ?>
