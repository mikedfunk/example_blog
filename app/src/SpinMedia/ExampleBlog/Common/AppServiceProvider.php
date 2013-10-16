<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Common;

use App;
use Illuminate\Support\ServiceProvider;

/**
 * AppServiceProvider
 *
 * @author Michael Funk <mfunk@spinmedia.com>
 */
class AppServiceProvider extends ServiceProvider
{

    /**
     * register
     *
     * @return AcccountFacade
     */
    public function register()
    {
        App::bind('article', 'SpinMedia\\ExampleBlog\\Articles\\Article');
    }
}
