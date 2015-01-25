<?php

namespace Test\Importer;

use BankFeedConvert\Importer\Sparkasse;

class SparkasseTest extends \PHPUnit_Framework_TestCase {

    public function testImport()
    {
        $imp = new Sparkasse();
        $imp->loadFromFile(__DIR__.'/resources/sparkasse-csv-mt940.csv');

        $imp->import();

        $transactions = $imp->getTransactions();
        $this->assertEquals(4, count($transactions));
        $this->assertEquals('2015-01-23', $transactions[3]->getDate());
        $this->assertEquals('Ersatzkarte', $transactions[2]->getMemo());
        $this->assertEquals(-68.04, $transactions[0]->getAmount());
    }

}