<?php
namespace JoomlaRobo\Task\Test;

use JoomlaRobo\Task\JoomlaTask;


/**
 * Testing Base Class
 * 
 * @since 0.1.0
 */
abstract class Test extends JoomlaTask
{

    /**
     * Path to the Selenium folder#
     *
     * @var   string
     * @since  0.1.0
     */
    const SELENIUM_FOLDER = 'libraries/vendor/joomla-projects/selenium-server-standalone';

    /**
     * Path to the vendor folder
     *
     * @var   string
     * @since  0.1.0
     */
    protected $vendorPath = 'libraries/vendor/';

    /**
     * Path to the tests
     *
     * @var    string
     * @since  0.1.0
     */
    protected $testsPath = 'libraries/vendor/joomla/test-system/src/';

    /**
     * @var array | null
     * @since  0.1.0
     */
    protected $suiteConfig;

    /**
     * @var array
     * @since  0.1.0
     */
    protected static $osFolder = ['linux', 'mac', 'windows'];

	/**
	 * @var array
	 * @since  0.1.0
	 */
	protected $suites = [
			'acceptance/administrator/components/com_content',
			'acceptance/administrator/components/com_media',
			'acceptance/administrator/components/com_menu',
			'acceptance/administrator/components/com_users',
	];

	/**
     * Copy the Joomla installation excluding folders
     *
     * @param   string  $dst      Target folder
     * @param   array   $exclude  Exclude list of folders
     *
     * @throws  Exception
     *
     * @since   0.1.0
     *
     * @return  void
     */
    protected function copyJoomla($dst, $exclude = array())
    {
        $collection = $this->collectionBuilder();
        
        $dir = @opendir(".");

        if (false === $dir) {
            throw new Exception($this, "Cannot open source directory");
        }

        if (!is_dir($dst)) {
            mkdir($dst, 0755, true);
        }

        while (false !== ($file = readdir($dir))) {
            if (in_array($file, $exclude)) {
                continue;
            }

            if (($file !== '.') && ($file !== '..')) {
                $srcFile = "." . '/' . $file;
                $destFile = $dst . '/' . $file;

                if (is_dir($srcFile)) {
                    $collection->taskCopyDir([$srcFile => $destFile])->run();
                } else {
                    copy($srcFile, $destFile);
                }
            }
        }

        closedir($dir);
    }


    /**
     * Creates a testing Joomla site for running the tests (use it before run:test)
     *
     * @param   bool $useHtaccess (1/0) Rename and enable embedded Joomla .htaccess file
     *
     * @since   0.1.0
     *
     * @return  void
     */
    protected function createTestingSite($useHtaccess = false)
    {
        $collection = $this->collectionBuilder();
        
        $cmsPath = $this->getSuiteConfig()['modules']['config']['Helper\\Acceptance']['cmsPath'];
        $localUser = $this->getSuiteConfig()['modules']['config']['Helper\\Acceptance']['localUser'];

		// Clean old testing site
        if (is_dir($cmsPath)) {
            try {
                $collection->taskDeleteDir($cmsPath)->run();
            } catch (Exception $e) {
				// Sorry, we tried :(
                $this->printTaskInfo('Sorry, you will have to delete ' . $cmsPath . ' manually.');

                exit(1);
            }
        }

        $exclude = [
            '.drone',
            '.github',
            '.git',
            '.run',
            '.idea',
            'build',
            'dev',
            'node_modules',
            'tests',
            'test-install',
            '.appveyor.yml',
            '.babelrc',
            '.drone.yml',
            '.eslintignore',
            '.eslintrc',
            '.gitignore',
            '.hound.yml',
            '.php_cs',
            '.travis.yml',
            'appveyor-phpunit.xml',
            'build.js',
            'build.xml',
            'codeception.yml',
            'composer.json',
            'composer.lock',
            'configuration.php',
            'drone-package.json',
            'Gemfile',
            'htaccess.txt',
            'karma.conf.js',
            'package.json',
            'package-lock.json',
            'phpunit.xml.dist',
            'RoboFile.dist.ini',
            'RoboFile.php',
            'robots.txt.dist',
            'scss-lint.yml',
            'selenium.log',
            'travisci-phpunit.xml',
        ];

        $this->copyJoomla($cmsPath, $exclude);

		// Optionally change owner to fix permissions issues
        if (!empty($localUser)) {
            $collection->taskExec('chown -R ' . $localUser . ' ' . $cmsPath)->run();
        }

		// Optionally uses Joomla default htaccess file. Used by TravisCI
        if ($useHtaccess == true) {
            $this->printTaskInfo('Renaming htaccess.txt to .htaccess');
            $this->taskFilesystemStack()
                    ->copy('./htaccess.txt', $cmsPath . '/.htaccess')
                    ->run();
            $collection->taskExec('sed -e "s,# RewriteBase /,RewriteBase /test-install/joomla-cms,g" -in-place test-install/joomla-cms/.htaccess')
                        ->run();
        }

	    $this->printTaskInfo('Copy site finished!');
    }

    /**
     * Prepare the running codeception
     *
     * @param   array  $opts  Optional Options
     *
     * @return  string  Path to codeception
     *
     * @since   0.1.0
     */
    protected function prepareRun()
    {
        $collection = $this->collectionBuilder();

	    $this->printTaskInfo('Start server');

        $collection->taskRunSelenium(self::SELENIUM_FOLDER, $this->getWebdriver())
                    ->run();

		// Wait until the server started
        sleep(60);

	    $this->printTaskInfo('Server should have been started now');

		// Make sure to run the build command to generate AcceptanceTester
        if ($this->isWindows()) {
            $collection->taskExec('php ' . $this->getWindowsPath($this->vendorPath . 'bin/codecept') . ' build')
                        ->run();
        } else {
            $collection->taskExec('php ' . $this->vendorPath . 'bin/codecept build')
                        ->run();
        }

        return $this->getPathToCodeception();
    }

	/**
	 *
	 * Get the path to codeception
	 *
	 * @return string
	 */
    protected function getPathToCodeception()
    {
	    $pathToCodeception = $this->vendorPath . 'bin/codecept';

	    if ($this->isWindows()) {
		    $pathToCodeception = $this->getWindowsPath($this->vendorPath . 'bin/codecept');
	    }

	    return $pathToCodeception;
    }

    /**
     * Build the Webdriver path to be used with Selenium
     *
     * @return string
     */
    protected function buildWebDriverPath()
    {
        if ($this->webDriver === 'chrome') {
            return $this->seleniumFolder . '/bin/webdrivers/chrome/' . $this->getOsFolderName() . '/';
        }

        if ($this->webDriver === 'firefox') {
            return $this->seleniumFolder . '/bin/webdrivers/gecko/' . $this->getOsFolderName() . '/';
        }

        if ($this->webDriver === 'edge') {
            return $this->seleniumFolder . '/bin/webdrivers/edge/';
        }

        if ($this->webDriver === 'edge-insiders') {
            return $this->seleniumFolder . '/bin/webdrivers/edge-insiders/';
        }

        if ($this->webDriver === 'ie32') {
            return $this->seleniumFolder . '/bin/webdrivers/intenet-explorer32/';
        }
    }

    protected function getCmsBasePath() 
    {
        $cmsPath =  $this->getSuiteConfig()['modules']['config']['Helper\\Acceptance']['cmsPath'];

        if (!is_dir($cmsPath)) {
            throw new TaskException(
                __class__,
                'CmsPath not set.'
            );
        }

        return $cmsPath;
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

    /**
     * Get the suite configuration
     *
     * @param   string  $suite  Name of the test suite
     *
     * @return  array
     *
     * @since   0.1.0
     */
    protected function getSuiteConfig($suite = 'acceptance')
    {
        if (!$this->suiteConfig) {
            $this->suiteConfig = \Symfony\Component\Yaml\Yaml::parse(file_get_contents('libraries/vendor/joomla/test-system/src/' . $suite . '.suite.yml'));
        }

        return $this->suiteConfig;
    }

    /**
     * Detect the correct driver for selenium
     *
     * @return  string the webdriver string to use with selenium
     *
     * @since   0.1.0
     */
    public function getWebdriver()
    {
        $suiteConfig = $this->getSuiteConfig();
        $driver = $suiteConfig['modules']['config']['JoomlaBrowser']['browser'];

        return $driver;
    }

    /**
     * Return the correct path for Windows (needed by CMD)
     *
     * @param   string  $path  Linux path
     *
     * @return  string
     *
     * @since   0.1.0
     */
    protected function getWindowsPath($path)
    {
        return str_replace('/', DIRECTORY_SEPARATOR, $path);
    }

    /**
     * Check if local OS is Windows
     *
     * @return  bool
     *
     * @since   0.1.0
     */
    protected function isWindows()
    {
        return strtoupper(substr(PHP_OS, 0, 3)) === 'WIN';
    }
}
