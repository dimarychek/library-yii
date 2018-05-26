<?php

use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'Library';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Authors & Books</h1>
    </div>

    <div class="body-content">

        <div class="row">
            <?php foreach ($authors as $author): ?>
                <div class="col-lg-3">
                    <h2><?= Html::encode("$author->name") ?></h2>
                    <ul>
                        <?php foreach ($author->book as $book): ?>
                            <li><?= Html::encode("$book->name") ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</div>
