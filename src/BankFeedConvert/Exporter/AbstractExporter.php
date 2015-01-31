<?php

namespace BankFeedConvert\Exporter;

abstract class AbstractExporter {

    protected $transactions;
    protected $options;

    public function __construct($transactions, $options=[])
    {
        $this->transactions = $transactions;
        $this->options = $options;
    }

    abstract public function export($filename = false);

}