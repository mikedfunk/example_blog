<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Articles;

use Eloquent;

/**
 * Article
 *
 * @author Michael Funk <mfunk@spinmedia.com>
 */
class Article extends Eloquent
{

    /**
     * getAll
     *
     * @return Collection
     */
    public function getAll()
    {
        return static::paginate(5);
    }
}
