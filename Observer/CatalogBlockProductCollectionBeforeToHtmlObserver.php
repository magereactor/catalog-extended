<?php
namespace MageReactor\CatalogExtended\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use MageReactor\CatalogExtended\Helper\Data;
use MageReactor\CatalogExtended\Model\ModifyProductCollectionBeforeToHtml;

class CatalogBlockProductCollectionBeforeToHtmlObserver implements ObserverInterface
{
    /**
     * @var Data
     */
    private Data $helper;

    /**
     * @var ModifyProductCollectionBeforeToHtml
     */
    private ModifyProductCollectionBeforeToHtml $modifyCollection;

    /**
     * @param Data $helper
     */
    public function __construct(
        Data $helper,
        ModifyProductCollectionBeforeToHtml $modifyCollection
    ){
        $this->helper = $helper;
        $this->modifyCollection = $modifyCollection;
    }

    /**
     * @param Observer $observer
     * @return $this|void
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function execute(Observer $observer)
    {
        $productCollection = $observer->getEvent()->getCollection();
        if(
            $this->helper->isAllowed() &&
            $this->helper->getGeneralConfig("enabled") &&
            $attributeCode = $this->helper->getGeneralConfig("attribute_code")
        ) {
            $this->modifyCollection->getModifiedCollection($productCollection, $attributeCode);
        }
        return $this;
    }
}
