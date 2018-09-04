RBAC Manager for Yii 2
======================

Installation
------------

### Install With Composer

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require fsyd88/yii2-admin "~1.0"
```

or for the dev-master

```
php composer.phar require fsyd88/yii2-admin "1.x-dev"
```

Or, you may add

```
"fsyd88/yii2-admin": "~1.0"
```

to the require section of your `composer.json` file and execute `php composer.phar update`.

### Install From the Archive

Download the latest release from here [releases](https://github.com/fsyd88/yii2-admin/releases), then extract it to your project.
In your application config, add the path alias for this extension.

```php
return [
    ...
    'aliases' => [
        '@fsyd/admin' => 'path/to/your/extracted',
        ...
    ]
];
```

### how use 
+ copy example-views\yii2-app\* to backend\views\
+ copy example-views\yii2-app\CommonController to backend\controllers\
+ add configure item to backed\config\main.php
```
'modules' => [
    "admin" => [
        "class" => "fsyd\admin\Module",
    ],
],
'as access' => [
    'class' => 'fsyd\admin\components\AccessControl',
    'allowActions' => [
        'site/*',
        'admin/*'
    ]
],
#rbac
"authManager" => [
    "class" => 'yii\rbac\DbManager', #这里记得用单引号而不是双引号        
    "defaultRoles" => ["guest"],
],

```
+ open urlManager item from backed\config\mian.php 
+ modify backed\config\main-local.php  by gii
```
$config['modules']['gii'] = [
    'class' => 'yii\gii\Module',
    'generators' =>[
        'model' => ['class' => 'fsyd\admin\gii\generators\model\Generator'],
        'crud' => ['class' => 'fsyd\admin\gii\generators\crud\Generator'],            
    ]
];
```
