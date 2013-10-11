<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Tests;

use SpinMedia\ExampleBlog\Tests\ExampleBlogTestCase;
use SpinMedia\ExampleBlog\Articles\Article as ArticleModel;
use Artisan;

/**
 * ArticleModelTest
 *
 * @author Michael Funk <mfunk@spinmedia.com>
 */
class ArticleModelTest extends ExampleBlogTestCase
{

    /**
     * @var ArticleModel
     */
    protected $article_model;

    /**
     * setUp
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->article_model = new ArticleModel;
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    /**
     * testArticleGetAll
     *
     * @return void
     */
    public function testArticleGetAll()
    {
        $this->article_model = new ArticleModel;
        $this->assertEquals(5, count($this->article_model->getAll()));
    }

    /**
     * testGetById
     *
     * @return void
     */
    public function testGetById()
    {
        // ensure the title is as expected
        $article = $this->article_model->getById(1);
        $this->assertEquals('test1', $article->title);

        // ensure that comments are set
        $this->assertGreaterThan(0, count($article->comments));
    }
}
