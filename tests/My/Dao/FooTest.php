<?php

namespace My\Dao;

class FooTest extends \PHPUnit_Extensions_Database_TestCase
{
    protected $host = 'localhost';
	protected $schema = 'phpunit_db';
	protected $db;
	protected $foo;

	/**
	 * Instantiates the instance under test.
	 */
	protected function setUp()
	{
		// \PHPUnit_Extensions_Database_TestCase uses this for important stuff, so be sure to call it
		parent::setUp();

		$this->foo = new Foo($this->getDb());
	}

	/**
	 * Returns a database connection.
	 *
	 * @return \PDO
	 */
	protected function getDb()
	{
		if (!$this->db) {
			$this->db = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->schema, 'root');
		}
		return $this->db;
	}

	/**
	 * Return the path to a directory containing MySQL XML data set files.
	 *
	 * @return string
	 */
	protected function getFilesDirectory()
	{
		return __DIR__ . '/_files';
	}

	/**
	 * Shorthand for getting a data set specific to the current test.
	 *
	 * @param string $name Name of the data set file without the file extension
	 * @return PHPUnit_Extensions_Database_DataSet_MysqlXmlDataSet
	 */
	protected function getDataSetFromFile($name)
	{
		return $this->createMySQLXMLDataSet($this->getFilesDirectory() . '/' . $this->getName(false) . '/' . $name . '.xml');
	}

	/**
	 * Shorthand for getting

    /**
     * @return PHPUnit_Extensions_Database_DB_IDatabaseConnection
     */
    protected function getConnection()
    {
        return $this->createDefaultDBConnection($this->getDb(), $this->schema);
    }

    /**
     * @return PHPUnit_Extensions_Database_DataSet_IDataSet
     */
    protected function getDataSet()
    {
        return $this->getDataSetFromFile('seed');
    }

	/**
	 * Tests inserting a valid record.
	 */
	public function testInsertWithValidRecord()
	{
		$this->foo->insert(array('bar' => 'foobar', 'baz' => 'foobaz'));
		$actual = $this->getConnection()->createQueryTable('foo', 'SELECT * FROM `foo`');
		$expected = $this->getDataSetFromFile('expected')->getTable('foo');
		$this->assertTablesEqual($actual, $expected);
	}
}
