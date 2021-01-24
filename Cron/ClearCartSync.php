<?php


namespace Custom\clearmagentoshoppingcarts\Cron;


/**
 * Class ClearCartSync
 * @package Custom\clearmagentoshoppingcarts\Cron
 */
class ClearCartSync
{
    /**
     * @var \Psr\Log\LoggerInterface
     */
    protected $logger;

    /**
     * Constructor
     *
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(\Psr\Log\LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * Execute the cron
     */
    public function execute()
    {
    }
}