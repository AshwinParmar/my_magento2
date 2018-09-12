<?php
namespace Ashwin\Contact\Setup;

use Magento\Eav\Setup\EavSetup;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

class InstallData implements InstallDataInterface {
	
	private $eavSetupFactory;

	public function __construct(EavSetupFactory $eavSetupFactory) {
		$this->eavSetupFactory = $eavSetupFactory;
	}
	
	public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context) {
		
		$eavSetup = $this->eavSetupFactory->create(['setup' => $setup]);
		
		$this->addCustomerAttribute($eavSetup);
		$this->addProductAttribute($eavSetup);
		
	}
	
	public function addCustomerAttribute($eavSetup) {
		$eavSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,	// Entity Type Id
			'hobby', // Attribute name / code
			[
				'type' => 'varchar',
				'label' => 'Hobby',
				'input' => 'text',
				'required' => false,
				'visible' => true,
				'user_defined' => true,
				'position' => 999,
				'system' => 0,
				'filterable' => true,
				'searchable' => true,
			]
		);
		$eavSetup->addAttribute(
			\Magento\Customer\Model\Customer::ENTITY,	// Entity Type
			'skill', // Attribute name / code
			[
				'type' => 'varchar',
				'label' => 'Skill',
				'input' => 'text',
				'required' => false,
				'visible' => true,
				'user_defined' => true,
				'position' => 999,
				'system' => 0,
				'filterable' => true,
				'searchable' => true,
				
			]
		);
		
		// For Remove attribute:
		// $eavSetup->removeAttribute(\Magento\Catalog\Model\Product::ENTITY,'sample_attribute');
	}
	
	public function addProductAttribute($eavSetup) {
		// Kit code
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'kit_code',
			[
				'type' => 'text',
				'backend' => '',
				'frontend' => '',
				'label' => 'Kit Code',
				'input' => 'text',
				'class' => '',
				'source' => '',
				'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
				'visible' => true,
				'required' => false,
				'user_defined' => false,
				'default' => '',
				'searchable' => true,
				'filterable' => true,
				'comparable' => true,
				'visible_on_front' => true,
				'used_in_product_listing' => true,
				'unique' => false,
				'apply_to' => ''
			]
		);
		// Kit Size
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'kit_size',
			[
				'type' => 'text',
				'backend' => '',
				'frontend' => '',
				'label' => 'Kit Size',
				'input' => 'text',
				'class' => '',
				'source' => '',
				'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
				'visible' => true,
				'required' => false,
				'user_defined' => false,
				'default' => '',
				'searchable' => true,
				'filterable' => true,
				'comparable' => true,
				'visible_on_front' => true,
				'used_in_product_listing' => true,
				'unique' => false,
				'apply_to' => ''
			]
		);
		// Kit Description
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'kit_description',
			[
				'type' => 'text',
				'backend' => '',
				'frontend' => '',
				'label' => 'Kit Description',
				'input' => 'text',
				'class' => '',
				'source' => '',
				'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
				'visible' => true,
				'required' => false,
				'user_defined' => false,
				'default' => '',
				'searchable' => true,
				'filterable' => true,
				'comparable' => true,
				'visible_on_front' => true,
				'used_in_product_listing' => true,
				'unique' => false,
				'apply_to' => ''
			]
		);
		// Kit Validity
		$eavSetup->addAttribute(
			\Magento\Catalog\Model\Product::ENTITY,
			'kit_validity',
			[
				'type' => 'datetime',
				'backend' => '',
				'frontend' => '',
				'label' => 'Kit Validity',
				'input' => 'date',
				'class' => '',
				'source' => '',
				'global' => \Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface::SCOPE_GLOBAL,
				'visible' => true,
				'required' => false,
				'user_defined' => false,
				'default' => '',
				'searchable' => true,
				'filterable' => true,
				'comparable' => true,
				'visible_on_front' => true,
				'used_in_product_listing' => true,
				'unique' => false,
				'apply_to' => ''
			]
		);
	}

}
