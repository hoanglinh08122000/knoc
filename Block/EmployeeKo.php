<?php
namespace Dtn\Employee\Block;

use Magento\Checkout\Block\Checkout\LayoutProcessorInterface;
use Magento\Framework\View\Element\Template;

class EmployeeKo extends Template
{
    /**
     * @var array|LayoutProcessorInterface[]
     */
    protected $layoutProcessors;

    /**
     * @var \Dtn\Employee\Model\ResourceModel\Employee\CollectionFactory
     */
    protected $_employeeFactory;

    public function __construct(
        \Dtn\Employee\Model\ResourceModel\Employee\CollectionFactory $employeeFactoryFactory,
        Template\Context $context,
        array $layoutProcessors = [],
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->jsLayout = isset($data['jsLayout']) && is_array($data['jsLayout']) ? $data['jsLayout'] : [];
        $this->layoutProcessors = $layoutProcessors;
        $this->_employeeFactory = $employeeFactoryFactory;
    }

    public function getJsLayout()
    {
        foreach ($this->layoutProcessors as $processor) {
            $this->jsLayout = $processor->process($this->jsLayout);
        }
        return \Zend_Json::encode($this->jsLayout);
    }

    public function getEmployee(){
        $employee = $this->_employeeFactory->create();
        return json_encode($employee);
    }
    public function abc(){
        echo "abd";
    }

}
