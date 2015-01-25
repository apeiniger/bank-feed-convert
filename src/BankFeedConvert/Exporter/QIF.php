<?php

namespace BankFeedConvert\Exporter;

class QIF extends AbstractExporter {

    public function export($filename = false)
    {
        $export = '!Type:Bank'."\n";

        foreach ($this->transactions as $transaction) {
            $date = \DateTime::createFromFormat('Y-m-d', $transaction->getDate());
            $export .= 'D'.$date->format('d/m/Y')."\n";
            $export .= 'P'.$transaction->getPayee()."\n";
            $export .= 'M'.$transaction->getMemo()."\n";
            $export .= 'T'.number_format($transaction->getAmount(), 2, '.', '')."\n";
            $export .= '^'."\n";
        }

        if ($filename) {
            file_put_contents($filename, $export);
            return true;
        }

        return $export;
    }

}