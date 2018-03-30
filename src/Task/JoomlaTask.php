<?php
namespace JoomlaRobo\Task;

use Robo\Task\BaseTask;
use Robo\Exception\TaskException;
use Robo\Common\BuilderAwareTrait;
use Robo\Contract\BuilderAwareInterface;

/**
 * Class JoomlaTask
 *
 * @package JoomlaRobo\Task
 */
abstract class JoomlaTask extends BaseTask implements \Robo\Contract\BuilderAwareInterface
{
	use BuilderAwareTrait;

	const LINUX = 0;
	const MAC = 1;
	const WINDOWS = 2;

	/**
	 * Get the Operating system we are running on
	 *
	 * @return int
	 */
	public function getOs()
	{
		if (strtoupper(substr(\PHP_OS, 0, 3)) === 'WIN')
		{
			return self::WINDOWS;
		}

		if (strtoupper(substr(\PHP_OS, 0, 3)) === 'DAR')
		{
			return self::MAC;
		}

		if (strtoupper(substr(\PHP_OS, 0, 3)) === 'LIN')
		{
			return self::LINUX;
		}

		return -1;
	}
}