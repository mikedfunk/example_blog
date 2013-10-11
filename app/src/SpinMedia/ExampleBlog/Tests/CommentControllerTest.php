<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Tests;

use Mockery;
use App;
use SpinMedia\ExampleBlog\Comments\Comment as CommentModel;

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
        // generate dummy comment data
        $comment = new CommentModel;
        $comment->content = 'test';
        $comment->email = 'test@test.com';
        $comment->article_id = 1;
        $comment->id = 1;

        // generate mock, bind in IoC
        $comment_mock = Mockery::mock('SpinMedia\\ExampleBlog\\Comments\\Comment');
        $comment_mock->shouldReceive('store')
            ->once()
            ->andReturn($comment);
        App::instance('SpinMedia\\ExampleBlog\\Comments\\Comment', $comment_mock);

        // call and assert
        $this->call('POST', 'comments');
        $this->assertRedirectedToRoute('articles.index');
    }
}
