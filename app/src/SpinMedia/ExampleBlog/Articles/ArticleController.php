<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Articles;

use BaseController;
use View;
use SpinMedia\ExampleBlog\Interfaces\ArticleInterface;
use SpinMedia\ExampleBlog\Articles\ArticleFacade as ArticleModel;

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
    public function __construct(ArticleInterface $article_model)
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
        // $articles = $this->article_model->getAll();
        $articles = ArticleModel::getAll();
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
        // $article = $this->article_model->getById($id);
        $article = ArticleModel::getById($id);
        return View::make('articles.article_show')->with(compact('article'));
    }
}
