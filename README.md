# Axel Antivirus

[![Latest Stable Version](http://poser.pugx.org/axelhub/antivirus/v)](https://packagist.org/packages/axelhub/antivirus) [![Total Downloads](http://poser.pugx.org/axelhub/antivirus/downloads)](https://packagist.org/packages/axelhub/antivirus) [![Latest Unstable Version](http://poser.pugx.org/axelhub/antivirus/v/unstable)](https://packagist.org/packages/axelhub/antivirus) [![License](http://poser.pugx.org/axelhub/antivirus/license)](https://packagist.org/packages/axelhub/antivirus) [![PHP Version Require](http://poser.pugx.org/axelhub/antivirus/require/php)](https://packagist.org/packages/axelhub/antivirus)

### [Open in GitHub](https://github.com/axeldeploy/antivirus)

## Installation

<pre>composer require axeldeploy/antivirus</pre>

## Using

```php
$validator = Validator::make($request->all(), [
    'image' => ['required', 'image', new Axel\Antivirus\Rules\Antivirus()]
]);
```
