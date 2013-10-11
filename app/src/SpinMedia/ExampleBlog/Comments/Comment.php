<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Comments;

use Eloquent;

/**
 * Comment
 *
 * @author Michael Funk <mfunk@spinmedia.com>
 */
class Comment extends Eloquent
{

    /**
     * store
     *
     * @param array $values
     * @return Comment
     */
    public function store(array $values)
    {
        return static::create($values);
    }
}
