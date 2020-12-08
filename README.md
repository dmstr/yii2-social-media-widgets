Yii2 Social Media Widgets
============

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download).

Either run

```
composer require --prefer-dist dmstr/yii2-social-media-widgets
```

or add

```
"dmstr/yii2-social-media-widgets": "*"
```

to the require section of your `composer.json` file.


Usage
-----

### PHP

```php
use dmstr\socialmediawidgets\widgets\SocialMediaMeta;

SocialMediaMeta::widget([
    'title' => 'Title',
    'description' => 'Lorem ipsum dolor sit amet',
    'image' => 'https://example.com/example.png',
    'url' => 'https://example.com/mypage',
    'siteName' => 'Site Name',
    'twitterImageAlt' => 'Alt Text'
]);
```

### TWIG

```twig
{{ use ('dmstr/socialmediawidgets/widgets/SocialMediaMeta') }}

{{ SocialMediaMeta_widget({
    title: title,
    description: description,
    image: image(image),
    url: url,
    siteName: siteName,
    twitterImageAlt: twitterImageAlt
}) }}
```

In combination with the [dmstr yii2 widgets2 module](https://github.com/dmstr/yii2-widgets2-module) you are may be interested in
a json editor schema:

```json
{
    "title": "SEO Social Media",
    "type": "object",
    "properties": {
        "title": {
            "title": "Title",
            "type": "string",
            "minLength": 1
        },
        "description": {
            "title": "Description",
            "type": "string",
            "minLength": 1
        },
        "image": {
            "title": "Image",
            "type": "string",
            "format": "filefly",
            "minLength": 1
        },
        "url": {
            "title": "URL",
            "type": "string"
        },
        "siteName": {
            "title": "Site Name",
            "type": "string"
        },
        "twitterImageAlt": {
            "title": "Twitter Image Alt",
            "type": "string"
        }
    }
}
``` 
