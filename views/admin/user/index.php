<?php
/** @var \yii\data\ActiveDataProvider $data */

$this->title = "Users edit";

use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn; ?>


<div class="container-fluid">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <?= $this->title; ?>
            </div>
            <div class="card-body">
                <?= GridView::widget([
                    'pager' => [
                        'class' => \yii\bootstrap4\LinkPager::class,
                    ],
                    'dataProvider' => $data,
                    'columns' => [
                            'username',

                            [
                            'attribute' => 'mail',
                            'format' => 'raw',
                            'value' => function($url) {
                                return '<a href="#">' . $url->mail . '</a>';
                            }
                        ],
                            'password',

                    ],



                ]); ?>
            </div>
        </div>
    </div>
</div>
