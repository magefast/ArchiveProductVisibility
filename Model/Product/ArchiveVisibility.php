<?php
/**
 * @author magefast@gmail.com www.magefast.com
 */

namespace Strekoza\ArchiveVisibility\Model\Product;

use Magento\Catalog\Model\Product\Visibility;

class ArchiveVisibility extends Visibility
{
    const VISIBILITY_ARCHIVE = 5;

    /**
     * Retrieve all options
     *
     * @return array
     */
    public static function getAllOption()
    {
        $options = self::getOptionArray();
        array_unshift($options, ['value' => '', 'label' => '']);
        return $options;
    }

    /**
     * Retrieve option array
     *
     * @return array
     */
    public static function getOptionArray()
    {
        $optionArray = parent::getOptionArray();
        $optionArray[self::VISIBILITY_ARCHIVE] = __('Archive');
        return $optionArray;
    }

    /**
     * Retrieve all options
     *
     * @return array
     */
    public static function getAllOptions()
    {
        $res = [];
        foreach (self::getOptionArray() as $index => $value) {
            $res[] = ['value' => $index, 'label' => $value];
        }
        return $res;
    }

    /**
     * Retrieve option text
     *
     * @param int $optionId
     * @return string
     */
    public static function getOptionText($optionId)
    {
        $options = self::getOptionArray();
        return isset($options[$optionId]) ? $options[$optionId] : null;
    }

    /**
     * Retrieve visible in catalog ids array
     *
     * @return int[]
     */
    public function getVisibleInCatalogIds()
    {
        return [self::VISIBILITY_IN_CATALOG, self::VISIBILITY_BOTH];
    }

    /**
     * Retrieve visible in search ids array
     *
     * @return int[]
     */
    public function getVisibleInSearchIds()
    {
        return [self::VISIBILITY_IN_SEARCH, self::VISIBILITY_BOTH];
    }

    /**
     * Retrieve visible in site ids array
     *
     * @return int[]
     */
    public function getVisibleInSiteIds()
    {
        return [self::VISIBILITY_IN_SEARCH, self::VISIBILITY_IN_CATALOG, self::VISIBILITY_BOTH, self::VISIBILITY_ARCHIVE];
    }

}