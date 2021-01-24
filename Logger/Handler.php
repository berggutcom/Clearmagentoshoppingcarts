<?php


namespace Custom\clearmagentoshoppingcarts\Logger;


class Handler extends \Magento\Framework\Logger\Handler\Base
{
    protected $loggerType = Logger::INFO;

    protected $fileName = '/var/log/clear_cart.log';
}