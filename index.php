<?php
/**
 * Created by PhpStorm.
 * User: Latysh
 * Date: 26/05/15
 * Time: 5:23 PM
 */
use NabAbaIntFileGenerator\Model\NabIntTransaction;
use NabAbaIntFileGenerator\Generator\NabAbaIntFileGenerator;

$accounts = [
    'AUD' => ['account_number' => '187403423', 'bsb' => '083166'],
    'CHF' => ['account_number' => 'PEPPECHF01', 'bsb' => '083039'],
    'EUR' => ['account_number' => 'PEPPEEUR01', 'bsb' => '083039'],
    'GBP' => ['account_number' => 'PEPPEGBP01', 'bsb' => '083039'],
    'HKD' => ['account_number' => 'PEPPEHKD01', 'bsb' => '083039'],
    'JPY' => ['account_number' => 'PEPPEJPY01', 'bsb' => '083039'],
    'NZD' => ['account_number' => 'PEPPENZD01', 'bsb' => '083039'],
    'SGD' => ['account_number' => 'PEPPESGD01', 'bsb' => '083039'],
    'USD' => ['account_number' => 'PEPPEUSD01', 'bsb' => '083039'],
    'CAD' => ['account_number' => 'PEPPECAD01', 'bsb' => '083039']
];

$generator = new NabAbaIntFileGenerator(
    $accounts,          // Accounts array
    'NFA'               // Payment method
);

$transaction = new NabIntTransaction();
$transaction->setCurrency('AUD');
$transaction->setPaymentAmount(125.00);
$transaction->setDate('27052015');
$transaction->setReference('880241 WD');
$transaction->setBeneficiaryName('Altynbek Usenov');
$fa = 'Test, 1233, test, Heilongjiang, Australia';
$address1 = (strlen($fa)>35)? substr($fa, 0, 34):$fa;
$address2 = (strlen($fa)>35)? substr($fa, 34, strlen($fa)):'';
$transaction->setBeneficiaryAddress1($address1);
$transaction->setBeneficiaryAddress2($address2);
$transaction->setBeneficiaryAccountNumber('17010-13247011');
$transaction->setBeneficiaryBankName('中国建设银行');
$transaction->setOverseasBankCharges('B');
$transaction->setBeneficiaryBankCountryCode('JP');
$transaction->setSwift('JPPSJPJ1');
$transaction->setNumberOfDetailRecords(1);

$abaString = $generator->generate($transaction); // $transaction could also be an array here
file_put_contents('file.aba', $abaString);