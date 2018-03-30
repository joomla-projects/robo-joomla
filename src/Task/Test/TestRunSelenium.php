<?php

namespace JoomlaRobo\Task\Test;

/**
 * Start Selenium
 *
 * @since 0.1.0
 */
class TestRunSelenium extends Test
{
	public static $osFolder = ['linux', 'mac', 'windows'];

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

	/**
	 * Build the Webdriver path to be used with Selenium
	 *
	 * @return string
	 */
	protected function buildWebDriverPath()
	{
		if ($this->webDriver === 'chrome')
		{
			return $this->seleniumFolder . '/bin/webdrivers/chrome/' . $this->getOsFolderName() . '/';
		}

		if ($this->webDriver === 'firefox')
		{
			return $this->seleniumFolder . '/bin/webdrivers/gecko/' . $this->getOsFolderName() . '/';
		}

		if ($this->webDriver === 'edge')
		{
			return $this->seleniumFolder . '/bin/webdrivers/edge/';
		}

		if ($this->webDriver === 'edge-insiders')
		{
			return $this->seleniumFolder . '/bin/webdrivers/edge-insiders/';
		}

		if ($this->webDriver === 'ie32')
		{
			return $this->seleniumFolder . '/bin/webdrivers/intenet-explorer32/';
		}
	}

	/**
	 * Get the path to the OS
	 *
	 * @return  string
	 */
	protected function getOsFolderName()
	{
		return self::$osFolder[$this->getOs()];
	}
}
