<?php

namespace PhpWebDriverExamples\Github\Page;

class StartPage extends Page
{
    /**
     * Open the Github page
     */
    public function open()
    {
        $this->driver->get('https://github.com');
    }

    /**
     * @return SearchInputPage
     */
    public function getSearchInputPage()
    {
        return new SearchInputPage($this->driver);
    }
}
