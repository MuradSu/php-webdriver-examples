<?php

namespace PhpWebDriverExamples\Tabs;

use PHPUnit_Framework_TestCase;
use RemoteWebDriver;
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

    public function testTabs()
    {
        $this->driver->get('file:///'.realpath(__DIR__ . '/../../sites/tabs_test.html'));
        $this->driver->findElement(\WebDriverBy::id('testlink'))->click();

        $windows = $this->driver->getWindowHandles();

        $firstTab = $windows[0];
        $secondTab = $windows[1];

        $this->driver->switchTo()->window($firstTab);
        $this->assertEquals('Tabs Test 1', $this->driver->getTitle());

        $this->driver->switchTo()->window($secondTab);
        $this->assertEquals('Tabs Test 2', $this->driver->getTitle());
    }
}