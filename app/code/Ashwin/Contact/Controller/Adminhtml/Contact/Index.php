<?php
/**
 *
 *
 */
namespace Ashwin\Contact\Controller\Adminhtml\Contact;

class Index extends \Magento\Backend\App\Action {
	
	protected $pageFactory = false;
	
	public function __construct(\Magento\Backend\App\Action\Context $context,
								\Magento\Framework\View\Result\PageFactory $pageFactory
	) {
		parent::__construct($context);
		$this->pageFactory = $pageFactory;
	}
	
	public function execute() {
		$page = $this->pageFactory->create();
		$page->getConfig()->getTitle()->prepend(__('Contact Queries | Submitted'));
		
		return $page;
	}
	
}
