<?php
/**
 * @author jgn
 * @date 27/02/2015
 * @description For ...
 */

namespace Awakit\AsseticLessBundle\Filter;




use Assetic\Filter\LessphpFilter;
use Assetic\Asset\AssetInterface;

/**
 * Class LessphpNonCachedFilter
 * @package Awakit\AsseticLessBundle\Filter
 */
class LessphpNonCachedFilter extends LessphpFilter {

    /**
     * @param \Assetic\Asset\AssetInterface $asset
     */
    public function filterLoad(AssetInterface $asset)
    {
        $root = $asset->getSourceRoot();
        $path = $asset->getSourcePath();

        $filename = realpath($root . '/' . $path);

        if (file_exists($filename)) {
            touch($filename);
        }

        parent::filterLoad($asset);
    }
}