<?php

namespace BankFeedConvert;

class Transaction {

    protected $date;
    protected $payee;
    protected $memo;
    protected $srcCurrency;
    protected $srcAmount;
    protected $currency;
    protected $amount;

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getPayee()
    {
        return $this->payee;
    }

    /**
     * @param mixed $payee
     */
    public function setPayee($payee)
    {
        $this->payee = $payee;
    }

    /**
     * @return mixed
     */
    public function getMemo()
    {
        return $this->memo;
    }

    /**
     * @param mixed $memo
     */
    public function setMemo($memo)
    {
        $this->memo = $memo;
    }

    /**
     * @return mixed
     */
    public function getSrcCurrency()
    {
        return $this->srcCurrency;
    }

    /**
     * @param mixed $srcCurrency
     */
    public function setSrcCurrency($srcCurrency)
    {
        $this->srcCurrency = $srcCurrency;
    }

    /**
     * @return mixed
     */
    public function getSrcAmount()
    {
        return $this->srcAmount;
    }

    /**
     * @param mixed $srcAmount
     */
    public function setSrcAmount($srcAmount)
    {
        $this->srcAmount = $srcAmount;
    }

    /**
     * @return mixed
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * @param mixed $currency
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;
    }

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

}