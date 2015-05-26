<?php

namespace AbaIntFileGenerator\Model;

interface IntTransactionInterface {

    /**
     * Bank account name for this transaction.
     *
     * @return string
     */
    public function getCurrency();

    /**
     * Return the transaction amount in cents.
     *
     * @return integer
     */
    public function getPaymentAmount();

    /**
     * Return the transaction amount in cents.
     *
     * @return \Datetime
     */
    public function getDate();

    /**
     * Description of transaction to appear on recipients bank statement.
     *
     * @return string
     */
    public function getReference();

    /**
     * Return the beneficiary name as a string.
     *
     * @return string
     */
    public function getBeneficiaryName();

    /**
     * Return the beneficiary address1.
     *
     * @return string
     */
    public function getBeneficiaryAddress1();

    /**
     * Return the beneficiary address2. Can only contain characters in character set
     *
     * @return string
     */
    public function getBeneficiaryAddress2();

    /**
     * Return the beneficiary address3. Country ISO code
     *
     * @return string
     */
    public function getBeneficiaryAddress3();

    /**
     * Return the account number as a string. Must be 9 digits or less.
     *
     * @return string
     */
    public function getBeneficiaryAccountNumber();

    /**
     * Return the beneficiary bank name. Beneficiary BIC Address (i.e. Bank SWIFT Code) AND Beneficiary Bank Country Code
     *
     * @return string
     */
    public function getBeneficiaryBankName();

    /**
     * Return the beneficiary bank address1. Can only contain characters in character set
     *
     * @return string
     */
    public function getBeneficiaryBankAddress1();

    /**
     * Return the beneficiary bank address2. Can only contain characters in character set
     *
     * @return string
     */
    public function getBeneficiaryBankAddress2();

    /**
     * Return the beneficiary bank address3. Can only contain characters in character set
     *
     * @return string
     */
    public function getBeneficiaryBankAddress3();

    /**
     * Return the beneficiary bank country code. ISO country code
     *
     * @return string
     */
    public function getBeneficiaryBankCountryCode();

    /**
     * Return payment method.
     *
     * @return string
     */
    public function getPaymentMethod();

    /**
     * Return Payment Leg Currency Code
     *
     * @return string
     */
    public function getPaymentLegCurrencyCode();

    /**
     * Return Payment Leg Currency Code
     *
     * @return string
     */
    public function getPaymentLegAmount();

    /**
     * Return Debit Account BSB. Debit Account must be a NAB Account registered to NAB Connect.
     *
     * @return string
     */
    public function getDebitAccountBsb();

    /**
     * Return Refinance Indicator
     *
     * @return integer
     */
    public function getRefinanceIndicator();
}
