<?php

namespace BankFeedConvert\Exporter;

abstract class AbstractExporter {

    protected $transactions;

    public function __construct($transactions)
    {
        $this->transactions = $transactions;
    }

    abstract public function export($filename = false);

}