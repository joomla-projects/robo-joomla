<?php

namespace JoomlaRobo\Task\Test;

trait Tasks
{
    /**
     * Run Selenium with the right webdriver
     *
     * @param  string $seleniumFolder
     *
     * @return JoomlaRobo\Task\Test
     */
    protected function taskRunSelenium($seleniumFolder, $webDriver = 'chrome')
    {
        return $this->task(TestRunSelenium::class, $seleniumFolder, $webDriver);
    }

    /**
     * Run Install Joomla Test
     *
     * @return JoomlaRobo\Task\TestInstallJoomla
     */
    protected function taskInstallJoomla()
    {
        return $this->task(TestInstallJoomla::class);
    }
}
