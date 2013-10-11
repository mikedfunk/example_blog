<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Tests;

use SpinMedia\ExampleBlog\Tests\ExampleBlogTestCase;
use SpinMedia\ExampleBlog\Articles\Article as ArticleModel;
use Mockery;
use App;
use Illuminate\Support\Collection;

/**
 * ArticleControllerTest
 *
 * @author Michael Funk <mfunk@spinmedia.com>
 */
class ArticleControllerTest extends ExampleBlogTestCase
{

    /**
     * testArticleIndexOk
     *
     * @return void
     */
    public function testArticleIndexOk()
    {
        // generate dummy article data
        $article = new ArticleModel;
        $article->title = 'test';
        $article->content = 'test';
        $article->id = 1;

        // set up collection
        $collection = Mockery::mock('Illuminate\\Support\\Collection');
        $collection->shouldDeferMissing();
        $collection->shouldReceive('links')->once();
        $collection[] = $article;

        // generate mock, bind in IoC
        $article_mock = Mockery::mock('SpinMedia\\ExampleBlog\\Articles\\Article');
        $article_mock->shouldReceive('getAll')
            ->once()
            ->andReturn($collection);
        App::instance('SpinMedia\\ExampleBlog\\Articles\\Article', $article_mock);

        // ensure that the article http response is ok
        $this->call('GET', 'articles');
        $this->assertResponseOk();
    }

    /**
     * testShowOk
     *
     * @return void
     */
    public function testShowOk()
    {
        // call and assert
        $this->call('GET', 'articles/1');
        $this->assertResponseOk();
    }
}
