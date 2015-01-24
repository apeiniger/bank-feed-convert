<?php

namespace Test\Importer;

use BankFeedConvert\Importer\IngDiba;

class IngDibaTest extends \PHPUnit_Framework_TestCase {

    public function testImport()
    {
        $imp = new IngDiba();
        $imp->loadFromFile(__DIR__.'/resources/ingdiba.csv');

        $imp->import();

        $transactions = $imp->getTransactions();
        $this->assertEquals(4, count($transactions));
        $this->assertEquals('2014-12-29', $transactions[3]->getDate());
        $this->assertEquals('Salary', $transactions[2]->getMemo());
        $this->assertEquals(-100.5, $transactions[0]->getAmount());
    }

}