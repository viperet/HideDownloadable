<?php
namespace Smartymedia\HideDownloadable\Plugin;

use Magento\Downloadable\Model\Product\Type;
use Magento\Catalog\Model\Locator\LocatorInterface;

class LoadLinks
{
    /**
     * @var LocatorInterface
     */
    protected $locator;

    /**
     * @param LocatorInterface $locator
     */
    public function __construct(
        LocatorInterface $locator
    ) {
        $this->locator = $locator;
    }

    function afterGetLinksData(\Magento\Downloadable\Ui\DataProvider\Product\Form\Modifier\Data\Links $subject, $linksData)
    {

        if ($this->locator->getProduct()->getTypeId() !== Type::TYPE_DOWNLOADABLE) {
            return $linksData;
        }

        $links = $this->locator->getProduct()->getTypeInstance()->getLinks($this->locator->getProduct());
        /** @var LinkInterface $link */
        foreach ($links as $link) {
            foreach($linksData as &$linkData) {
                if($linkData['link_id'] == $link->getId()) {
                    $linkData['is_visible'] = $link->getIsVisible();
                }
            }
        }
/*
        var_dump($this->reqest->getPost())
        var_dump($linksData);exit;
*/
        return $linksData;
    }
}