<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Articles;

use Illuminate\Support\Facades\Facade;

/**
 * ArticleFacade
 *
 * @author Michael Funk <mfunk@spinmedia.com>
 */
class ArticleFacade extends Facade
{
    /**
     * getFacadeAccessor
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'article';
    }
}
