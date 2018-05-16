<?php

namespace Ashwin\Helloworld\Model;

class Post extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface {
	const CACHE_TAG = 'ashwin_helloworld_post';

	protected $_cacheTag = 'ashwin_helloworld_post';

	protected $_eventPrefix = 'ashwin_helloworld_post';

	protected function _construct()
	{
		$this->_init('Ashwin\Helloworld\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}
