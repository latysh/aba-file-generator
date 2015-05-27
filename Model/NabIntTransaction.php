<?php

namespace NabAbaIntFileGenerator\Model;

use NabAbaIntFileGenerator\Model;

class NabIntTransaction implements NabIntTransactionInterface {
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
    private $overseasBankCharges;
    private $remitterName;
    private $refinanceDays;
    private $refinanceDate;
    private $additionalBeneficiaryInstructions1;
    private $additionalBeneficiaryInstructions2;
    private $additionalBeneficiaryInstructions3;
    private $additionalBeneficiaryInstructions4;
    private $additionalInstructionsToNab;
    private $beneficiaryBankCountryCode;
    private $swift;
    private $routingType;
    private $routingCode;
    private $originatingApplicantDetails1;
    private $originatingApplicantDetails2;
    private $originatingApplicantDetails3;
    private $originatingApplicantDetails4;
    private $numberOfDetailRecords;

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
    public function getOverseasBankCharges() {
        return $this->overseasBankCharges;
    }

    /**
     * @param mixed $overseasBankCharges
     */
    public function setOverseasBankCharges($overseasBankCharges) {
        $this->overseasBankCharges = $overseasBankCharges;
    }

    /**
     * @return mixed
     */
    public function getRemitterName() {
        return $this->remitterName;
    }

    /**
     * @param mixed $remitterName
     */
    public function setRemitterName($remitterName) {
        $this->remitterName = $remitterName;
    }

    /**
     * @return mixed
     */
    public function getRefinanceDays() {
        return $this->refinanceDays;
    }

    /**
     * @param mixed $refinanceDays
     */
    public function setRefinanceDays($refinanceDays) {
        $this->refinanceDays = $refinanceDays;
    }

    /**
     * @return mixed
     */
    public function getRefinanceDate() {
        return $this->refinanceDate;
    }

    /**
     * @param mixed $refinanceDate
     */
    public function setRefinanceDate($refinanceDate) {
        $this->refinanceDate = $refinanceDate;
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
    public function getAdditionalInstructionsToNab() {
        return $this->additionalInstructionsToNab;
    }

    /**
     * @param mixed $additionalInstructionsToNab
     */
    public function setAdditionalInstructionsToNab($additionalInstructionsToNab) {
        $this->additionalInstructionsToNab = $additionalInstructionsToNab;
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
    public function getRoutingType() {
        return $this->routingType;
    }

    /**
     * @param mixed $routingType
     */
    public function setRoutingType($routingType) {
        $this->routingType = $routingType;
    }

    /**
     * @return mixed
     */
    public function getRoutingCode() {
        return $this->routingCode;
    }

    /**
     * @param mixed $routingCode
     */
    public function setRoutingCode($routingCode) {
        $this->routingCode = $routingCode;
    }

    /**
     * @return mixed
     */
    public function getOriginatingApplicantDetails1() {
        return $this->originatingApplicantDetails1;
    }

    /**
     * @param mixed $originatingApplicantDetails1
     */
    public function setOriginatingApplicantDetails1($originatingApplicantDetails1) {
        $this->originatingApplicantDetails1 = $originatingApplicantDetails1;
    }

    /**
     * @return mixed
     */
    public function getOriginatingApplicantDetails2() {
        return $this->originatingApplicantDetails2;
    }

    /**
     * @param mixed $originatingApplicantDetails2
     */
    public function setOriginatingApplicantDetails2($originatingApplicantDetails2) {
        $this->originatingApplicantDetails2 = $originatingApplicantDetails2;
    }

    /**
     * @return mixed
     */
    public function getOriginatingApplicantDetails3() {
        return $this->originatingApplicantDetails3;
    }

    /**
     * @param mixed $originatingApplicantDetails3
     */
    public function setOriginatingApplicantDetails3($originatingApplicantDetails3) {
        $this->originatingApplicantDetails3 = $originatingApplicantDetails3;
    }

    /**
     * @return mixed
     */
    public function getOriginatingApplicantDetails4() {
        return $this->originatingApplicantDetails4;
    }

    /**
     * @param mixed $originatingApplicantDetails4
     */
    public function setOriginatingApplicantDetails4($originatingApplicantDetails4) {
        $this->originatingApplicantDetails4 = $originatingApplicantDetails4;
    }

    /**
     * @return mixed
     */
    public function getNumberOfDetailRecords() {
        return $this->numberOfDetailRecords;
    }

    /**
     * @param mixed $numberOfDetailRecords
     */
    public function setNumberOfDetailRecords($numberOfDetailRecords) {
        $this->numberOfDetailRecords = $numberOfDetailRecords;
    }


}
