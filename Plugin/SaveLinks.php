<?php
namespace Smartymedia\HideDownloadable\Plugin;

use Magento\Downloadable\Api\Data\LinkInterface;
use Magento\Downloadable\Model\LinkRepository;
use Magento\Framework\App\ResourceConnection;

class SaveLinks
{
    /**
     * @var ResourceConnection
     */
    protected $resource;
    protected $connection;

    /**
     * @param LocatorInterface $locator
     */
    public function __construct(
        ResourceConnection $resource

    ) {
        $this->resource  = $resource;
        $this->connection = $resource->getConnection();
    }

    public function afterSave(LinkRepository $subject, $link_id, $sku, LinkInterface $link)
    {
        if($link_id) {
/*
            echo "<pre>";
            var_dump($link_id);
            var_dump($sku);
            var_dump($link->getData());
*/

            $tableName = $this->resource->getTableName('downloadable_link');
            $this->connection->update($tableName, ['is_visible' => $link->getIsVisible()], ['link_id = ?' => $link_id]);
//             exit;
        }
        return $link_id;
    }
}