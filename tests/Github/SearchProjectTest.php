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
                WebDriverCapabilityType::BROWSER_NAME => getenv('BROWSER'),
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
        $repositoryPage = $searchInputPage->searchFor('php-webdriver', 'facebook/php-webdriver');
        $this->assertEquals('facebook', $repositoryPage->getAuthor());
    }

    public function testExplorePageDisplaysShowcasesLink()
    {
        $startPage = new StartPage($this->driver);
        $startPage->open();
        $explorePage = $startPage->clickExplore();
        $this->assertTrue($explorePage->isShowCasesLinkVisible());
    }
}
