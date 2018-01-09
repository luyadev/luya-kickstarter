<?php

namespace app\assets;

/**
 * Application Asset File.
 */
class ResourcesAsset extends \luya\web\Asset
{
    public $sourcePath = '@app/resources';
    
    public $css = [
        '//fonts.googleapis.com/css?family=Roboto:100,300,400',
        '//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css',
        'css/style.css'
    ];
    
    public $publishOptions = [
        'only' => [
            'css/*',
            'js/*',
        ]
    ];
}
