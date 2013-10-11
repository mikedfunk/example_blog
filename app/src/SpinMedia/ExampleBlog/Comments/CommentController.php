<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Comments;

use Log;
use BaseController;
use Redirect;
use Input;
use SpinMedia\ExampleBlog\Comments\Comment as CommentModel;
use Validator;

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
        // validate
        $validator = Validator::make(Input::all(), CommentModel::$rules);
        if ($validator->fails()) {
            Log::warning('validation failed');
            return Redirect::route('articles.show', Input::get('article_id'))
                ->withErrors($validator)
                ->withInput();
        }

        // store and redirect
        Log::info('validation succeeded');
        $this->comment_model->store(Input::all());
        return Redirect::route('articles.index');
    }
}
