<?php
namespace Dtn\Employee\Controller\EmployeeKo;

use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Helper\Image;
use Magento\Store\Model\StoreManager;

class Product extends \Magento\Framework\App\Action\Action
{
    protected $_pageFactory;
    /**
     * @var ProductFactory
     */
    protected $productFactory;

    /**
     * @var Image
     */
    protected $imageHelper;

    protected $listProduct;

    /**
     * @var StoreManager
     */
    protected $_storeManager;
    /**
     * @var
     */
    protected $employee;

    public function __construct(
        \Magento\Framework\App\Action\Context $context,
        \Magento\Framework\Data\Form\FormKey $formKey,
        ProductFactory $productFactory,
        StoreManager $storeManager,
        Image $imageHelper,
        \Dtn\Employee\Model\ResourceModel\Employee\CollectionFactory $employee,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        $this->productFactory = $productFactory;
        $this->imageHelper = $imageHelper;
        $this->_storeManager = $storeManager;
        $this->employee = $employee;
        parent::__construct($context);
    }

    public function getCollection()
    {
        return $this->productFactory->create()
            ->getCollection()
            ->addAttributeToSelect('*')
            ->setPageSize(5)
            ->setCurPage(1);
    }

    public function execute()
    {
        if ($id = $this->getRequest()->getParam('id')) {
            $employee = $this->employeefactory->create()->load($id);

            $productData = [
                'id' => $employee->getEmployee_Id(),
                'name' => $employee->getDepartment()
           ];

           echo json_encode($productData);
           return;
       }
    }
}
