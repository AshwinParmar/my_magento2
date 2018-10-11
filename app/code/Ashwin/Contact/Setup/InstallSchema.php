<?php
/**
 * Install Schema for Contact form.
 */
namespace Ashwin\Contact\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\DB\Ddl\Table;

/**
 * create schema for contact form.
 */
class InstallSchema implements InstallSchemaInterface {
	
	public function install(SchemaSetupInterface $setup, ModuleContextInterface $context) {
		
		$installer = $setup;
		
		$installer->startSetup();
		$table = $installer->getConnection()
			->newTable($installer->getTable('ashwin_contact'))
			->addColumn(
				'id',
				Table::TYPE_INTEGER,
				null,
				['identity' => true, 'unsigned' => true, 'nullable' => false, 'primary' => true],
				'Contact Form Submittion ID'
			)
			->addColumn(
				'contact_person_name',
				Table::TYPE_TEXT,
				255,
				['default' => null],
				'Contact Person Full Name'
			)
			->addColumn(
				'email',
				Table::TYPE_TEXT,
				255,
				['default' => null],
				'Email address of contact person'
			)
			->addColumn(
				'phone',
				Table::TYPE_TEXT,
				100,
				['default' => null],
				'Phone number of contact person'
			)
			->addColumn(
				'query_text',
				Table::TYPE_TEXT,
				1000,
				['default' => null],
				'Query text'
			)
			->addColumn(
				'mail_sent',
				Table::TYPE_SMALLINT,
				0,
				['default' => 0],
				'email sent status'
			)
			->addColumn(
				'created',
				\Magento\Framework\DB\Ddl\Table::TYPE_TIMESTAMP,
				null,
				['nullable' => false, 'default' => \Magento\Framework\DB\Ddl\Table::TIMESTAMP_INIT],
				'Created At'
			)
			->setComment(
				'Table Contact'
			);

		$installer->getConnection()->createTable($table);
		$installer->endSetup();
	}
}
