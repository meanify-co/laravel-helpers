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

meanify_helpers()->string()->checkStringContains($string,'Laravel'); //false
meanify_helpers()->string()->checkStringContains($string,'str'); //true
meanify_helpers()->string()->checkStringContains($string,['my','Laravel']); //true
meanify_helpers()->string()->checkStringContains($string,['php','Laravel']); //false
~~~

### Some methods:

| Method      | Description      | Example |
|--------------|-------------|--------------------|
| array() | Array utils  | meanify_helpers()->array()->arrayToObject(...$args)                 |
| datetime() | Datetime Utils  | meanify_helpers()->datetime()->getRangePeriods(...$args)                 |
| encryption() | Encryption Utils  | meanify_helpers()->encryption()->customEncrypt(...$args)                 |
| git() | Git Utils  | meanify_helpers()->git()->getCurrentGitCommit(...$args)                 |
| image() | Image Utils  | meanify_helpers()->image()->convertImageToWebp(...$args)                 |
| mask() | Mask Utils  | meanify_helpers()->mask()->insertMask(...$args)                 |
| parse() | Parse Utils  | meanify_helpers()->parse()->urlToDomain(...$args)                 |
| string() | String Utils  | meanify_helpers()->string()->removeAccentuation(...$args)                 |
| zip() | Zip Utils  | meanify_helpers()->zip()->createFromFiles(...$args)                 |







