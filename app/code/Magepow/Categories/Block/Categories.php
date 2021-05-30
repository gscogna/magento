<?php
/*
 * @category: Magepow
 * @copyright: Copyright (c) 2014 Magepow (http://www.magepow.com/)
 * @licence: http://www.magepow.com/license-agreement
 * @author: MichaelHa
 * @create date: 2019-11-29 17:19:50
 * @LastEditors: MichaelHa
 * @LastEditTime: 2019-12-04 11:04:26
 */

namespace Magepow\Categories\Block;

class Categories extends \Magento\Framework\View\Element\Template implements \Magento\Framework\DataObject\IdentityInterface
{
    const DEFAULT_CACHE_TAG = 'MAGEPOW_CATEGORIES';

    const XML_PATH = 'category_page';

    const MEDIA_PATH = 'catalog/category';
    
    public $helper;

    public $storeManager;

    public $viewAssetRepo;
    
    public $coreRegistry;

    public $categoryFactory;

    public $catalogHelperOutput;

    /**
     * @var \Magento\Framework\Image\AdapterFactory
     */
    protected $_imageFactory;

    protected $_filesystem;
    
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Image\AdapterFactory $imageFactory,
        \Magento\Framework\View\Asset\Repository $viewAssetRepo,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Catalog\Helper\Output $catalogHelperOutput,
        \Magento\Store\Model\StoreManagerInterface $storeManager,
        \Magepow\Categories\Helper\Data $helper,
        array $data = []
    ) {    
        $this->storeManager        = $storeManager;
        $this->viewAssetRepo       = $viewAssetRepo;
        $this->coreRegistry        = $coreRegistry;
        $this->categoryFactory     = $categoryFactory;
        $this->catalogHelperOutput = $catalogHelperOutput;
        $this->_imageFactory       = $imageFactory;
        $this->_filesystem         = $context->getFilesystem();
        $this->_directoryRed       = $this->_filesystem->getDirectoryRead(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
        $this->helper              = $helper;

        parent::__construct($context, $data);
    }

    protected function getCacheLifetime()
    {
        return parent::getCacheLifetime() ?: 86400;
    }

    public function getCacheKeyInfo()
    {
        $keyInfo     =  parent::getCacheKeyInfo();
        $categoryId  =  $this->getCurrentCategory() ? $this->getCurrentCategory()->getId() : 0;
        $keyInfo[]   =  $categoryId;
        return $keyInfo;
    }

    /**
     * @return array
     */
    public function getIdentities()
    {
        $categoryId  = $this->getCurrentCategory() ? $this->getCurrentCategory()->getId() : 0;
        return [self::DEFAULT_CACHE_TAG, self::DEFAULT_CACHE_TAG . '_' . $categoryId];
    }

    public function getLayout() 
    {
        return $this->helper->getConfig(self::XML_PATH . '/layout');
    }

    public function getHeading() 
    {
        return $this->helper->getConfig(self::XML_PATH . '/heading');
    }    

    public function isShowDescription() 
    {
        return $this->helper->getConfig(self::XML_PATH . '/description');
    }    

    public function getSortAttribute() 
    {
        return $this->helper->getConfig(self::XML_PATH . '/sort_attribute');
    } 

    public function getExcludeCategory()
    {
        return $this->helper->getConfig(self::XML_PATH . '/exclude_category');
    }

    public function getCurrentCategory()
    {
        return $this->coreRegistry->registry('current_category');
    }

    public function getCategories()
    {

        $category = $this->getCurrentCategory();
        if(!$category) return;

        $categoryId = $category->getId();

        if ($this->isExcluded($categoryId)) return;

        $sortAttribute = $this->getSortAttribute();  
        $model = $this->categoryFactory->create();
        $categories = $model->getCollection()
        ->addAttributeToSelect(['name', 'url_key', 'url_path', 'image','description'])
        // ->addAttributeToFilter('include_in_menu', 1)
        ->addAttributeToFilter('parent_id', $categoryId)
        ->addAttributeToSort($sortAttribute)
        ->addIsActiveFilter();

        return $categories;
    }

    public function getDescription($category)
    {
        $description = $category->getDescription();
        if ($description) {
            $categoryDescription = $this->catalogHelperOutput
            ->categoryAttribute($category, $description, 'description');
        } else {
            $categoryDescription = '';
        }
        return trim($categoryDescription);
    }

    public function getImage($image)
    {
        return $this->getImageUrl($image);
    }

    public function getImageInfo($image)
    {
        if(is_object($image)){
            $img = $image->getImage();
            if(!$img) return $image;
        } else {
            $img = $image;
        }
        $_image  = $this->_imageFactory->create();
        $absPath = $this->_directoryRed->getAbsolutePath() . str_replace('/pub/media/', '',  $img);
        if(file_exists($absPath) ){
            $_image->open($absPath);
            return $_image;
        }
        return $image;
    }

    public function getImageUrl($image)
    {
        if(is_object($image)) $image = $image->getImage();
        $image = substr($image, strpos($image, "media/") + strlen('media/'));
        if($image) {
            $url = $this->storeManager->getStore()->getBaseUrl( \Magento\Framework\UrlInterface::URL_TYPE_MEDIA ) . $image;
        } else {
            $url = $this->viewAssetRepo->getUrl('Magento_Catalog::images/product/placeholder/small_image.jpg');
        }
        return $url;
    }
    
    public function isExcluded($id)
    {
        $excluded = explode(',', $this->getExcludeCategory());
        if (!$excluded) return;
        return in_array($id, $excluded);
    }
}