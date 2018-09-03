<?php

namespace JoomlaRobo\Task\Test;

/**
 * Start Selenium
 *
 * @since 0.1.0
 */
class TestInstallJoomla extends Test
{
	/**
	 * Install Joomla
	 */
	public function run()
	{
		$opts = ['use-htaccess' => false, 'env' => 'desktop'];
		
		$this->printTaskInfo('Running Installation');

		$this->createTestingSite($opts['use-htaccess']);

		$pathToCodeception = $this->prepareRun($opts);

		$collection = $this->collectionBuilder();

		$collection->taskCodecept($pathToCodeception)
			->arg('--fail-fast')
			->arg('--steps')
			->arg('--debug')
			->env($opts['env'])
			->arg($this->testsPath . 'acceptance/install/')
			->run()
			->stopOnFail();

	}
}
