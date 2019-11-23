<?php

use yii\helpers\Url;

/** @var  $id */
?>


<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5>Come on! Really? Go to <a href="<?= Url::to(['update', 'id' => $id]) ?>">edit</a> and look</h5>4
            </div>
        </div>
    </div>
</div>


