<p align="center">
  <a href="https://www.meanify.co?from=github&lib=laravel-payment-hub">
    <img src="https://meanify.co/assets/core/img/logo/png/meanify_color_dark_horizontal_02.png" width="200" alt="Meanify Logo" />
  </a>
</p>


# Laravel Helpers
A PHP library with helpers for Laravel

## Installation:

Install this package with composer:

~~~
composer require meanify-co/laravel-helpers
~~~
---
### Examples:

Check if a string contains one or more substrings:

~~~
$string = "My string"

meanifyHelpers()->string()->checkStringContains($string,'Laravel'); //false
meanifyHelpers()->string()->checkStringContains($string,'str'); //true
meanifyHelpers()->string()->checkStringContains($string,['my','Laravel']); //true
meanifyHelpers()->string()->checkStringContains($string,['php','Laravel']); //false
~~~

### Some methods:

| Method      | Description      | Example |
|--------------|-------------|--------------------|
| array() | Array utils  | meanifyHelpers()->array()->arrayToObject(...$args)                 |
| datetime() | Datetime Utils  | meanifyHelpers()->datetime()->getRangePeriods(...$args)                 |
| encryption() | Encryption Utils  | meanifyHelpers()->encryption()->customEncrypt(...$args)                 |
| git() | Git Utils  | meanifyHelpers()->git()->getCurrentGitCommit(...$args)                 |
| image() | Image Utils  | meanifyHelpers()->image()->convertImageToWebp(...$args)                 |
| mask() | Mask Utils  | meanifyHelpers()->mask()->insertMask(...$args)                 |
| parse() | Parse Utils  | meanifyHelpers()->parse()->urlToDomain(...$args)                 |
| string() | String Utils  | meanifyHelpers()->string()->removeAccentuation(...$args)                 |
| zip() | Zip Utils  | meanifyHelpers()->zip()->createFromFiles(...$args)                 |







