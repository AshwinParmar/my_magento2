<?php

namespace Ashwin\Contact\Ui\Component\Listing\Columns;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;

class QueryText extends \Magento\Ui\Component\Listing\Columns\Column {
    /**
     * Column name
     */
    const NAME = 'column.query_text';

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource) {
        if (isset($dataSource['data']['items'])) {
            $fieldName = $this->getData('name');
            foreach ($dataSource['data']['items'] as & $item) {
                if (isset($item[$fieldName])) {
                    $item[$fieldName] = substr($item[$fieldName], 0, 50) . "...";
                }
            }
        }
        return $dataSource;
    }
}