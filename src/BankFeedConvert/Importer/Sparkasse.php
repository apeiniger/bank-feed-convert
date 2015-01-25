<?php

namespace BankFeedConvert\Importer;

use BankFeedConvert\Transaction;

class Sparkasse extends AbstractImporter {

    public function import()
    {
        $lines = explode("\n", $this->rawData);

        // remove first line (info section)
        unset($lines[0]);

        $transactions = [];
        foreach ($lines as $line) {
            if (!empty($line)) {
                $data = str_getcsv($line, ';', '"');
                $transaction = new Transaction();
                $date = \DateTime::createFromFormat('d.m.y', $data[1]);
                $transaction->setDate($date->format('Y-m-d'));
                $transaction->setPayee(trim($data[5]));
                $transaction->setMemo(trim($data[4]));
                $transaction->setAmount(floatval(str_replace(',', '.', str_replace('.', '', $data[8]))));
                $transaction->setCurrency($data[9]);
                $transactions[] = $transaction;
            }
        }

        $this->transactions = $transactions;
    }

}