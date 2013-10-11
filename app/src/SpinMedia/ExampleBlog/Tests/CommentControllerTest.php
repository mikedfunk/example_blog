<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Tests;

use Mockery;
use App;
use SpinMedia\ExampleBlog\Comments\Comment as CommentModel;
use Log;

/**
 * CommentControllerTest
 *
 * @author Michael Funk <mfunk@spinmedia.com>
 */
class CommentControllerTest extends ExampleBlogTestCase
{

    /**
     * testStore
     *
     * @return void
     */
    public function testStore()
    {
        // mock Log method
        Log::shouldReceive('info')
            ->once();

        // generate dummy comment data
        $comment_values = [
            'email' => 'test@test.com',
            'content' => 'sdfdsf',
            'article_id' => 1,
        ];
        $comment = (object)$comment_values;

        // generate mock, bind in IoC
        $comment_mock = Mockery::mock('SpinMedia\\ExampleBlog\\Comments\\Comment');
        $comment_mock->shouldReceive('store')
            ->once()
            ->andReturn($comment);
        App::instance('SpinMedia\\ExampleBlog\\Comments\\Comment', $comment_mock);

        // call and assert
        $this->call('POST', 'comments', $comment_values);
        $this->assertRedirectedToRoute('articles.index');
    }

    /**
     * testStoreFailValidation
     *
     * @return void
     */
    public function testStoreFailValidation()
    {
        // mock Log method
        Log::shouldReceive('warning')
            ->once();

        // generate dummy comment data
        $comment_values = [
            'email' => 'test@test.com',
            'content' => '',
            'article_id' => 1,
        ];

        // call, assert that it's redirected back to the show route
        $this->call('POST', 'comments', $comment_values);
        $this->assertRedirectedToRoute('articles.show', $comment_values['article_id']);
    }
}
