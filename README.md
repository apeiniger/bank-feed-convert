# Bank Feed Convert
[![Build Status](https://api.shippable.com/projects/54c4e1895ab6cc135289b4a5/badge?branchName=master)](https://app.shippable.com/projects/54c4e1895ab6cc135289b4a5/builds/latest)

## Importing

This class helps importing CSV bank feeds from currently a few different German banks and credit card companies.

As of today the following ones are supported:
- ING Diba
- Sparkasse
- Lufthansa Miles&More creditcard

Further support can be added by just creating an importer.

### Usage

```php
$importer = new \BankFeedConvert\Importer\IngDiba();
$importer->loadFromFile('import.csv');
$importer->import();
$transactions = $importer->getTransactions();
```

## Exporting

Furthermore the class has different Exporters, so that you can convert the feeds into a format that is supported by other systems to which you want to import the feeds.

Currently the following export formats are supported:
- QIF

### Usage

```php
$exporter = new \BankFeedConvert\Exporter\QIF($transactions);
$exporter->export('export.qif');
```
