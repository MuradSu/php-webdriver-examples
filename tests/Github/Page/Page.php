<?php

namespace PhpWebDriverExamples\Github\Page;

use RemoteWebDriver;

abstract class Page
{
    /** @var RemoteWebDriver */
    protected $driver;

    /**
     * @param RemoteWebDriver $driver
     */
    public function __construct(RemoteWebDriver $driver)
    {
        $this->driver = $driver;
    }
}
