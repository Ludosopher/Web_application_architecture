<?php


namespace Service\Order;


use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\User\Security;

class BasketBuilder
{
    private $billing;
    private $discount;
    private $communication;
    private $security;

    public function setBilling(Card $billing)
    {
        $this->billing = $billing;
    }

    public function getBilling(): Card
    {
        return $this->billing;
    }

    public function setDiscount(NullObject $discount)
    {
        $this->discount = $discount;
    }

    public function getDiscount(): NullObject
    {
        return $this->discount;
    }

    public function setCommunication(Email $communication)
    {
        $this->communication = $communication;
    }

    public function getCommunication(): Email
    {
        return $this->communication;
    }

    public function setSecurity(Security $security)
    {
        $this->security = $security;
    }

    public function getSecurity(): Security
    {
        return $this->security;
    }

    public function build(): CheckoutProcess
    {
        return new CheckoutProcess($this);
    }
}