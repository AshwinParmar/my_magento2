<?php
namespace Ashwin\Contact\Plugin;

use \Psr\Log\LoggerInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Contact\Controller\Index\Post;

class ContactPlugin {
	
	/**
	 * @var \Psr\Log\LoggerInterface
	 */
	protected $_logger = false;
	/**
	 * @var \Ashwin\Contact\Model\ContactFactory
	 */
	protected $_contactFactory = false;
	
	/**
	 * @param \Psr\Log\LoggerInterface $logger
	 * @param \Ashwin\Contact\Model\ContactFactory $contactFactory
	 */
	public function __construct(\Psr\Log\LoggerInterface $logger, \Ashwin\Contact\Model\ContactFactory $contactFactory) {
		$this->_logger = $logger;
		$this->_contactFactory = $contactFactory;
		$this->_logger->debug('init ContactPlugin');
	}

	/**
	 * @param Post $subject
	 * @param \Closure $proceed
	 * @return object $result
	 */
	//public function afterExecute(Post $subject, $result) {
	public function aroundExecute(Post $subject, \Closure $proceed) {

		// Insert contact details into custom table,
		// once submitting contact form.
		try {
			$params = $subject->getRequest()->getParams();
			$this->_logger->debug('Params::' . json_encode($params));
			
			$model = $this->_contactFactory->create();
			$model->setData([
				'contact_person_name' => $params['name'],
				'email' => $params['email'],
				'phone' => $params['telephone'],
				'query_text' => $params['comment']
			]);
			$model->save();
		}
		catch(\Exception $e) {
			$this->_logger->error($e->getMessage());
		}
		
		$result = $proceed();
		return $result;
	}
}
