<?php

namespace BankFeedConvert\Importer;

class Sparkasse extends AbstractImporter {

    public function import()
    {
        $this->transactions = [];
    }

}