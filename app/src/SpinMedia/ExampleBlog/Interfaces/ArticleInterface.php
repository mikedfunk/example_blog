<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Interfaces;

/**
 * ArticleInterface
 *
 * @author Michael Funk <mfunk@spinmedia.com>
 */
interface ArticleInterface
{
    /**
     * getAll
     *
     * @return Collection
     */
    public function getAll();

    /**
     * getById
     *
     * @param int $id
     * @return Article
     */
    public function getById($id);

    /**
     * comments
     *
     * @return QueryBuilder
     */
    public function comments();
}
