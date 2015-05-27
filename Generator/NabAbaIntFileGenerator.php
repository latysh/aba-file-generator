<?php

namespace NabAbaIntFileGenerator\Generator;

use Exception;
use NabAbaIntFileGenerator\Model\NabIntTransaction;

class NabAbaIntFileGenerator {
    const HEADER_RECORD = '01';
    const PAYMENT_HEADER = '02';
    const PAYMENT_RECORD = '03';
    const PAYMENT_DETAIL_RECORD = '55';
    const PAYMENT_TRAILER_RECORD = '79';
    const PAYMENT_TRAILER = '89';
    const FILE_TRAILER_RECORD = '99';

    private $abaString = '';
    private $numberRecords = 0;
    private $remitter;
    private $fileName;

    // Debitor's details
    /**
     * @var array. ['currency'=>['account_number', 'bsb']]
     */
    private $accounts;
    private $paymentMethod;
    private $paymentLegCurrencyCode;
    private $paymentLegAmount;
    private $debitAccountBsb;
    private $debitAccountNumber;
    private $debitCurrencyCode;
    private $debitAmount;
    private $refinanceIndicator;
    private $fxRate;
    private $textToNabForPayAccount;
    private $fecNumber;
    private $efxNumber;

    public function __construct($accounts, $paymentMethod, $remitter = null, $refinanceIndicator = 0, $fxRate = null, $textToNabForPayAccount = null, $fecNumber = null, $efxNumber = null) {
        $this->accounts = $accounts;
        $this->paymentMethod = $paymentMethod;
        $this->remitter = $remitter;
        $this->refinanceIndicator = $refinanceIndicator;
        $this->fxRate = $fxRate;
        $this->textToNabForPayAccount = $textToNabForPayAccount;
        $this->fecNumber = $fecNumber;
        $this->efxNumber = $efxNumber;
    }

    /**
     * @param array|NabIntTransaction
     * @return string
     */
    public function generate($transactions) {
        if (!is_array($transactions)) {
            $transactions = array($transactions);
        }

        $this->addHeaderRecord();
        $this->addPaymentHeader();

        foreach ($transactions as $transaction) {
            $this->validatePaymentRecord($transaction);
            //set (debitor) variables depending on currency of payment
            $this->debitAmount = $transaction->getPaymentAmount();
            $this->debitCurrencyCode = $transaction->getCurrency();
            $this->debitAccountBsb = $this->accounts[$transaction->getCurrency()]['bsb'];
            $this->debitAccountNumber = $this->accounts[$transaction->getCurrency()]['account_number'];
            $this->paymentLegAmount = $transaction->getPaymentAmount();
            $this->paymentLegCurrencyCode = $transaction->getCurrency();
            $this->addPaymentRecord($transaction);

            $this->validatePaymentDetailRecord($transaction);
            $this->addPaymentDetailRecord($transaction);
        }

        $this->numberRecords = count($transactions);
        $this->addPaymentTrailerRecord();
        $this->addPaymentTrailer();
        $this->addFileTrailerRecord();

        return $this->abaString;
    }

    /**
     * Create the header record line of the file.
     */
    private function addHeaderRecord() {
        // Record Type
        $line = self::HEADER_RECORD;

        // File name, must be blank
        $line .= str_repeat(' ', 20);

        //Number of messages
        $line .= str_pad($this->numberRecords, 3, '0', STR_PAD_LEFT);

        $this->addLine($line);
    }

    /**
     * Create the header record line of the file.
     */
    private function addPaymentHeader() {
        // Record Type
        $line = self::PAYMENT_HEADER;

        // File name, must be blank
        $line .= 'IFT';

        //Number of messages
        $line .= '0001';

        $this->addLine($line);
    }

    /**
     * Create the payment record line of the file.
     *
     * @param NabIntTransaction $transaction
     */
    private function addPaymentRecord(NabIntTransaction $transaction) {
        // Record Type
        $line = self::PAYMENT_RECORD;

        // Pay currency code
        $line .= $transaction->getCurrency();

        // Payment amount
        $line .= str_pad($transaction->getPaymentAmount(), 15, '0', STR_PAD_LEFT);

        // Value Date
        $line .= $transaction->getDate();

        // Reference
        $line .= str_pad($transaction->getReference(), 16, ' ', STR_PAD_RIGHT);

        //Beneficiary Name
        $line .= str_pad($transaction->getBeneficiaryName(), 35, ' ', STR_PAD_RIGHT);

        //Beneficiary Address1
        $line .= str_pad($transaction->getBeneficiaryAddress1(), 35, ' ', STR_PAD_RIGHT);

        //Beneficiary Address3
        $line .= str_pad($transaction->getBeneficiaryAddress2(), 35, ' ', STR_PAD_RIGHT);

        //Beneficiary Address3
        $line .= str_pad($transaction->getBeneficiaryAddress3(), 35, ' ', STR_PAD_RIGHT);

        //Beneficiary Account number
        $line .= str_pad($transaction->getBeneficiaryAccountNumber(), 34, ' ', STR_PAD_RIGHT);

        //Beneficiary bank name
        $line .= str_pad($transaction->getBeneficiaryAccountNumber(), 35, ' ', STR_PAD_RIGHT);

        //Beneficiary beneficiary bank address1
        $line .= str_pad($transaction->getBeneficiaryAddress1(), 35, ' ', STR_PAD_RIGHT);

        //Beneficiary beneficiary bank address2
        $line .= str_pad($transaction->getBeneficiaryAddress2(), 35, ' ', STR_PAD_RIGHT);

        //Beneficiary beneficiary bank address3
        $line .= str_pad($transaction->getBeneficiaryAddress3(), 35, ' ', STR_PAD_RIGHT);

        //Purpose of the remittance
        $line .= '   ';

        //Overseas Bank Charges
        $line .= $transaction->getOverseasBankCharges();

        //Remitter name
        $line .= str_pad($transaction->getRemitterName(), 35, ' ', STR_PAD_RIGHT);

        //Refinance days
        $line .= str_pad($transaction->getRemitterName(), 3, ' ', STR_PAD_RIGHT);

        //Refinance date
        $line .= str_pad($transaction->getRefinanceDate(), 8, ' ', STR_PAD_RIGHT);

        //Additional Instructions to Beneficiary Line 1
        $line .= str_pad($transaction->getAdditionalBeneficiaryInstructions1(), 35, ' ', STR_PAD_RIGHT);

        //Additional Instructions to Beneficiary Line 2
        $line .= str_pad($transaction->getAdditionalBeneficiaryInstructions2(), 35, ' ', STR_PAD_RIGHT);

        //Additional Instructions to Beneficiary Line 3
        $line .= str_pad($transaction->getAdditionalBeneficiaryInstructions3(), 35, ' ', STR_PAD_RIGHT);

        //Additional Instructions to Beneficiary Line 4
        $line .= str_pad($transaction->getAdditionalBeneficiaryInstructions4(), 35, ' ', STR_PAD_RIGHT);

        //Additional instructions to NAB
        $line .= str_pad($transaction->getAdditionalInstructionsToNab(), 275, ' ', STR_PAD_RIGHT);

        //Beneficiary bank country code
        $line .= $transaction->getBeneficiaryBankCountryCode();

        //Beneficiary BIC Address (ie bank SWIFT Code)
        $line .= str_pad($transaction->getSwift(), 11, ' ', STR_PAD_RIGHT);

        //Routing type
        $line .= str_pad($transaction->getRoutingType(), 2, ' ', STR_PAD_RIGHT);

        //Routing code
        $line .= str_pad($transaction->getRoutingCode(), 20, ' ', STR_PAD_RIGHT);

        //Originating Applicant Details 1
        $line .= str_pad($transaction->getOriginatingApplicantDetails1(), 35, ' ', STR_PAD_RIGHT);

        //Originating Applicant Details 2
        $line .= str_pad($transaction->getOriginatingApplicantDetails2(), 35, ' ', STR_PAD_RIGHT);

        //Originating Applicant Details 3
        $line .= str_pad($transaction->getOriginatingApplicantDetails3(), 35, ' ', STR_PAD_RIGHT);

        //Originating Applicant Details 4
        $line .= str_pad($transaction->getOriginatingApplicantDetails4(), 35, ' ', STR_PAD_RIGHT);

        //Number of Detail Records
        $line .= str_pad($transaction->getNumberOfDetailRecords(), 3, '0', STR_PAD_LEFT);

        $this->addLine($line);
    }

    /**
     * Payment Detail Record
     *
     * @param NabIntTransaction $transaction
     */
    private function addPaymentDetailRecord(NabIntTransaction $transaction) {
        // Payment Detail Record
        $line = self::PAYMENT_DETAIL_RECORD;

        // Payment Method
        $line .= $transaction->getPaymentMethod();

        // Payment Leg Currency Code
        $line .= $transaction->getPaymentLegCurrencyCode();

        // Payment Leg Currency Code
        $line .= str_pad($transaction->getPaymentLegAmount(), 15, '0', STR_PAD_LEFT);

        // Payment Leg Currency Code
        $line .= str_pad($transaction->getFxRate(), 11, '0', STR_PAD_LEFT);

        // Debit account BSB
        $line .= $transaction->getDebitAccountBsb();

        // Debit Account Number
        $line .= str_pad($transaction->getDebitAccountNumber(), 35, ' ', STR_PAD_RIGHT);

        // Debit Currency Code
        $line .= $transaction->getDebitCurrencyCode();

        // Debit Amount
        $line .= str_pad($transaction->getDebitAmount(), 15, '0', STR_PAD_LEFT);

        // Refinance Indicator
        $line .= $transaction->getRefinanceIndicator();

        // Text to NAB for PAY account
        $line .= str_pad($transaction->getTextToNabForPayAccount(), 60, ' ', STR_PAD_RIGHT);

        // FEC number
        $line .= str_pad($transaction->getFecNumber(), 6, ' ', STR_PAD_RIGHT);

        // EFX number
        $line .= str_pad($transaction->getEfxNumber(), 15, ' ', STR_PAD_RIGHT);

        $this->addLine($line);
    }

    private function addPaymentTrailerRecord() {
        $line = self::PAYMENT_TRAILER_RECORD;

        $this->addLine($line);
    }

    private function addPaymentTrailer() {
        $line = self::PAYMENT_TRAILER;

        $this->addLine($line);
    }

    private function addFileTrailerRecord() {
        $line = self::FILE_TRAILER_RECORD;

        // File name
        $line .= str_pad($this->fileName, 20, ' ', STR_PAD_RIGHT);

        // File name
        $line .= date('d-m-Y');

        $this->addLine($line, false);
    }

    private function addLine($line, $crlf = true) {
        $this->abaString .= $line . ($crlf ? "\r\n" : "");
    }

    /**
     * Validate the parts of the descriptive record.
     */
    private function validatePaymentRecord($transaction) {
        if (!$transaction instanceof NabIntTransaction) {
            throw new Exception('Transactions must implement NabIntTransaction.');
        }

        if (!preg_match('/^[A-Z]{3}$/', $transaction->getCurrency())) {
            throw new Exception('Pay currency code is invalid. Must be capital letter abbreviation of length 3.');
        }

        if (strlen($transaction->getPaymentAmount()) != 15) {
            throw new Exception('Payment amount length is incorrect');
        }

        if (!preg_match('/^[0-9]{1,2}[0-9]{1,2}[0-9]{4}$/', $transaction->getDate())) {
            throw new Exception('Value Date is invalid. Must be in php date:dmY format.');
        }

        if (is_null($transaction->getBeneficiaryName()) || is_null($transaction->getBeneficiaryAddress1())) {
            throw new Exception('Beneficiary Name or Beneficiary Address1 is mandatory fields');
        }

        if (strlen($transaction->getBeneficiaryAddress1()) > 35 || strlen($transaction->getBeneficiaryAddress2()) > 35 || strlen($transaction->getBeneficiaryAddress3()) > 35) {
            throw new Exception('Beneficiary Address1 or Address2 or Address3 length is more than 35');
        }

        if ($this->refinanceIndicator == 1 && is_null($transaction->getRemitterName())) {
            throw new Exception('Remitter Name is Mandatory if the Refinance Indicator is set to ‘1’ in any of the Payment Detail records');
        }

        if ($this->refinanceIndicator == 1 && is_null($transaction->getRefinanceDays())) {
            throw new Exception('Refinance days is Mandatory if the Refinance Indicator is set to ‘1’ in any of the Payment Detail records');
        }

        if ($this->refinanceIndicator == 1 && is_null($transaction->getRefinanceDate())) {
            throw new Exception('Refinance date is Mandatory if the Refinance Indicator is set to ‘1’ in any of the Payment Detail records');
        }

        if (!preg_match('/^[0-9]{1,2}[0-9]{1,2}[0-9]{4}$/', $transaction->getRefinanceDate())) {
            throw new Exception('Refinance date is invalid. Must be in php date:dmY format.');
        }

        if (strlen($transaction->getAdditionalBeneficiaryInstructions1()) > 35 || strlen($transaction->getAdditionalBeneficiaryInstructions2()) > 35 || strlen($transaction->getAdditionalBeneficiaryInstructions3()) > 35 || strlen($transaction->getAdditionalBeneficiaryInstructions4()) > 35) {
            throw new Exception('Additional instructions to Beneficiary length is more than 35');
        }

        if ($transaction->getRoutingType() && !preg_match('/^FW|SC|CH| /', $transaction->getRoutingType())) {
            throw new Exception('Routing type is invalid. Must be one of FW, SC, CH or null.');
        }

        if (strlen($transaction->getOriginatingApplicantDetails1()) > 35 || strlen($transaction->getOriginatingApplicantDetails2()) > 35 || strlen($transaction->getOriginatingApplicantDetails3()) > 35 || strlen($transaction->getOriginatingApplicantDetails4()) > 35) {
            throw new Exception('Originating Applicant Details1,2,3,4 length is more than 35');
        }
    }

    /**
     * Validate the parts of the transaction.
     */
    private function validatePaymentDetailRecord($transaction) {
        if (self::PAYMENT_DETAIL_RECORD != '55') {
            throw new Exception('PAYMENT_DETAIL_RECORD is invalid. Value should be 55');
        }

        if (!in_array($this->paymentMethod, ['AUD', 'BTC', 'FEC', 'NFA', 'REF', 'RTR', 'EFX'])) {
            throw new Exception('Payment Method: ' . $this->paymentMethod . ' is invalid. Corrects values are: AUD, BTC, FEC, NFA, REF, RTR, EFX.');
        }

        if (in_array($this->paymentMethod, ['AUD', 'BTC', 'FEC', 'RTR']) && $this->debitCurrencyCode != 'AUD') {
            throw new Exception('For payment methods AUD, BTC,FEC, RTR, and EFX, the account currency must be AUD');
        }

        if (ctype_upper($this->paymentLegCurrencyCode) && strlen($this->paymentLegCurrencyCode) != 3) {
            throw new Exception('Currency code for payment should be all UPPER and length = 3');
        }

        if (strlen($this->paymentLegAmount) > 15) {
            throw new Exception('Payment Leg Amount length should be < 15');
        }

        if (!preg_match('/^[\d]{6}$/', $this->debitAccountBsb)) {
            throw new Exception('Debit Account BSB is invalid: ' . $this->debitAccountBsb . '. Required format is 000111.');
        }

        if (($this->refinanceIndicator == 1 && isset($this->debitAccountNumber)) || ($this->refinanceIndicator == 0 && strlen($this->debitAccountNumber) < 9)) {
            throw new Exception('Debit Account Number is invalid');
        }

        if (ctype_upper($this->debitCurrencyCode) && strlen($this->debitCurrencyCode) != 3) {
            throw new Exception('Debit Currency Code should be all UPPER and length = 3');
        }

        if (strlen($this->debitAmount) != 15) {
            throw new Exception('Debit amount is invalid');
        }

        if (!in_array($this->refinanceIndicator, ['0', '1'])) {
            throw new Exception('Refinance Indicator: ' . $this->refinanceIndicator . ' is invalid. Should be either 0 or 1');
        }

        if ($this->paymentMethod == 'FEC' && is_null($this->fecNumber)) {
            throw new Exception('FEC number should be set for FEC payment method');
        }

        if ($this->paymentMethod == 'EFX' && is_null($this->fecNumber)) {
            throw new Exception('EFX number should be set for EFX payment method');
        }
    }
}
