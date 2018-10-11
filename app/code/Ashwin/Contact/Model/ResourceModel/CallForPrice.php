<?php
namespace Ashwin\Contact\Model\ResourceModel;

class CallForPrice extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb {
	
	public function __construct(\Magento\Framework\Model\ResourceModel\Db\Context $context) {
		parent::__construct($context);
	}
	
	protected function _construct() {
		// (Table Name, Primary Key)
		$this->_init('ashwin_callforprice', 'id');
	}
}
