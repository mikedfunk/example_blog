<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Comments;

use BaseController;
use Redirect;
use Input;
use SpinMedia\ExampleBlog\Comments\Comment as CommentModel;

/**
 * CommentController
 *
 * @author Michael Funk <mfunk@spinmedia.com>
 */
class CommentController extends BaseController
{

    /**
     * dependency injection
     *
     * @param CommentModel $comment_model
     */
    public function __construct(CommentModel $comment_model)
    {
        $this->comment_model = $comment_model;
    }

    /**
     * store
     *
     * @return Redirect
     */
    public function store()
    {
        // store and redirect
        $this->comment_model->store(Input::all());
        return Redirect::route('articles.index');
    }
}
