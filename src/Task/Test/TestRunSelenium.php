<?php

namespace JoomlaRobo\Task\Test;

/**
 * Start Selenium
 *
 * @since 0.1.0
 */
class TestRunSelenium extends Test
{
	/**
	 * Class constructor
	 *
	 * @param string $seleniumFolder
	 * @param string $webDriver
	 */
	public function __construct($seleniumFolder, $webDriver = 'chrome')
	{
		$this->seleniumFolder = $seleniumFolder;
		$this->webDriver = $webDriver;
	}

	/**
	 * Run Selenium
	 */
	public function run()
	{
		$this->printTaskInfo('Starting Selenium (' . $this->seleniumFolder . ') with ' . $this->webDriver . ' (OS: ' . \PHP_OS . ')');
		$webDriverPath = $this->buildWebDriverPath();

		// Execute the task
		$this->collectionBuilder()->taskExec('PATH="$PATH:' . $webDriverPath . '" java -jar ' . $this->seleniumFolder .
			'/bin/selenium-server-standalone.jar >> selenium.log 2>&1 &')->run();

	}
}
