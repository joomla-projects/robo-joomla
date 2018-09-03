<?php

namespace JoomlaRobo\Robo\Plugin\Commands;

class TestCommands extends \Robo\Tasks
{
    use \JoomlaRobo\Task\Test\Tasks;

    /**
     * Run selenium test
     * 
     * @command Test:Selenium
     * 
     * @param string $name
     */
    public function Selenium($name)
    {
        $this->taskRunSelenium($name)
            ->run();
    }

	/**
	 * Run install Joomla
	 *
	 * @command Test:InstallJoomla
	 */
	public function InstallJoomla()
	{
		$this->taskInstallJoomla()
			->run();
	}

	/**
	 * Run a test suite
	 *
	 * @command Test:RunSuite
	 *
	 * @param string $name
	 */
	public function RunSuite($name)
	{
		$this->taskRunSelenium($name)
			->run();
	}

	/**
	 * Run all tests suites
	 *
	 * @command Test:RunAll
	 *
	 * @param string $name
	 */
	public function RunAll($name)
	{
		$this->taskRunSelenium($name)
			->run();
	}
}
