<?php

namespace PhpWebDriverExamples\Github\Page;

use Exception;

class SearchInputPage extends Page
{
    /**
     * Search for a Repository by typing into the search input
     *
     * @param string $repositoryName
     */
    public function searchFor($repositoryName)
    {
        $element = $this->driver->findElement(\WebDriverBy::id('js-command-bar-field'));
        $this->driver->getMouse()->click($element->getCoordinates());
        $this->driver->getKeyboard()->sendKeys($repositoryName);
    }

    /**
     * Click on the search result. You need to call "searchFor" and search for a repository in order to click a
     * search result.
     *
     * {code}
     * $page = new SearchInputPage($this->driver);
     * $page->searchFor('facebook/webdriver');
     * $page->clickSearchResult('facebook/webdriver');
     * {code}
     *
     * @param string $repositoryName
     */
    public function clickSearchResult($repositoryName)
    {
        $element = null;
        $wait = new \WebDriverWait($this->driver, 5, 100);
        $wait->until(function() use ($repositoryName, &$element) {
            try {
                $element = $this->driver->findElement(\WebDriverBy::xpath('//*[@data-command="'.$repositoryName.'"]'));
                return true;
            } catch (Exception $exception) {
                return false;
            }
        });

        // Workaround for Firefox
        $wait = new \WebDriverWait($this->driver, 5, 100);
        $wait->until(\WebDriverExpectedCondition::visibilityOf($element));

        $this->driver->getMouse()->click($element->getCoordinates());
    }
}
 