<?php

namespace BankFeedConvert\Importer;

use BankFeedConvert\Transaction;

class IngDiba extends AbstractImporter {

    public function import()
    {
        $csvData = $this->extractAndParseCSVPart();

        $transactions = [];
        foreach ($csvData as $data) {
            $transaction = new Transaction();
            $date = \DateTime::createFromFormat('d.m.Y', $data[1]);
            $transaction->setDate($date->format('Y-m-d'));
            $transaction->setPayee(trim($data[2]));
            $transaction->setMemo(trim($data[4]));
            $transaction->setAmount(floatval(str_replace(',', '.', str_replace('.', '', $data[5]))));
            $transaction->setCurrency($data[6]);
            $transactions[] = $transaction;
        }

        $this->transactions = $transactions;
    }

}