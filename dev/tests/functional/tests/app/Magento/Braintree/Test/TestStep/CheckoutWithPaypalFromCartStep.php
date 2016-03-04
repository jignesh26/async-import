<?php
/**
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Braintree\Test\TestStep;

use Magento\Mtf\TestStep\TestStepInterface;
use Magento\Checkout\Test\Page\CheckoutCart;

/**
 * Checkout with Braintree PayPal from Shopping Cart.
 */
class CheckoutWithPaypalFromCartStep implements TestStepInterface
{
    /**
     * Shopping Cart page.
     *
     * @var CheckoutCart
     */
    protected $checkoutCart;

    /**
     * @constructor
     * @param CheckoutCart $checkoutCart
     */
    public function __construct(CheckoutCart $checkoutCart)
    {
        $this->checkoutCart = $checkoutCart;
    }

    /**
     * Checkout with Braintree PayPal from Shopping Cart.
     *
     * @return void
     */
    public function run()
    {
        $this->checkoutCart->open();
        $this->checkoutCart->getCartBlock()
            ->braintreePaypalCheckout();
        $this->checkoutCart->getBraintreePaypalBlock()->process();
    }
}