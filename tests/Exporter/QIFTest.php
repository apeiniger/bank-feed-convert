<?php

namespace Test\Exporter;

use BankFeedConvert\Exporter\QIF;
use BankFeedConvert\Importer\IngDiba;

class QIFTest extends \PHPUnit_Framework_TestCase {

    public function testExport()
    {
        $imp = new IngDiba();
        $imp->loadFromFile(__DIR__.'/../Importer/resources/ingdiba.csv');
        $imp->import();
        $transactions = $imp->getTransactions();

        $qif = new QIF($transactions);
        $export = $qif->export();

        $lines = explode("\n", $export);

        $this->assertEquals(22, count($lines));
        $this->assertEquals('!Type:Bank', $lines[0]);
        $this->assertEquals('', $lines[count($lines)-1]);
        $this->assertEquals('D19/01/2015', $lines[6]);
    }

}