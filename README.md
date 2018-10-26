# lightning-php
PHP interface for the elements/c-lightning RPC API

## Installation

`composer require thorie7912/lightning-php:^1.0`

## Usage

```php
$lightningApi = new \Lightning\LightningApi();
$lightningApi->setRpcFile("/home/user/.lightning/lightning-rpc");

// Get info

$ret = $lightningApi->getInfo();

// Pay invoice

$invoice = "ln123xyz...";
$ret = $lightningApi->pay($invoice);

// Create invoice

$msatoshi = 50000;
$label = "Some label";
$description = "Some description";
$ret = $lightningApi->createinvoice($msatoshi, $label, $description);
```


