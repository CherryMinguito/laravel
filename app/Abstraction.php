<?php

class ReceiptGenerator
{
    private $transaction;
    private $receipt;

    public function __construct(Transaction $transaction)
    {
        $this->transaction = $transaction;
        $this->createReceipt();
    }

    private function createReceipt()
    {
        $this->receipt = new ReceiptDocument($this->transaction);
    }

    private function printReceipt()
    {
        $this->receipt->print();
    }
}

abstract class Document
{
   public $body;

   protected function format()
   {

   }

    protected function print()
    {
        $printer = new Printer();
        $printer->print($this->body);
    }
}


Class ReceiptDocument extends Document
{
   public function __construct(Transaction $trasaction)
   {
       $this->formatBody($trasaction);
   }

   private function formatBody(Transaction $trasaction)
   {
       return $this->body =  $transaction->map(function($item) {
           return formatLineByItem($item);
       })->implode(PHP_EOL);
   }

    private function formatLineByItem(array $item): string
    {
        return ucwords($this->item . "       " . $this->value);
    }
}