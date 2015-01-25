<?php

namespace Test\Importer;

use BankFeedConvert\Importer\MilesAndMoreCreditcard;

class MilesAndMoreCreditcardTest extends \PHPUnit_Framework_TestCase {

    public function testImport()
    {
        $imp = new MilesAndMoreCreditcard();
        $imp->loadFromFile(__DIR__.'/resources/milesandmore-creditcard.csv');

        $imp->import();

        $transactions = $imp->getTransactions();
        $this->assertEquals(4, count($transactions));
        $this->assertEquals('2014-09-15', $transactions[3]->getDate());
        $this->assertEquals('Google.COM/CH  USA', $transactions[2]->getMemo());
        $this->assertEquals(-59.95, $transactions[0]->getAmount());
        $this->assertEquals(3.69, $transactions[3]->getAmount());
    }

}