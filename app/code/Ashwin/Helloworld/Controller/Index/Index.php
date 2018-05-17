<?php
 
namespace Ashwin\Helloworld\Controller\Index;
  
use Magento\Framework\App\Action\Context;
   
class Index extends \Magento\Framework\App\Action\Action {

  protected $_resultPageFactory;
  protected $_postFactory;

  public function __construct(
    Context $context,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory,
    \Ashwin\Helloworld\Model\PostFactory $postFactory
  ) {
    $this->_resultPageFactory = $resultPageFactory;
    $this->_postFactory = $postFactory;
    return parent::__construct($context, $resultPageFactory, $postFactory);
  }
		    
  public function execute() {
    $post = $this->_postFactory->create();
    $collection = $post->getCollection();
    foreach($collection as $item) {
      echo "<pre>";
      print_r($item->getData());
      echo "</pre>";
    }
    return $this->_resultPageFactory->create();
    
    // $this->_forward($action = 'hello', $controller = null, $module = null, array $params = null)
    // $this->_redirect('*/*/hello')
  }
  
  /*protected function _isAllowed() {
    return $this->_authorization->isAllowed('Magento_AdminNotification::show_list');
  }*/

}
