<?php
namespace Ashwin\Contact\Model;

class Contact 	extends \Magento\Framework\Model\AbstractModel 
				implements \Magento\Framework\DataObject\IdentityInterface {

	const CACHE_TAG = 'ashwin_contact';

	protected $_cacheTag = 'ashwin_contact';

	protected $_eventPrefix = 'ashwin_contact';

	protected function _construct() {
		$this->_init('Ashwin\Contact\Model\ResourceModel\Contact');
	}

	public function getIdentities() {
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues() {
		$values = [];

		return $values;
	}
}