<?php


namespace Custom\clearmagentoshoppingcarts\Cron;


/**
 * Class ClearCartSync
 * @package Custom\clearmagentoshoppingcarts\Cron
 */
class ClearCartSync
{
    /**
     * @var \Custom\clearmagentoshoppingcarts\Logger\Logger
     */
    private $_logger;

    /**
     * Constructor
     * @param \Custom\clearmagentoshoppingcarts\Logger\Logger $logger
     */
    public function __construct(
        \Custom\clearmagentoshoppingcarts\Logger\Logger $logger
    ){
        $this->_logger = $logger;
    }

    /**
     * Execute the cron
     */
    public function execute()
    {
        $this->_logger->info("running cron job");
    }
}