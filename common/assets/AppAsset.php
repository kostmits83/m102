<?php

namespace common\assets;

use yii\web\AssetBundle;

/**
 * Main common application asset bundle.
 */
class AppAsset extends AssetBundle
{
	// This is not a web accessible directory so we use $sourcePath
	public $sourcePath = '@common/web/';

	public $css = [
		'css/common.css',
	];

	public $js = [
		'js/main.js',
	];

	public $depends = [
		'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
	];

}
