<?php

namespace BankFeedConvert\Importer;

abstract class AbstractImporter {

    protected $rawData;
    protected $transactions;

    public function loadFromString($string)
    {
        $this->rawData = $string;
    }

    public function loadFromFile($filename)
    {
        $this->rawData = file_get_contents($filename);
    }

    abstract public function import();

    public function getTransactions()
    {
        return $this->transactions;
    }

}