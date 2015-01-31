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

    protected function extractAndParseCSVPart()
    {
        $lines = explode("\n", $this->rawData);

        // Find first row that can be parsed and that has more than 5 columns
        $firstRealRow = null;
        $separator = null;
        foreach ($lines as $i => $row) {
            $colsWithSemicolon = count(explode(";", $row));
            if ($colsWithSemicolon > 5) {
                $firstRealRow = $i;
                $separator = ";";
                break;
            }
            $colsWithComma = count(explode(",", $row));
            if ($colsWithComma > 5) {
                $firstRealRow = $i;
                $separator = ",";
                break;
            }
        }

        if ($firstRealRow === null) {
            throw new \Exception('Could not find and parse CSV part in file.');
        }

        $returnArray = [];
        for ($i=$firstRealRow+1; $i<count($lines)-1; $i++) {
            if (!empty($lines[$i])) {
                $returnArray[] = str_getcsv($lines[$i], $separator, '"');
            }
        }

        return $returnArray;
    }

}