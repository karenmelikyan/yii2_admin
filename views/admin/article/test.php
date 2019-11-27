
<?php
/** @var Article[] $articles */
/** @var \app\models\Pagination $pages */

use app\models\Article;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Url;
use yii\helpers\StringHelper;

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
                <?= /** @noinspection PhpUnhandledExceptionInspection */
                GridView::widget([
                    'pager' => [
                        'class' => \yii\bootstrap4\LinkPager::class,
                    ],
                    'dataProvider' => $data,
                    'columns' => [
                        [
                            'class' => SerialColumn::class,
                        ],
                        'title',
                        [
                            'attribute' => 'content',
                            'value' =>  function($article) {
                                return StringHelper::truncateWords($article->content, 10);
                            }
                        ],
                        [
                            'attribute' => 'status',
                            'value' => function(Article $article) {
                                return $article->getStatusText();
                            }
                        ],
                        [
                            'attribute' => 'category_id',
                            'value' => function(Article $article) {
                                return $article->category->name;
                            }
                        ],
                        [
                            'attribute' => 'news_company',
                            'value' => function(Article $article) {
                                return $article->company->name;
                            }
                        ],
                        [
                            'class' => ActionColumn::class,
                            'template' => '{update} {delete}',
                            'buttons' => [
                                'update' => function ($url) {
                                    return '<a href="' . $url . '"><i class="fas fa-pencil-alt"></i></a>';
                                },
                                'delete' => function ($url) {
                                    return '<a href="' . $url . '"><i class="fas fa-trash-alt"></i></a>';
                                },
                                'update2' => function ($url, $article, $key) {
                                    return '<a href="' . $url . '"><i class="fas fa-pencil-alt"></i></a>';
                                },
                            ],
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>

