<?php
/**
 * @var \app\models\Article $article
 */

use yii\helpers\StringHelper;
use yii\helpers\Url;

?>

<div class="float-right">
    <a href="<?= Url::to('news/signup'); ?>" class="btn btn-primary">Registration</a>
</div>

<section class="section single-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                <div class="page-wrapper">
                    <div class="blog-title-area text-center">
                        <span class="color-orange"><a><?= $article->company->name . ' / ' . $article->category->name ?></a></span>
                        <h2><?= $article->title; ?></h2>
                        <p><?= $article->content; ?></p>
                    </div>
                </div><!-- end sidebar -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>