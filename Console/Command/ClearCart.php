<?php


namespace Custom\Clearmagentoshoppingcarts\Console\Command;

use Magento\Framework\App\State;
use Magento\Framework\ObjectManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ClearCart extends Command
{
    protected $_logger;

    private $_objectManager;

    protected $_appState;

    public function __construct(
        \Custom\Clearmagentoshoppingcarts\Logger\Logger $logger,
        ObjectManagerInterface $objectManager,
        State $appState
    ) {
        parent::__construct();
        $this->_logger = $logger;
        $this->_objectManager = $objectManager;
        $this->_appState = $appState;
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
        $this->_appState->setAreaCode('frontend');

        $this->_logger->info("start clear cart: command");
        $output->writeln("start clear cart: command");

        $this->clearCart();

        $this->_logger->info("end clear cart: command");
        $output->writeln("end clear cart using command");
    }

    public function clearCart(){
        $resource = $this->_objectManager->get('Magento\Framework\App\ResourceConnection');
        $connection = $resource->getConnection();

        $table = $connection->getTableName('m9_quote');

        $query = "DELETE FROM " . $table;
        $connection->query($query);
    }
}