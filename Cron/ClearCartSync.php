<?php


namespace Custom\Clearmagentoshoppingcarts\Cron;

use Magento\Framework\ObjectManagerInterface;

/**
 * Class ClearCartSync
 * @package Custom\Clearmagentoshoppingcarts\Cron
 */
class ClearCartSync
{
    /**
     * @var \Custom\Clearmagentoshoppingcarts\Logger\Logger
     */
    private $_logger;

    private $_objectManager;

    /**
     * Constructor
     * @param \Custom\Clearmagentoshoppingcarts\Logger\Logger $logger
     * @param ObjectManagerInterface $objectManager
     */
    public function __construct(
        \Custom\Clearmagentoshoppingcarts\Logger\Logger $logger,
        ObjectManagerInterface $objectManager
    ){
        $this->_logger = $logger;
        $this->_objectManager = $objectManager;
    }

    /**
     * Execute the cron
     */
    public function execute()
    {
        $this->_logger->info("start clear cart: cron");

        $this->clearCart();

        $this->_logger->info("end clear cart: cron");
    }

    public function clearCart(){
        $resource = $this->_objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();

        $table = $connection->getTableName('m9_quote');

        $query = "DELETE FROM " . $table;
        $connection->query($query);
    }
}