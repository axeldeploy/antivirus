# Axel Antivirus

### [Open in GitHub](https://github.com/axeldeploy/antivirus)

## Installation

<pre>composer require axeldeploy/antivirus</pre>

## Using

```php
$validator = Validator::make($request->all(), [
    'image' => ['required', 'image', new Axel\Antivirus\Rules\Antivirus()]
]);
```
