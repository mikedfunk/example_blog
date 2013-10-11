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
     * @var fillable
     */
    protected $fillable = array(
        'title',
        'content',
    );

    /**
     * getAll
     *
     * @return Collection
     */
    public function getAll()
    {
        return static::paginate(5);
    }

    /**
     * getById
     *
     * @param int $id
     * @return Article
     */
    public function getById($id)
    {
        return static::find($id);
    }

    /**
     * comments
     *
     * @return void
     */
    public function comments()
    {
        return $this->hasMany('SpinMedia\\ExampleBlog\\Comments\\Comment');
    }
}
