<?php

namespace JoomlaRobo\Task\Test;

/**
 * Run all tests
 *
 * @since 0.1.0
 */
class TestRunAll extends Test
{
	/**
	 * Run
	 */
	public function run()
	{
		$opts = ['use-htaccess' => false, 'env' => 'desktop'];
		
		$this->printTaskInfo('Run all test');

		$pathToCodeception = $this->getPathToCodeception();

		$collection = $this->collectionBuilder();

		foreach ($this->suites as $suite) {
			$collection->taskCodecept($pathToCodeception)
				->arg('--fail-fast')
				->arg('--steps')
				->arg('--debug')
				->env($opts['env'])
				->arg($this->testsPath . $suite)
				->run()
				->stopOnFail();
		}
	}
}
