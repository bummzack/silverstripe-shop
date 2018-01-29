<?php

namespace SilverShop\Core;


use SilverShop\Core\Model\OrderModifier;

class ShippingModifier extends OrderModifier
{
    private static $singular_name = 'Shipping';

    public function required()
    {
        return true; //TODO: make it optional
    }

    public function requiredBeforePlace()
    {
        return true;
    }
}