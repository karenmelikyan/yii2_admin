<?php

use yii\helpers\Url;

?>

<div class="container">
    <div class="card-body">
        <div align="center">
            <h5> Are you sure you want to delete this article? </h5>
            <br>
            <div class="child">
                <a href="<?= Url::to(['delete', 'id' => $id, 'status' => 1]); ?>" class="btn btn-primary">Yes</a>
            </div>
            <div class="child">
                <a href="<?= Url::to(['delete', 'id' => $id, 'status' => 2]); ?>" class="btn btn-primary">Cancel</a>
            </div>
        </div>
    </div>
</div>

