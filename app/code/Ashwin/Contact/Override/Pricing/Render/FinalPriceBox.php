<?php

namespace Ashwin\Contact\Override\Pricing\Render;

use Magento\Catalog\Pricing\Price;
use Magento\Framework\Pricing\Render;
use Magento\Framework\Pricing\Render\PriceBox as BasePriceBox;
use Magento\Msrp\Pricing\Price\MsrpPrice;
use Magento\Framework\Registry;

class FinalPriceBox extends \Magento\Catalog\Pricing\Render\FinalPriceBox {

	/** 
	 * @var const HIDE_PRICE_FOR_CATEGORIES
	 */    
	const HIDE_PRICE_FOR_CATEGORIES = ['6'];
	const LIST_OF_PRODUCTS = ['5'];

	protected function wrapResult($html) {
		// Get category of this product.
		// If Category is Match with configured
		// Hide Price for product(s).
		$html = '';
		$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
		$category = $objectManager->get('Magento\Framework\Registry')->registry('current_category');//get current category
		// $categoriesOfProducts = $this->getSaleableItem()->getCategoryIds();

		// This Button is only display, If Products having 'x' attribute value set to 'Yes'
		if (in_array($this->getSaleableItem()->getId(), self::LIST_OF_PRODUCTS)) {
			$html = '<div id="modal-form" style="display: none;">
				<form class="form" action="#" method="post" id="form-validate" enctype="multipart/form-data" autocomplete="off" novalidate="novalidate">
					<input type="hidden" name="product_id" value="' . $this->getSaleableItem()->getId() . '" />
					<fieldset class="fieldset create info">
						<legend class="legend"><span>Contact for Price</span></legend><br/>
						<div class="field field-name-firstname required">
							<label class="label" for="firstname">
								<span>First Name</span>
							</label>
							<div class="control">
								<input type="text" id="firstname" name="firstname" value="" title="First Name" class="input-text required-entry" data-validate="{required:true}" autocomplete="off" aria-required="true">
							</div>
						</div>
						<div class="field field-name-lastname required">
							<label class="label" for="lastname">
								<span>Last Name</span>
							</label>
							<div class="control">
								<input type="text" id="lastname" name="lastname" value="" title="Last Name" class="input-text required-entry" data-validate="{required:true}" autocomplete="off" aria-required="true">
							</div>
						</div>
					</fieldset>
					<div class="actions-toolbar hide">
						<div class="primary">
							<button type="submit" class="action submit primary" title="Submit"><span>Submit</span></button>
						</div>
					</div>
				</form>
			</div>
			<a class="action open-modal-form" href="#nolink" title="Modal"><span>Contact for Price</span></a>
			<script type="text/x-magento-init">
			{
				".open-modal-form": {
					"Ashwin_Contact/js/modal-form": {}
				}
			}
			</script>';
		}
		// This login link is only display, when specific categories are restricted for Non-loggedin Customers.
		else if (in_array($category->getId(), self::HIDE_PRICE_FOR_CATEGORIES)) {
			$html = '<a href="' . $this->getUrl('customer/account/login', []) . '">Login for Price</a>';
		}

		return $html;
    }

}
