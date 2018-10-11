<?php
namespace Ashwin\Contact\Model;

class CallForPrice 	extends \Magento\Framework\Model\AbstractModel 
				implements \Magento\Framework\DataObject\IdentityInterface {

	const CACHE_TAG = 'ashwin_callforprice';

	protected $_cacheTag = 'ashwin_callforprice';

	protected $_eventPrefix = 'ashwin_callforprice';

	protected function _construct() {
		$this->_init('Ashwin\Contact\Model\ResourceModel\CallForPrice');
	}

	public function getIdentities() {
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues() {
		$values = [];

		return $values;
	}
}