<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="body-content">
        <div class="row text-center">
            <div class="col-lg-6">
                <a href="<?php echo Url::to(['author/']); ?>">
                    <h2>Authors</h2>
                </a>
            </div>
            <div class="col-lg-6">
                <a href="<?php echo Url::to(['book/']); ?>">
                    <h2>Books</h2>
                </a>
            </div>
        </div>
    </div>

</div>
