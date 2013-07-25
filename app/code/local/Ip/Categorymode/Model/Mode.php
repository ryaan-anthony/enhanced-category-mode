<?php
class Ip_Categorymode_Model_Mode extends Mage_Catalog_Model_Category_Attribute_Source_Mode
{
    const DM_CATEGORY            = 'CATEGORIES';

    public function getAllOptions()
    {
        if (!$this->_options) {
            $this->_options = array(
                array(
                    'value' => Mage_Catalog_Model_Category::DM_PRODUCT,
                    'label' => Mage::helper('catalog')->__('Products only'),
                ),
                array(
                    'value' => Mage_Catalog_Model_Category::DM_PAGE,
                    'label' => Mage::helper('catalog')->__('Static block only'),
                ),
                array(
                    'value' => Mage_Catalog_Model_Category::DM_MIXED,
                    'label' => Mage::helper('catalog')->__('Static block and products'),
                ),
                array(
                    'value' => self::DM_CATEGORY,
                    'label' => Mage::helper('catalog')->__('Child Categories'),
                )
            );
        }
        return $this->_options;
    }

}