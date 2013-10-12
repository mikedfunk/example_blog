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
     * @var fillable
     */
    protected $fillable = array(
        'content',
        'email',
        'article_id',
    );

    /**
     * @var validation rules
     */
    public static $rules = array(
        'content' => 'required',
        'email' => 'required|email',
    );


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
