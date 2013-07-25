<?php

class Ip_Categorymode_Block_List
    extends Mage_Core_Block_Template
    implements Mage_Widget_Block_Interface
{

    function __construct()
    {
        $this->setTemplate('catalog/category/list.phtml');
        parent::__construct();
    }

    public function getResizedImage($image, $width, $height = null, $quality = 100)
    {
        if(!$image){return false;}
        $imageUrl = Mage::getBaseDir('media').DS."catalog".DS."category".DS.$image;
        if(!is_file($imageUrl)){return false;}
        $imageResized = Mage::getBaseDir('media').DS."catalog".DS."category".DS."cache".DS."cat_resized".DS.$image;
        if(!file_exists($imageResized) &&
            file_exists($imageUrl) ||
            file_exists($imageUrl) &&
            filemtime($imageUrl) > filemtime($imageResized)){
            $imageObj = new Varien_Image($imageUrl);
            $imageObj->constrainOnly(true);
            $imageObj->keepAspectRatio(true);
            $imageObj->keepFrame(false);
            $imageObj->quality($quality);
            $imageObj->resize($width,$height);
            $imageObj->save($imageResized);
        }
        if(file_exists($imageResized)){
            return Mage::getBaseUrl('media')."catalog/category/cache/cat_resized/".$image;
        }else{
            return $imageUrl;
        }
    }

}
