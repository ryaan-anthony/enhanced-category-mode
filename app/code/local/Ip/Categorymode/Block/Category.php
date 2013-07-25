<?php

class Ip_Categorymode_Block_Category extends Mage_Catalog_Block_Category_View
{

    public function getCategoryBlockHtml()
    {
        if (!$this->getData('category_block_html')) {
            $html = $this->getLayout()->createBlock('categorymode/list')
                ->setBlockId($this->getCurrentCategory()->getLandingPage())
                ->setData('category_collection', $this->getCategoryCollection())
                ->toHtml();
            $this->setData('category_block_html', $html);
        }
        return $this->getData('category_block_html');
    }

    public function getCategoryCollection()
    {
        $currCat = $this->getCurrentCategory();
        return Mage::getModel('catalog/category')
            ->load($currCat->getEntityId())
            ->getChildrenCategories();
    }

    public function isCategoryMode()
    {
        return $this->getCurrentCategory()->getDisplayMode() == Ip_Categorymode_Model_Mode::DM_CATEGORY;
    }

    public function getProductListHtml()
    {
        if($this->isCategoryMode()){
            return $this->getCategoryBlockHtml();
        }
        return $this->getChildHtml('product_list');
    }

}