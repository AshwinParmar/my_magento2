<?php
namespace Ashwin\Contact\Model\ResourceModel\CallForPrice;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection {
	
	protected $_idFieldName = 'id';
	protected $_eventPrefix = 'ashwin_callforprice_collection';
	protected $_eventObject = 'ashwin_callforprice_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct() {
		// (Model, ResourceModel)
		$this->_init('Ashwin\Contact\Model\CallForPrice', 'Ashwin\Contact\Model\ResourceModel\CallForPrice');
	}

}
