<?php
use app\assets\ResourcesAsset;
use luya\helpers\Url;
use luya\cms\widgets\LangSwitcher;

ResourcesAsset::register($this);

/* @var $this luya\web\View */
/* @var $content string */

$this->beginPage();
?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->composition->langShortCode; ?>">
    <head>
        <meta charset="UTF-8" />
        <meta name="robots" content="index, follow" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $this->title; ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
    <div class="nav-container bg-light m-b-3">
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= $this->publicHtml; ?>">
                        <img alt="luya.io-kickstarter" src="<?= $this->publicHtml; ?>/images/logo/0.2x/luya_logo@0.2x.png" height="20px" width="auto">
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <?php foreach (Yii::$app->menu->findAll(['depth' => 1, 'container' => 'default']) as $item): /* @var $item \luya\cms\menu\Item */ ?>
                            <li class="nav-item<?= $item->isActive ? ' active' : '' ?>">
                                <a class="nav-link" href="<?= $item->link; ?>"><?= $item->title; ?></a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                    <?= LangSwitcher::widget([
                        'listElementOptions' => ['class' => 'nav navbar-nav navbar-right'],
                        'elementOptions' => ['class' => 'nav-item'],
                        'linkOptions' => ['class' => 'nav-link'],
                        'linkLabel' => function ($lang) {
                            return strtoupper($lang['short_code']);
                        }
                    ]); ?>
                </div>
            </div>
        </nav>
    </div>
    <div class="container">
        <nav aria-label="breadcrumb mb-3">
            <ol class="breadcrumb">
                <?php foreach (Yii::$app->menu->current->teardown as $item): /* @var $item \luya\cms\menu\Item */ ?>
                    <li class="breadcrumb-item<?= $item->isActive ? ' active' : ''; ?>">
                        <a href="<?= $item->link; ?>"><?= $item->title; ?></a>
                    </li>
                <?php endforeach; ?>
            </ol>
        </nav>
        <!-- /* DELETE ME -->    
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-success" role="alert">
                    <?= Yii::t('app', 'kickstarter_success'); ?>
                    <hr>
                    <p class="mb-0">
                        <?= Yii::t('app', 'kickstarter_admin_link', ['link' => Url::toInternal(['admin/default/index']), true]); ?>
                    </p>
                </div>
            </div>
        </div>
        <!-- DELETE ME */ -->
        <div class="row">
            <?php if (count(Yii::$app->menu->getLevelContainer(2)) > 0): ?>
            <div class="col-md-3">
                    <ul class="nav nav-pills nav-stacked">
                        <?php foreach (Yii::$app->menu->getLevelContainer(2) as $child): /* @var $child \luya\cms\menu\Item */ ?>
                        <li <?php if ($child->isActive): ?>class="active" <?php endif; ?>><a href="<?= $child->link; ?>"><?= $child->title; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="col-md-9">
                    <?= $content; ?>
                </div>
            <?php else: ?>
                <div class="col-md-12">
                    <?= $content; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <footer class="footer">
        <div class="container">
                <ul>
                    <li>This website is made with <a href="https://luya.io" target="_blank">LUYA</a></li>
                    <li><a href="https://github.com/luyadev/luya" target="_blank"><i class="fa fa-github"></i></a></li>
                    <li><a href="https://twitter.com/luyadev" target="_blank"><i class="fa fa-twitter"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCfGs4sHk-D3swX0mhxv98RA" target="_blank"><i class="fa fa-youtube"></i></a></li>
                </ul>
        </div>
    </footer>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
