<?php
namespace jf;
abstract class Test extends \PHPUnit_Framework_TestCase
{
	function __construct() {
		parent::__construct();
	}
	/**
	 * Adds another module to the test suite
	 * @param string $TestModule
	 */
	function add($TestModule)
	{
		$file=jf::moduleFile($TestModule);;
		if (!in_array($file, TestLauncher::$TestFiles))
		{
			TestLauncher::$TestFiles[]=$file;
			TestLauncher::$TestSuite->addTestFile($file);
		}
	}
	
}

abstract class TestSuite extends \PHPUnit_Framework_TestCase
{
	/**
	 * Adds another module to the test suite
	 * @param string $TestModule
	 */
	function add($TestModule)
	{
		$file=jf::moduleFile($TestModule);;
		if (!in_array($file, TestLauncher::$TestFiles))
		{
			TestLauncher::$TestFiles[]=$file;
			TestLauncher::$TestSuite->addTestFile($file);
			
		}
	}
	function testTrue()
	{
		
	}
	
}

abstract class DbTest extends \PHPUnit_Framework_TestCase
{
	/**
	 * You can override this to provide custom database connection setting
	 * @returns \jf\DatabaseSetting
	 */
	function dbConfig()
	{
		$dbConfig=DatabaseManager::Configuration();
		$dbConfig->DatabaseName.="_test";
		return $dbConfig;
	}
	function setUp()
	{
		jf::SQL("DROP DATABASE ".$this->dbConfig()->DatabaseName);
		jf::db()->Initialize($this->dbConfig->Database);		
	}
	
	private static $initiated=false;
	
	function __construct() {
		parent::__construct();
		if (!self::$initiated)
		{
			DatabaseManager::AddConnection($this->dbConfig());
			DatabaseManager::$DefaultIndex++;
			self::$initiated=true;
		}
	}
		
}
?>