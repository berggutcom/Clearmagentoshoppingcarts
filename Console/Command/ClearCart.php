<?php


namespace Custom\clearmagentoshoppingcarts\Console\Command;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearCart extends Command
{
    protected $_logger;

    public function __construct(
        \Custom\clearmagentoshoppingcarts\Logger\Logger $logger,
        $name = null
    ) {
        $this->_logger = $logger;
        parent::__construct($name);
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this->setName("berggut:cart:clear");
        $this->setDescription("clear all items for cart");
        parent::configure();
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int|void
     */
    protected function execute(
        InputInterface $input,
        OutputInterface $output
    ) {
        $this->_logger->info("Hello logger");
        $output->writeln("execute clear cart using command line");
    }

}