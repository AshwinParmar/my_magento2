<?php
/**
 * Install Schema for Contact form.
 */
namespace Ashwin\Contact\Setup;

use Magento\Framework\Setup\UpgradeSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;

class UpgradeSchema implements UpgradeSchemaInterface {
	
	/**
     * {@inheritdoc}
     */
	public function upgrade(SchemaSetupInterface $setup, ModuleContextInterface $context) {
		
		$installer = $setup;
		$installer->startSetup();
			//Your upgrade script
			$table = $installer->getConnection()
			->newTable($installer->getTable('ashwin_callforprice'))
			->addColumn(
				'id',
				Table::TYPE_INTEGER,
				null,
				['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
				'Call for Price Form Submittion ID'
			)
			->addColumn(
				'firstname',
				Table::TYPE_TEXT,
				255,
				['default' => null],
				'Firstname'
			)
			->addColumn(
				'lastname',
				Table::TYPE_TEXT,
				255,
				['default' => null],
				'Lastname'
			)
			->addColumn(
				'product_id',
				Table::TYPE_INTEGER,
				0,
				['unsigned' => true, 'nullable' => false],
				'Product Id'
			)
			->addColumn(
				'created',
				\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
				null,
				['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
				'Created At'
			)
			->setComment(
				'Table CallForPrice'
			);
			$installer->getConnection()->createTable($table);
		$installer->endSetup();
	}
}
