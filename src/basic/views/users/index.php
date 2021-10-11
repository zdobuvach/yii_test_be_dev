<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>Країниїни<?php foreach ($users as $user): ?>
    <li>
        <?= Html::encode("{$user->id} {$user->first_name} {$user->last_name}") ?>       
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>