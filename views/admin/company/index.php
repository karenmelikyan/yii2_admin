<?php
/** @var \app\models\Article[] $articles */

use yii\helpers\StringHelper;
use yii\helpers\Url;

$this->title = "Companies";
?>

<div class="container-fluid">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <?= $this->title; ?>
                <div class="float-right"><a href="<?= Url::to('create'); ?>" class="btn btn-primary">Create Company</a></div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($companies as $company): ?>
                        <tr>
                            <td><?= $company->id; ?></td>
                            <td><?= $company->name; ?></td>
                            <td>
                                <a href="<?= Url::to(['view', 'id' => $company->id]) ?>"><i class="fas fa-eye"></i></a>
                                <a href="<?= Url::to(['update', 'id' => $company->id]) ?>"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= Url::to(['delete', 'id' => $company->id]) ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

