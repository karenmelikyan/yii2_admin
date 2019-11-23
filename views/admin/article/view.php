<?php

/** @var \app\models\Article $article */

?>

<?php foreach ($articles as $article): ?>
     <?php if($article->id == $id): ?>
        <div class="container">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5><?= $article->title; ?></h5> </td>
                        <p> <?= $article->content; ?></p> </td>
                        <p> <?= $article->category->name; ?></p> </td>
                        <p> <?= $article->company !== null ? $article->company->name : '-' ; ?></p> </td>
                    </div>
                </div>
            </div>
         </div>
     <?php endif; ?>
<?php endforeach; ?>

