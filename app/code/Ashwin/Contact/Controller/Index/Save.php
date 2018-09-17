<?php

namespace Ashwin\Contact\Controller\Index;

class Save extends \Magento\Framework\App\Action\Action {

	/**
	 * @var \Magento\Framework\Controller\Result\JsonFactory $_resultJsonFactory
	 */	
	protected $_resultJsonFactory = false;
	/**
	 * @var \Ashwin\Contact\Model\CallForPriceFactory
	 */
	protected $_callForPriceFactory = false;
	/**
	 * @var \Magento\Framework\Message\ManagerInterface $_messageManager
	 */
	protected $_messageManager = false;
	
	public function __construct(\Magento\Framework\App\Action\Context $context,
								\Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
								\Ashwin\Contact\Model\CallForPriceFactory $callForPriceFactory,
								\Magento\Framework\Message\ManagerInterface $messageManager
	) {
		$this->_callForPriceFactory = $callForPriceFactory;
		$this->_resultJsonFactory = $resultJsonFactory;
		$this->_messageManager = $messageManager;

		parent::__construct($context);
	}
	
	public function execute() {
		$response = $this->_resultJsonFactory->create();
		$callForPriceFactory = $this->_callForPriceFactory->create();
		$successMessage = __('Thank you for contacting us for price, Our team will contact you soon.');
		$errorMessage = '';
		
		// Save data to Model
		try {
			$id = $callForPriceFactory->setData([
				'firstname' => $this->_request-getParam('firstname'),
				'lastname' => $this->_request-getParam('lastname'),
				'product_id' => $this->_request-getParam('product_id')
			])->save();

			$this->_messageManager->addSuccessMessage( $successMessage );
		}
		catch(Exception $e) {
			$successMessage = '';
			$errorMessage = 'Error: ' . $e->getMessage();
			$this->_messageManager->addErrorMessage( $errorMessage );
		}
		
		// Send response
		$response->setData(['success' => (strlen($successMessage) ? true : false), 'message' => $successMessage, 'error' => $errorMessage]);
		return $response;
	}
	
}
