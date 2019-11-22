<?php

/** @var \app\models\Article $article */
/** @var \app\models\Category[] $categories */
/** @var \app\models\Company[] $companies */

use app\controllers\admin\ArticleController;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<div class="container">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="<?= Url::to('create'); ?>"method="post">

                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->csrfToken ?>">
                    <div class="form-group has-error">
                        <label for="inputTitle"><?= $article->getAttributeLabel('title'); ?></label>
                        <input id="inputTitle" name="Article[title]" type="text" class="form-control" value="" />
                        <?php if ($article->hasErrors('title')): ?>
                            <?php foreach ($article->getErrors('title') as $error): ?>
                                <div class="text-danger"><?= $error; ?></div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="inputContent"><?= $article->getAttributeLabel('content'); ?></label>
                        <textarea rows="6" id="inputContent" name="Article[content]" type="text" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="inputStatus"><?= $article->getAttributeLabel('status'); ?></label>
                        <select id="inputStatus" name="Article[status]" class="form-control">
                            <?php foreach ($article->statusList as $value => $text): ?>
                                <option value="<?= $value ?>" <?= $article->status === $value ? 'selected' : '' ?>><?= $text ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php if ($article->hasErrors('status')): ?>
                            <?php foreach ($article->getErrors('status') as $error): ?>
                                <div class="text-danger"><?= $error; ?></div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                    <div class="form-group">
                        <label for="inputCategory"><?= $article->getAttributeLabel('category_id'); ?></label>
                        <select id="inputCategory" name="Article[category_id]" class="form-control">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>">
                                    <?= $category->name ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="inputCompany"><?= $article->getAttributeLabel('news_company'); ?></label>
                        <select id="inputCompany" name="Article[news_company]" class="form-control">
                            <option value="">-</option>
                            <?php foreach ($companies as $company): ?>
                                <option value="<?= $company->id ?>">
                                    <?= $company->name ?>
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


