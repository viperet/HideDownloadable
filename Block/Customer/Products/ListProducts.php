<?php
namespace Smartymedia\HideDownloadable\Block\Customer\Products;

class ListProducts extends \Magento\Downloadable\Block\Customer\Products\ListProducts
{
    /**
     * Class constructor
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $purchasedItems = $this->getItems();
        $purchasedItems
            ->getSelect()
            ->joinLeft(['link' => 'downloadable_link'],
                       'main_table.link_id = link.link_id');
        $purchasedItems->addFieldToFilter('is_visible', ['eq' => 1]);
        $this->setItems($purchasedItems);
    }
}
