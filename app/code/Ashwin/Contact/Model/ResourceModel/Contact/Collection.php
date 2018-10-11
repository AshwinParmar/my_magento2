<?php
namespace Ashwin\Contact\Model\ResourceModel\Contact;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
	
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'ashwin_contact_collection';
	protected $_eventObject = 'ashwin_contact_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct() {
		// (Model, ResourceModel)
		$this->_init('Ashwin\Contact\Model\Contact', 'Ashwin\Contact\Model\ResourceModel\Contact');
	}

}
