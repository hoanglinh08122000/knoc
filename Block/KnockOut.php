<?php

namespace Dtn\Employee\Block;

class KnockOut extends \Magento\Framework\View\Element\Template{

    /**
     * @var array|\Magento\Checkout\Block\Checkout\LayoutProcessorInterface[]
     */
    protected $layoutProcessors;

    /**
     * @var \Dtn\Employee\Model\ResourceModel\Employee\CollectionFactory
     */
    protected $employee;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Dtn\Employee\Model\ResourceModel\Employee\CollectionFactory $employeeFactoryFactory,
        array $layoutProcessors = [],
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->jsLayout = isset($data['jsLayout']) && is_array($data['jsLayout']) ? $data['jsLayout'] : [];
        $this->layoutProcessors = $layoutProcessors;
        $this->employee = $employeeFactoryFactory;
    }

    public function getJsLayout()
    {
        foreach ($this->layoutProcessors as $processor) {
            $this->jsLayout = $processor->process($this->jsLayout);
        }
        return \Zend_Json::encode($this->jsLayout);
    }
    public function getEmployee(){
        $employee = $this->employee->create();
        return $employee;
    }
}
