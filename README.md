Nova Poshta
===========
Nova Poshta Api

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require --prefer-dist aksi0/yii2-novaposhta "dev-master"
```

or add

```
"aksi0/yii2-novaposhta": "dev-master"
```

to the require section of your `composer.json` file.


Usage
-----

1. Setup configuration:
```php
'components' => [
    'novaPoshta' => [
        'class' => 'aksi0\novaposhta\NovaPoshta',
        'api_key' => '*specify your api key*'
    ]
]
```
2. Getting/Search cities
```php
$novaPoshta = Yii::$app->novaPoshta;
// get all cities
$cities = $novaPoshta->getAddress()->getCities();
// or search
$cities = $novaPoshta->getAddress()->getCities('Dnipro');
```