<?php

namespace PhpWebDriverExamples\EventListener;

use EventFiringWebDriver;
use EventFiringWebElement;
use RemoteWebDriver;
use WebDriverBy;
use WebDriverCapabilityType;
use WebDriverException;

class EventListenerTest extends \PHPUnit_Framework_TestCase
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

    public function testEventListener()
    {
        $this->markTestSkipped();

        $listener = new MockEventListener();

        $dispatcher = new \WebDriverDispatcher();
        $dispatcher->register($listener);

        $eventFiringWebDriver = new EventFiringWebDriver($this->driver, $dispatcher);
        $eventFiringWebDriver->get('file:///' . realpath(__DIR__ . '/../../sites/tabs_test.html'));
        $eventFiringWebDriver->findElement(\WebDriverBy::id('testlinkthatdoesnotexist'))->click();
    }
}

class MockEventListener implements \WebDriverEventListener
{

    /**
     * @param string               $url
     * @param EventFiringWebDriver $driver
     *
     * @return void
     */
    public function beforeNavigateTo($url, EventFiringWebDriver $driver)
    {
        // TODO: Implement beforeNavigateTo() method.
    }

    /**
     * @param string               $url
     * @param EventFiringWebDriver $driver
     *
     * @return void
     */
    public function afterNavigateTo($url, EventFiringWebDriver $driver)
    {
        // TODO: Implement afterNavigateTo() method.
    }

    /**
     * @param EventFiringWebDriver $driver
     *
     * @return void
     */
    public function beforeNavigateBack(EventFiringWebDriver $driver)
    {
        // TODO: Implement beforeNavigateBack() method.
    }

    /**
     * @param EventFiringWebDriver $driver
     *
     * @return void
     */
    public function afterNavigateBack(EventFiringWebDriver $driver)
    {
        // TODO: Implement afterNavigateBack() method.
    }

    /**
     * @param EventFiringWebDriver $driver
     *
     * @return void
     */
    public function beforeNavigateForward(EventFiringWebDriver $driver)
    {
        // TODO: Implement beforeNavigateForward() method.
    }

    /**
     * @param EventFiringWebDriver $driver
     *
     * @return void
     */
    public function afterNavigateForward(EventFiringWebDriver $driver)
    {
        // TODO: Implement afterNavigateForward() method.
    }

    /**
     * @param WebDriverBy                $by
     * @param EventFiringWebElement|null $element
     * @param EventFiringWebDriver       $driver
     *
     * @return void
     */
    public function beforeFindBy(
        WebDriverBy $by,
        $element,
        EventFiringWebDriver $driver
    ) {
        // TODO: Implement beforeFindBy() method.
    }

    /**
     * @param WebDriverBy                $by
     * @param EventFiringWebElement|null $element
     * @param EventFiringWebDriver       $driver
     *
     * @return void
     */
    public function afterFindBy(
        WebDriverBy $by,
        $element,
        EventFiringWebDriver $driver
    ) {
        // TODO: Implement afterFindBy() method.
    }

    /**
     * @param string               $script
     * @param EventFiringWebDriver $driver
     *
     * @return void
     */
    public function beforeScript($script, EventFiringWebDriver $driver)
    {
        // TODO: Implement beforeScript() method.
    }

    /**
     * @param string               $script
     * @param EventFiringWebDriver $driver
     *
     * @return void
     */
    public function afterScript($script, EventFiringWebDriver $driver)
    {
        // TODO: Implement afterScript() method.
    }

    /**
     * @param EventFiringWebElement $element
     *
     * @return void
     */
    public function beforeClickOn(EventFiringWebElement $element)
    {
        // TODO: Implement beforeClickOn() method.
    }

    /**
     * @param EventFiringWebElement $element
     *
     * @return void
     */
    public function afterClickOn(EventFiringWebElement $element)
    {
        // TODO: Implement afterClickOn() method.
    }

    /**
     * @param EventFiringWebElement $element
     *
     * @return void
     */
    public function beforeChangeValueOf(EventFiringWebElement $element)
    {
        // TODO: Implement beforeChangeValueOf() method.
    }

    /**
     * @param EventFiringWebElement $element
     *
     * @return void
     */
    public function afterChangeValueOf(EventFiringWebElement $element)
    {
        // TODO: Implement afterChangeValueOf() method.
    }

    /**
     * @param WebDriverException   $exception
     * @param EventFiringWebDriver $driver
     *
     * @return void
     */
    public function onException(
        WebDriverException $exception,
        EventFiringWebDriver $driver = null
    ) {
        // TODO: Implement onException() method.
    }
}