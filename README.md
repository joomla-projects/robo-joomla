# robo-joomla
Robo tasks for Joomla! development, build, testing and everything


## Installation (Standalone):

  * `composer install`
  * Initialized here. Please run `robo init` to create a new RoboFile.

Read more about [how to install composer](https://getcomposer.org/doc/00-intro.md) here.

## Function overview:

# Scaffold
  * `vendor/bin/robo Scaffold:Component`  Scaffold a component extensions
  * `vendor/bin/robo Scaffold:Module`     Scaffold a module extensions
  * `vendor/bin/robo Scaffold:Plugin`     Scaffold a plugin extensions
# self
  * `vendor/bin/robo self:update`         [update] Updates the robo.phar to the latest version.

## How-to create extension

#### Components

Use the command `vendor/bin/robo Scaffold:Component com_test` for creating the folders for a component.

```
$ vendor/bin/robo Scaffold:Component com_test
 [JoomlaScaffold\ScaffoldComponent] Creating Component com_test in code
 [Filesystem\FilesystemStack] mkdir ["code"]
 [Filesystem\FilesystemStack] mkdir ["code/administrator"]
 [Filesystem\FilesystemStack] mkdir ["code/administrator"]
 [Filesystem\FilesystemStack] mkdir ["code/administrator/components"]
 [Filesystem\FilesystemStack] mkdir ["code/administrator/components/com_com_test"]
 [Filesystem\FilesystemStack] mkdir ["code/administrator/language"]
 [Filesystem\FilesystemStack] mkdir ["code/administrator/language/en-GB"]
 [Filesystem\FilesystemStack] mkdir ["code/administrator/language/de-DE"]
 [Filesystem\FilesystemStack] mkdir ["code/components"]
 [Filesystem\FilesystemStack] mkdir ["code/components/com_com_test"]
 [Filesystem\FilesystemStack] mkdir ["code/language"]
 [Filesystem\FilesystemStack] mkdir ["code/language/en-GB"]
 [Filesystem\FilesystemStack] mkdir ["code/language/de-DE"]
```

#### Modules

```
$ vendor/bin/robo Scaffold:Module mod_test
 [JoomlaScaffold\ScaffoldModule] Creating Module mod_test in code
 [Filesystem\FilesystemStack] mkdir ["code/modules"]
 [Filesystem\FilesystemStack] mkdir ["code/modules/mod_mod_test"]
 [Filesystem\FilesystemStack] mkdir ["code/modules/language"]
 [Filesystem\FilesystemStack] mkdir ["code/modules/language/en-GB"]
 [Filesystem\FilesystemStack] mkdir ["code/modules/language/de-DE"]


```

#### Plugins

```
$ vendor/bin/robo Scaffold:Plugin test system
 [JoomlaScaffold\ScaffoldPlugin] Creating Plugin (system) test in code
 [Filesystem\FilesystemStack] mkdir ["code/plugins"]
 [Filesystem\FilesystemStack] mkdir ["code/plugins/system"]
 [Filesystem\FilesystemStack] mkdir ["code/plugins/system/test"]
 [Filesystem\FilesystemStack] mkdir ["code/plugins/system/test/language"]
 [Filesystem\FilesystemStack] mkdir ["code/plugins/system/test/language/en-GB"]
 [Filesystem\FilesystemStack] mkdir ["code/plugins/system/test/language/de-DE"]

```


## Usage in your own extension

### Directory setup

In order to use Robo-Joomla you should use the following directory structure (it's like the "common" joomla one)

#### Components

```
source/administrator/components/com_name/
source/administrator/components/com_name/name.xml
source/administrator/components/com_name/script.php (Optional)
source/components/com_name/
source/administrator/language/en-GB/en-GB.com_name.ini
source/administrator/language/en-GB/en-GB.com_name.sys.ini
source/language/en-GB/en-GB.com_name.ini
source/media/com_name
```

#### Modules

```
source/modules/mod_something
source/media/mod_something
source/language/en-GB/en-GB.mod_something.ini
```

#### Plugins

```
source/plugins/type/name
source/media/plg_type_name
source/administrator/language/en-GB/en-GB.plg_type_name.ini
```

### Extension setup

Either use the sample RoboFile or extend your own with it.
