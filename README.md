# ABA File Generator
#(Currently in dev mode. Use simonblee/aba-file-generator instead)

## Overview
Generates an aba file for International transfers for NAB bank.

## Project Status:
This library is very new and all test cases are not accounted for. It is recommended
that you run a few manual tests and validate the file with your banking institute.

As always, if you notice any errors please submit an issue or even better, a pull request.
This is an addition to simonblee/aba-file-generator

## License
[MIT License](http://en.wikipedia.org/wiki/MIT_License)

## Installation
Copy the files where needed or install via composer:
```bash
composer require latysh/aba-file-generator
```

## Usage
Create a generator object with the descriptive type information for this aba file:
```php
use NabAbaIntFileGenerator\Model\NabIntTransaction;
use NabAbaIntFileGenerator\Generator\NabAbaIntFileGenerator;

$accounts = [
    'AUD' => ['account_number' => 'TESTAUD', 'bsb' => '000111'],
    'CHF' => ['account_number' => 'TESTCHF', 'bsb' => '000111'],
    'EUR' => ['account_number' => 'TESTEUR', 'bsb' => '000111']

];

$generator = new NabAbaIntFileGenerator(
    $accounts,          // Accounts array
    'NFA'               // Payment method
);
```

Create an object or array of objects implementing `AbaFileGenerator\Model\TransactionInterface`. A simple Transaction object
is provided with the library but may be too simple for your project:
```php
$transaction = new NabIntTransaction();
$transaction->setCurrency();
$transaction->setPaymentAmount();
$transaction->setDate('27052015');
$transaction->setReference('');
$transaction->setBeneficiaryName('');
$fa = 'Test 555, Melbourne, Australia';
$address1 = (strlen($fa) > 35) ? substr($fa, 0, 34) : $fa;
$address2 = (strlen($fa) > 35) ? substr($fa, 34, strlen($fa)) : '';
$transaction->setBeneficiaryAddress1($address1);
$transaction->setBeneficiaryAddress2($address2);
$transaction->setBeneficiaryAccountNumber();
$transaction->setOverseasBankCharges('B');
$transaction->setBeneficiaryBankCountryCode();
$transaction->setSwift();
$transaction->setNumberOfDetailRecords(1);
$transaction->setRefinanceDate();
```

Generate the aba string and save into a file (or whatever else you want):
```php
$abaString = $generator->generate($transaction); // $transaction could also be an array here
file_put_contents('/my/aba/file.aba', $abaString);
```

## References
- http://www.anz.com/Documents/AU/corporate/clientfileformats.pdf
- http://www.cemtexaba.com/aba-format/cemtex-aba-file-format-details.html
- https://github.com/mjec/aba/blob/master/sample-with-comments.aba
- http://www.nab.com.au/content/dam/nab/business/online-banking/nab-connect/file-formats/NAB%20Connect%20Consolidated%20File%20Format%20Specification_V0.05.pdf
