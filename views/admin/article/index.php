<?php
/** @var \app\models\Article[] $articles */

use yii\helpers\StringHelper;
use yii\helpers\Url;

$this->title = "Articles";
?>

<div class="container-fluid">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <?= $this->title; ?>
                <div class="float-right"><a href="<?= Url::to('create'); ?>" class="btn btn-primary">Create Article</a></div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Category</th>
                        <th>Company</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($articles as $article): ?>
                        <tr>
                            <td><?= $article->id; ?></td>
                            <td><?= $article->title; ?></td>
                            <td><?= StringHelper::truncateWords($article->content, 10); ?></td>
                            <td><?= $article->getStatusText(); ?></td>
                            <td><?= $article->category->name; ?></td>
                            <td><?= $article->company === null ? '-' : $article->company->name ?></td>
                            <td>
                                <a href="<?= Url::to(['view', 'id' => $article->id]) ?>"><i class="fas fa-eye"></i></a>
                                <a href="<?= Url::to(['update', 'id' => $article->id]) ?>"><i class="fas fa-pencil-alt"></i></a>
                                <a href="<?= Url::to(['delete', 'id' => $article->id]) ?>"><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
