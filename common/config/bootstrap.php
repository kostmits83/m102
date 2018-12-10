<?php
Yii::setAlias('@common', dirname(__DIR__));
Yii::setAlias('@frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('@backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('@console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@appRoot', '/' . basename(dirname(dirname(__DIR__))));
Yii::setAlias('@commonImages', '/' . basename(dirname(dirname(__DIR__))) . '/common/web/images');