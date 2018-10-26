# lightning-php
PHP interface for the elements/c-lightning RPC API

## Installation

`composer require thorie7912/lightning-php:^1.0`

## Usage

```php
$lightningApi = new \Lightning\LightningApi();
$lightningApi->setRpcFile("/home/user/.lightning/lightning-rpc");

// Get info

$json = $lightningApi->getInfo();
echo json_encode($json, JSON_PRETTY_PRINT);

// Pay invoice

$invoice = "ln123xyz...";
$json = $lightningApi->pay($invoice);
echo json_encode($json, JSON_PRETTY_PRINT);

// Create invoice

$msatoshi = 50000;
$label = "Some label";
$description = "Some description";
$json = $lightningApi->createinvoice($msatoshi, $label, $description);
echo json_encode($json, JSON_PRETTY_PRINT);
```


