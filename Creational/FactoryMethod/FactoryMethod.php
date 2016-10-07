<?php

interface IPayPal
{
    public function pay();
}

abstract class FactoryMethod
{
    abstract protected function createInstance($paymentType);

    public function instantiate($paymentType)
    {
        return $this->createInstance($paymentType);
    }
}

abstract class PaymentFactoryMethod
{
    abstract protected function createInstance($paymentType);
    public function instantiate($paymentType)
    {
        return $this->createInstance($paymentType);
    }
}
class PayPalFactory extends PaymentFactoryMethod
{
    protected function createInstance($paymentType)
    {
        switch ($paymentType) {
            case 'cash':
                return new PayPalCash();
            case 'card':
                return new PayPalCard();
            default:
                throw new Exception('blabla');
        }
    }
}
class PayPalCard implements IPayPal
{
    protected $sum;
    public function __construct($sum)
    {
        $this->sum = $sum;
    }
    public function pay()
    {
        return "payed {$this->sum}$";
    }
}
$factory = new PayPalFactory();
$sum     = 100;
$factory->instantiate('card')->pay($sum);
