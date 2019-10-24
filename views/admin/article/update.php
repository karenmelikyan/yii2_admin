<?php

/** @var \app\models\Article $article */
/** @var \app\models\Category[] $categories */
?>

<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="<?= \yii\helpers\Url::to(['update', 'id' => $article->id]); ?>" method="post">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                    <div class="form-group">
                        <label for="inputTitle">Title</label>
                        <input id="inputTitle" name="Article['title']" type="text" class="form-control" value="<?= $article->title; ?>">
                    </div>

                    <div class="form-group">
                        <label for="inputContent">Content</label>
                        <textarea rows="6" id="inputContent" name="Article['content']" type="text" class="form-control"><?= $article->content; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputStatus">Status</label>
                        <select id="inputStatus" name="Article['status']" class="form-control">
                            <?php foreach ($article->statusList as $value => $text): ?>
                                <option value="<?= $value ?>" <?= $article->status === $value ? 'selected' : '' ?>><?= $text ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="inputCategory">Category</label>
                        <select id="inputCategory" name="Article['news_category']" class="form-control">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>" <?= $article->news_category === $category->id ? 'selected' : ''; ?>>
                                    <?= $category->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
