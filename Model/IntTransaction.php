<?php

namespace AbaIntFileGenerator\Model;

use AbaIntFileGenerator\Model;

class IntTransaction implements IntTransactionInterface
{
    private $currency;
    private $paymentAmount;
    private $date;
    private $reference;
    private $beneficiaryName;
    private $beneficiaryAddress1;
    private $beneficiaryAddress2;
    private $beneficiaryAddress3;
    private $beneficiaryAccountNumber;
    private $beneficiaryBankName;
    private $beneficiaryBankAddress1;
    private $beneficiaryBankAddress2;
    private $beneficiaryBankAddress3;
    private $additionalBeneficiaryInstructions1;
    private $additionalBeneficiaryInstructions2;
    private $additionalBeneficiaryInstructions3;
    private $additionalBeneficiaryInstructions4;
    private $beneficiaryBankCountryCode;
    private $swift;
    private $paymentMethod;
    private $paymentLegCurrencyCode;
    private $paymentLegAmount;
    private $debitAccountBsb;
    private $debitAccountNumber;
    private $debitCurrencyCode;
    private $debitAmount;
    private $refinanceIndicator;

    /**
     * @return mixed
     */
    public function getRefinanceIndicator() {
        return $this->refinanceIndicator;
    }

    /**
     * @param mixed $refinanceIndicator
     */
    public function setRefinanceIndicator($refinanceIndicator) {
        $this->refinanceIndicator = $refinanceIndicator;
    }

    /**
     * @return mixed
     */
    public function getCurrency() {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency) {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getPaymentAmount() {
        return $this->paymentAmount;
    }

    /**
     * @param mixed $paymentAmount
     */
    public function setPaymentAmount($paymentAmount) {
        $this->paymentAmount = $paymentAmount;
    }

    /**
     * @return mixed
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date) {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getReference() {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     */
    public function setReference($reference) {
        $this->reference = $reference;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryName() {
        return $this->beneficiaryName;
    }

    /**
     * @param mixed $beneficiaryName
     */
    public function setBeneficiaryName($beneficiaryName) {
        $this->beneficiaryName = $beneficiaryName;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryAddress1() {
        return $this->beneficiaryAddress1;
    }

    /**
     * @param mixed $beneficiaryAddress1
     */
    public function setBeneficiaryAddress1($beneficiaryAddress1) {
        $this->beneficiaryAddress1 = $beneficiaryAddress1;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryAddress2() {
        return $this->beneficiaryAddress2;
    }

    /**
     * @param mixed $beneficiaryAddress2
     */
    public function setBeneficiaryAddress2($beneficiaryAddress2) {
        $this->beneficiaryAddress2 = $beneficiaryAddress2;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryAddress3() {
        return $this->beneficiaryAddress3;
    }

    /**
     * @param mixed $beneficiaryAddress3
     */
    public function setBeneficiaryAddress3($beneficiaryAddress3) {
        $this->beneficiaryAddress3 = $beneficiaryAddress3;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryAccountNumber() {
        return $this->beneficiaryAccountNumber;
    }

    /**
     * @param mixed $beneficiaryAccountNumber
     */
    public function setBeneficiaryAccountNumber($beneficiaryAccountNumber) {
        $this->beneficiaryAccountNumber = $beneficiaryAccountNumber;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryBankName() {
        return $this->beneficiaryBankName;
    }

    /**
     * @param mixed $beneficiaryBankName
     */
    public function setBeneficiaryBankName($beneficiaryBankName) {
        $this->beneficiaryBankName = $beneficiaryBankName;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryBankAddress1() {
        return $this->beneficiaryBankAddress1;
    }

    /**
     * @param mixed $beneficiaryBankAddress1
     */
    public function setBeneficiaryBankAddress1($beneficiaryBankAddress1) {
        $this->beneficiaryBankAddress1 = $beneficiaryBankAddress1;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryBankAddress2() {
        return $this->beneficiaryBankAddress2;
    }

    /**
     * @param mixed $beneficiaryBankAddress2
     */
    public function setBeneficiaryBankAddress2($beneficiaryBankAddress2) {
        $this->beneficiaryBankAddress2 = $beneficiaryBankAddress2;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryBankAddress3() {
        return $this->beneficiaryBankAddress3;
    }

    /**
     * @param mixed $beneficiaryBankAddress3
     */
    public function setBeneficiaryBankAddress3($beneficiaryBankAddress3) {
        $this->beneficiaryBankAddress3 = $beneficiaryBankAddress3;
    }

    /**
     * @return mixed
     */
    public function getAdditionalBeneficiaryInstructions1() {
        return $this->additionalBeneficiaryInstructions1;
    }

    /**
     * @param mixed $additionalBeneficiaryInstructions1
     */
    public function setAdditionalBeneficiaryInstructions1($additionalBeneficiaryInstructions1) {
        $this->additionalBeneficiaryInstructions1 = $additionalBeneficiaryInstructions1;
    }

    /**
     * @return mixed
     */
    public function getAdditionalBeneficiaryInstructions2() {
        return $this->additionalBeneficiaryInstructions2;
    }

    /**
     * @param mixed $additionalBeneficiaryInstructions2
     */
    public function setAdditionalBeneficiaryInstructions2($additionalBeneficiaryInstructions2) {
        $this->additionalBeneficiaryInstructions2 = $additionalBeneficiaryInstructions2;
    }

    /**
     * @return mixed
     */
    public function getAdditionalBeneficiaryInstructions3() {
        return $this->additionalBeneficiaryInstructions3;
    }

    /**
     * @param mixed $additionalBeneficiaryInstructions3
     */
    public function setAdditionalBeneficiaryInstructions3($additionalBeneficiaryInstructions3) {
        $this->additionalBeneficiaryInstructions3 = $additionalBeneficiaryInstructions3;
    }

    /**
     * @return mixed
     */
    public function getAdditionalBeneficiaryInstructions4() {
        return $this->additionalBeneficiaryInstructions4;
    }

    /**
     * @param mixed $additionalBeneficiaryInstructions4
     */
    public function setAdditionalBeneficiaryInstructions4($additionalBeneficiaryInstructions4) {
        $this->additionalBeneficiaryInstructions4 = $additionalBeneficiaryInstructions4;
    }

    /**
     * @return mixed
     */
    public function getBeneficiaryBankCountryCode() {
        return $this->beneficiaryBankCountryCode;
    }

    /**
     * @param mixed $beneficiaryBankCountryCode
     */
    public function setBeneficiaryBankCountryCode($beneficiaryBankCountryCode) {
        $this->beneficiaryBankCountryCode = $beneficiaryBankCountryCode;
    }

    /**
     * @return mixed
     */
    public function getSwift() {
        return $this->swift;
    }

    /**
     * @param mixed $swift
     */
    public function setSwift($swift) {
        $this->swift = $swift;
    }

    /**
     * @return mixed
     */
    public function getPaymentMethod() {
        return $this->paymentMethod;
    }

    /**
     * @param mixed $paymentMethod
     */
    public function setPaymentMethod($paymentMethod) {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return mixed
     */
    public function getPaymentLegCurrencyCode() {
        return $this->paymentLegCurrencyCode;
    }

    /**
     * @param mixed $paymentLegCurrencyCode
     */
    public function setPaymentLegCurrencyCode($paymentLegCurrencyCode) {
        $this->paymentLegCurrencyCode = $paymentLegCurrencyCode;
    }

    /**
     * @return mixed
     */
    public function getPaymentLegAmount() {
        return $this->paymentLegAmount;
    }

    /**
     * @param mixed $paymentLegAmount
     */
    public function setPaymentLegAmount($paymentLegAmount) {
        $this->paymentLegAmount = $paymentLegAmount;
    }

    /**
     * @return mixed
     */
    public function getDebitAccountBsb() {
        return $this->debitAccountBsb;
    }

    /**
     * @param mixed $debitAccountBsb
     */
    public function setDebitAccountBsb($debitAccountBsb) {
        $this->debitAccountBsb = $debitAccountBsb;
    }

    /**
     * @return mixed
     */
    public function getDebitAccountNumber() {
        return $this->debitAccountNumber;
    }

    /**
     * @param mixed $debitAccountNumber
     */
    public function setDebitAccountNumber($debitAccountNumber) {
        $this->debitAccountNumber = $debitAccountNumber;
    }

    /**
     * @return mixed
     */
    public function getDebitCurrencyCode() {
        return $this->debitCurrencyCode;
    }

    /**
     * @param mixed $debitCurrencyCode
     */
    public function setDebitCurrencyCode($debitCurrencyCode) {
        $this->debitCurrencyCode = $debitCurrencyCode;
    }

    /**
     * @return mixed
     */
    public function getDebitAmount() {
        return $this->debitAmount;
    }

    /**
     * @param mixed $debitAmount
     */
    public function setDebitAmount($debitAmount) {
        $this->debitAmount = $debitAmount;
    }
}
