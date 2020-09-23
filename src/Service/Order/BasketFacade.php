<?php


namespace Service\Order;


use Service\Billing\BillingInterface;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\User\SecurityInterface;

class BasketFacade
{
    private $discount;
    private $billing;
    public $security;
    private $communication;

    public function __construct(
        DiscountInterface $discount,
        BillingInterface $billing,
        CommunicationInterface $communication
    )
    {
        $this->discount = $discount;
        $this->billing = $billing;
        $this->communication = $communication;
    }

    public function checkout(float $totalPrice): void
    {
        $discount = $this->discount->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        $this->billing->pay($totalPrice);

        $user = $this->security->getUser();
        $this->communication->process($user, 'checkout_template');
    }
}