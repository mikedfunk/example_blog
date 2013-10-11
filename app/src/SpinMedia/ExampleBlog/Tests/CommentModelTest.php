<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Tests;

use Artisan;
use SpinMedia\ExampleBlog\Comments\Comment as CommentModel;

/**
 * CommentModelTest
 *
 * @author Michael Funk <mfunk@spinmedia.com>
 */
class CommentModelTest extends ExampleBlogTestCase
{

    /**
     * setUp
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->comment_model = new CommentModel;
        Artisan::call('migrate');
        Artisan::call('db:seed');
    }

    /**
     * testCommentStore
     *
     * @return void
     */
    public function testCommentStore()
    {
        // create comment
        $content = 'ssdfdsfsfdasdf';
        $values = ['content' => $content, 'article_id' => 1, 'email' => 'test@test.com'];
        $comment = $this->comment_model->store($values)->id;

        // ensure we get this record
        $count = $this->comment_model->where('content', '=', $content)->count();
        $this->assertEquals(1, $count);
    }
}
