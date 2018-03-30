# robo-joomla
Robo tasks for Joomla! development, build, testing and everything  

## Testing tasks

#### Start Selenium Server with the right Browser WebDriver

```php
class RoboFile extends \Robo\Tasks
{
	use JoomlaRobo\Tasks;

	public function runSelenium($seleniumFolder, $webDriver = 'chrome')
	{
		$this->taskRunSelenium($seleniumFolder, $webDriver)->run();
	}
}
```