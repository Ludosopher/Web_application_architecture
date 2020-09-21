<?php


namespace Service\Order;


use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class CheckoutProcess
{
    private $billing;
    private $discount;
    private $communication;
    private $security;

    public function __construct(BasketBuilder $basketBuilder)
    {
        $this->billing = $basketBuilder->getBilling();
        $this->discount = $basketBuilder->getDiscount();
        $this->communication = $basketBuilder->getCommunication();
        $this->security = $basketBuilder->getSecurity();
    }

    public function checkoutProcess(float $totalPrice): void
    {
        $discount = $this->discount->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $this->billing->pay($totalPrice);

        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }
}