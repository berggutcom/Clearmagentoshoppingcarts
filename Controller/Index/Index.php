<?php


namespace Custom\Clearmagentoshoppingcarts\Controller\Index;

use Magento\Checkout\Model\Cart as CustomerCart;

class Index extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $checkoutSession;
    /**
     * @var \Magento\Checkout\Model\Cart
     */
    protected $cart;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Checkout\Model\Session $checkoutSession,
        CustomerCart $cart,
        \Magento\Framework\View\Result\PageFactory $pageFactory)
    {
        $this->_pageFactory = $pageFactory;
        $this->checkoutSession = $checkoutSession;
        $this->cart = $cart;

        return parent::__construct($context);
    }

    public function execute()
    {
        $objectManager = \Magento\Framework\App\ObjectManager::getInstance();
        $cart = $objectManager->get('\Magento\Checkout\Model\Cart');
        $allItems = $cart->getQuote()->getAllVisibleItems();
        foreach ($allItems as $item) {
            $itemId = $item->getItemId();
            $cart->removeItem($itemId)->save();
        }

        return $this->_pageFactory->create();
    }
}