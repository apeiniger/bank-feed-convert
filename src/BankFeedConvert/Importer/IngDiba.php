<?php

namespace BankFeedConvert\Importer;

use BankFeedConvert\Transaction;

class IngDiba extends AbstractImporter {

    public function import()
    {
        $lines = explode("\n", $this->rawData);

        // remove first 8 lines (info section)
        for ($i=0; $i<=7; $i++) {
            unset($lines[$i]);
        }

        $transactions = [];
        foreach ($lines as $line) {
            if (!empty($line)) {
                $data = str_getcsv($line, ';', '"');
                $transaction = new Transaction();
                $date = \DateTime::createFromFormat('d.m.Y', $data[1]);
                $transaction->setDate($date->format('Y-m-d'));
                $transaction->setPayee(trim($data[2]));
                $transaction->setMemo(trim($data[4]));
                $transaction->setAmount(floatval(str_replace(',', '.', str_replace('.', '', $data[5]))));
                $transaction->setCurrency($data[6]);
                $transactions[] = $transaction;
            }
        }

        $this->transactions = $transactions;
    }

}