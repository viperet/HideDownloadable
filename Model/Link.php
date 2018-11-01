<?php
namespace Smartymedia\HideDownloadable\Model;

use Smartymedia\HideDownloadable\Api\Data\LinkInterface;

class Link extends \Magento\Downloadable\Model\Link implements LinkInterface
{
    /**
     * {@inheritdoc}
     * @codeCoverageIgnore
     */
    public function getIsVisible()
    {
        return $this->getData('is_visible');
    }

    /**
     * @param int $isVisible
     * @return $this
     */
    public function setIsVisible($isVisible)
    {
        return $this->setData('is_visible', $isVisible);
    }
}
