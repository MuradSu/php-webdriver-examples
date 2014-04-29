<?php

namespace PhpWebDriverExamples\Github;

use PHPUnit_Framework_TestCase;
use PhpWebDriverExamples\Github\Page\StartPage;
use RemoteWebDriver;
use WebDriverBrowserType;
use WebDriverCapabilityType;

class SearchProjectTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var RemoteWebDriver
     */
    private $driver;

    protected function setUp()
    {
        $this->driver = RemoteWebDriver::create(
            getenv('HUB_URL'),
            array(
                WebDriverCapabilityType::BROWSER_NAME => WebDriverBrowserType::CHROME,
            )
        );
    }

    protected function tearDown()
    {
        $this->driver->quit();
    }

    public function testSearchForProject()
    {
        $startPage = new StartPage($this->driver);
        $startPage->open();
        $searchInputPage = $startPage->getSearchInputPage();
        $searchInputPage->searchFor('facebook/php-webdriver');
        $searchInputPage->clickSearchResult('facebook/php-webdriver');
    }
}
