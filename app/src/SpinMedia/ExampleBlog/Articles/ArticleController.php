<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Articles;

use BaseController;
use View;
use SpinMedia\ExampleBlog\Articles\Article as ArticleModel;

/**
 * ArticleController
 *
 * @author Michael Funk <mfunk@spinmedia.com>
 */
class ArticleController extends BaseController
{

    /**
     * __construct
     *
     * @return void
     */
    public function __construct(ArticleModel $article_model)
    {
        $this->article_model = $article_model;
    }

    /**
     * index
     *
     * @return View
     */
    public function index()
    {
        $articles = $this->article_model->getAll();
        return View::make('articles.article_index', compact('articles'));
    }

    /**
     * show
     *
     * @param int $id
     * @return View
     */
    public function show($id)
    {
        return View::make('articles.article_show');
    }
}
