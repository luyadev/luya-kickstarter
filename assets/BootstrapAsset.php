<?php

namespace app\assets;

/**
 * Application Asset File.
 */
class BootstrapAsset extends \luya\web\Asset
{
    public $sourcePath = '@app/resources';
    
    public $js = [
        '//cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',
        '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js'
    ];
    
    public $css = [
        '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css',
    ];
    
    public $depends = [
        'yii\web\JqueryAsset',
    ];
}
