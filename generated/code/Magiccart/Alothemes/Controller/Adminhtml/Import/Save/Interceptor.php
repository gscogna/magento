<?php
namespace Magiccart\Alothemes\Controller\Adminhtml\Import\Save;

/**
 * Interceptor class for @see \Magiccart\Alothemes\Controller\Adminhtml\Import\Save
 */
class Interceptor extends \Magiccart\Alothemes\Controller\Adminhtml\Import\Save implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Backend\App\Action\Context $context, \Magento\Framework\Registry $coreRegistry, \Magento\Framework\App\Response\Http\FileFactory $fileFactory, \Magento\Framework\App\Config\ScopeConfigInterface $scopeConfig, \Magento\Framework\View\Result\PageFactory $resultPageFactory, \Magento\Framework\View\Result\LayoutFactory $resultLayoutFactory, \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory, \Magento\Store\Model\StoreManagerInterface $storeManager, \Magento\Backend\Helper\Js $jsHelper, \Magento\Framework\Filesystem $filesystem)
    {
        $this->___init();
        parent::__construct($context, $coreRegistry, $fileFactory, $scopeConfig, $resultPageFactory, $resultLayoutFactory, $resultForwardFactory, $storeManager, $jsHelper, $filesystem);
    }

    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'execute');
        return $pluginInfo ? $this->___callPlugins('execute', func_get_args(), $pluginInfo) : parent::execute();
    }

    /**
     * {@inheritdoc}
     */
    public function getImportFile($fileName)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getImportFile');
        return $pluginInfo ? $this->___callPlugins('getImportFile', func_get_args(), $pluginInfo) : parent::getImportFile($fileName);
    }

    /**
     * {@inheritdoc}
     */
    public function importXml()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'importXml');
        return $pluginInfo ? $this->___callPlugins('importXml', func_get_args(), $pluginInfo) : parent::importXml();
    }

    /**
     * {@inheritdoc}
     */
    public function removeBlock()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'removeBlock');
        return $pluginInfo ? $this->___callPlugins('removeBlock', func_get_args(), $pluginInfo) : parent::removeBlock();
    }

    /**
     * {@inheritdoc}
     */
    public function removePage()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'removePage');
        return $pluginInfo ? $this->___callPlugins('removePage', func_get_args(), $pluginInfo) : parent::removePage();
    }

    /**
     * {@inheritdoc}
     */
    public function importBlock($overwrite = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'importBlock');
        return $pluginInfo ? $this->___callPlugins('importBlock', func_get_args(), $pluginInfo) : parent::importBlock($overwrite);
    }

    /**
     * {@inheritdoc}
     */
    public function importPage($overwrite = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'importPage');
        return $pluginInfo ? $this->___callPlugins('importPage', func_get_args(), $pluginInfo) : parent::importPage($overwrite);
    }

    /**
     * {@inheritdoc}
     */
    public function importSystem($scope = 'default')
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'importSystem');
        return $pluginInfo ? $this->___callPlugins('importSystem', func_get_args(), $pluginInfo) : parent::importSystem($scope);
    }

    /**
     * {@inheritdoc}
     */
    public function importMagicmenu()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'importMagicmenu');
        return $pluginInfo ? $this->___callPlugins('importMagicmenu', func_get_args(), $pluginInfo) : parent::importMagicmenu();
    }

    /**
     * {@inheritdoc}
     */
    public function importMagicproduct($conditions = false)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'importMagicproduct');
        return $pluginInfo ? $this->___callPlugins('importMagicproduct', func_get_args(), $pluginInfo) : parent::importMagicproduct($conditions);
    }

    /**
     * {@inheritdoc}
     */
    public function importMagicslider()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'importMagicslider');
        return $pluginInfo ? $this->___callPlugins('importMagicslider', func_get_args(), $pluginInfo) : parent::importMagicslider();
    }

    /**
     * {@inheritdoc}
     */
    public function importLookbook()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'importLookbook');
        return $pluginInfo ? $this->___callPlugins('importLookbook', func_get_args(), $pluginInfo) : parent::importLookbook();
    }

    /**
     * {@inheritdoc}
     */
    public function dispatch(\Magento\Framework\App\RequestInterface $request)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'dispatch');
        return $pluginInfo ? $this->___callPlugins('dispatch', func_get_args(), $pluginInfo) : parent::dispatch($request);
    }

    /**
     * {@inheritdoc}
     */
    public function _processUrlKeys()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, '_processUrlKeys');
        return $pluginInfo ? $this->___callPlugins('_processUrlKeys', func_get_args(), $pluginInfo) : parent::_processUrlKeys();
    }

    /**
     * {@inheritdoc}
     */
    public function getUrl($route = '', $params = [])
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getUrl');
        return $pluginInfo ? $this->___callPlugins('getUrl', func_get_args(), $pluginInfo) : parent::getUrl($route, $params);
    }

    /**
     * {@inheritdoc}
     */
    public function getActionFlag()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getActionFlag');
        return $pluginInfo ? $this->___callPlugins('getActionFlag', func_get_args(), $pluginInfo) : parent::getActionFlag();
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getRequest');
        return $pluginInfo ? $this->___callPlugins('getRequest', func_get_args(), $pluginInfo) : parent::getRequest();
    }

    /**
     * {@inheritdoc}
     */
    public function getResponse()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getResponse');
        return $pluginInfo ? $this->___callPlugins('getResponse', func_get_args(), $pluginInfo) : parent::getResponse();
    }
}
