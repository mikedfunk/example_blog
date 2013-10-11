<?php
/**
 * @package ExampleBlog
 * @copyright 2013 SpinMedia, Inc. All Rights Reserved.
 */
namespace SpinMedia\ExampleBlog\Tests;

use TestCase;
use Mockery;

/**
 * ExampleBlogTestCase
 *
 * @author Michael Funk <mfunk@spinmedia.com>
 */
class ExampleBlogTestCase extends TestCase
{

    /**
     * tearDown
     *
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();
        Mockery::close();
    }
}
