<?php

namespace BankFeedConvert\Importer;

use BankFeedConvert\Transaction;

class MilesAndMoreCreditcard extends AbstractImporter {

    public function import()
    {
        $csvData = $this->extractAndParseCSVPart();

        $transactions = [];
        foreach ($csvData as $data) {
            $transaction = new Transaction();
            $date = \DateTime::createFromFormat('Y-m-d', $data[3]);
            $transaction->setDate($date->format('Y-m-d'));
            $transaction->setPayee(trim($data[5]));
            $transaction->setMemo(trim($data[6]));
            if ($data[7] != $data[11]) {
                if ($data[9] === 'H') {
                    $transaction->setSrcAmount(floatval(str_replace(',', '.', str_replace('.', '', $data[8]))));
                } else {
                    $transaction->setSrcAmount(-1*floatval(str_replace(',', '.', str_replace('.', '', $data[8]))));
                }
                $transaction->setSrcCurrency($data[7]);
            }
            if ($data[13] === 'H') {
                $transaction->setAmount(floatval(str_replace(',', '.', str_replace('.', '', $data[12]))));
            } else {
                $transaction->setAmount(-1*floatval(str_replace(',', '.', str_replace('.', '', $data[12]))));
            }
            $transaction->setCurrency($data[11]);
            $transactions[] = $transaction;
        }

        $this->transactions = $transactions;
    }

}