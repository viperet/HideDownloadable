<?php
namespace Smartymedia\HideDownloadable\Api\Data;

interface LinkInterface extends \Magento\Downloadable\Api\Data\LinkInterface
{
    /**
     * Link visibility status
     * 0 -- No
     * 1 -- Yes
     *
     * @return int
     */
    public function getIsVisible();

    /**
     * @param int $isVisible
     * @return $this
     */
    public function setIsVisible($isVisible);
}
