<?php
/** @var \app\models\Article[] $articles */

use yii\helpers\StringHelper;
use yii\helpers\Url;

$this->title = "Categories";
?>

<div class="container-fluid">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <?= $this->title; ?>
                <div class="float-right"><a href="<?= Url::to('create'); ?>" class="btn btn-primary">Create Category</a></div>
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
                    <?php foreach ($categories as $category): ?>
                        <tr>
                            <td><?= $category->id; ?></td>
                            <td><?= $category->name; ?></td>
                            <td>
                                <a href="<?= Url::to(['view', 'id' => $category->id]) ?>"><i class="fas fa-eye"></i></a>
                                <a href="<?= Url::to(['update', 'id' => $category->id]) ?>"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= Url::to(['delete', 'id' => $category->id]) ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
