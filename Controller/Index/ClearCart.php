<?php


namespace Custom\Clearmagentoshoppingcarts\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Checkout\Model\Cart;
use Magento\Checkout\Model\Session as CheckoutSession;

class ClearCart extends Action
{

    protected $_modelCart;
    protected $_checkoutSession;

    public function __construct(CheckoutSession $checkoutSession,Cart $modelCart, Context $context)
    {
        $this->_checkoutSession = $checkoutSession;
        $this->_modelCart = $modelCart;
        parent::__construct($context);
    }

    /**
     * @return ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        // TODO: Implement execute() method.
        $cart = $this->_modelCart;
        $quoteItems = $this->_checkoutSession->getQuote()->getItemsCollection();
        foreach($quoteItems as $item)
        {
            $cart->removeItem($item->getId())->save();
        }
    }
}