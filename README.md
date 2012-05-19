
# phormat (phone format)

A tiny PHP class to format phone numbers.

## Usage

```php
require_once('lib/phormat.php');
$phormat = new phormat([
	'xxx-xxxx',
	'(xxx) xxx-xxxx',
	'+x (xxx) xxx-xxxx'
]);
echo $phormat->phone('123 -456  78 90');
```

Output will be

```php
(123) 456-7890
```

