<?php $this->beginPage(); ?>
<html>
    <head>
        <title>Luya &mdash; <?= $this->title; ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
        <div id="header">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h1><?= Yii::$app->siteTitle; ?></h1>
                    </div>
                    <div class="col-md-6">
                        <div class="git pull-right">
                            <a href="https://github.com/zephir/luya" target="_blank" alt="Luya on GitHub" title="Luya on GitHub"><i class="fa fa-github fa-2x"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- You can delete this line in your template! as this is only a luya information. -->
        <div style="padding:20px; background-color:#9ccc65; margin-top:20px;" class="container">
            <div>
                <?= \luya\Module::t('luya', 'kickstarter_success'); ?>
                <?= \luya\Module::t('luya', 'kickstarter_admin_link', ['link' => \luya\helpers\Url::toInternal(['admin/default/index']), true]); ?>
            </div>
        </div>
        
        <div class="container" id="content">
            <div class="row">
                <ol class="breadcrumb">
                    <?php foreach (Yii::$app->menu->current->teardown as $item): ?>
                    <li><a href="<?= $item->link; ?>"><?= $item->title; ?></a>
                    <?php endforeach; ?>
                </ol>
            </div>
        
            <div class="row">
                <div class="col-md-3" id="nav" style="min-height:500px;">
                    <ul>
                    <?php foreach (Yii::$app->menu->find()->where(['parent_nav_id' => 0, 'container' => 'default'])->all() as $item): ?>
                        <li>
                            <a<?php if ($item->isActive): ?> class="active"<?php endif;?> href="<?= $item->link; ?>"><?= $item->title; ?></a>
                            <?php if ($item->hasChildren()): ?>
                            <ul>
                                <?php foreach ($item->children as $child): ?>
                                    <li><a<?php if ($child->isActive): ?> class="active"<?php endif;?> href="<?= $child->link; ?>">&raquo; <?= $child->title; ?></a></li>
                                    
                                    <?php if ($child->hasChildren()): ?>
                                    <ul>
                                        <?php foreach ($child->children as $grandChild): ?>
                                            <li><a<?php if ($grandChild->isActive): ?> class="active"<?php endif;?> href="<?= $grandChild->link; ?>">&raquo; <?= $grandChild->title; ?></a>
                                        <?php endforeach; ?>
                                    </ul>
                                    <?php endif; ?>
                                    
                                <?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </ul>
                </div>
                <div class="col-md-9">
                    <?= $content; ?>
                </div>
            </div>
        </div>
        <div id="footer">
            <div class="container divider">
                <h4>&copy <?= date("Y"); ?> by <i>You</i> &amp; <i>Luya</i></h4>
            </div>
        </div>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>