<?php

use Zizaco\FactoryMuff\FactoryMuff;

class TestCase extends Illuminate\Foundation\Testing\TestCase {

	/**
	 * Factory object.
	 *
	 * @var Zizaco\FactoryMuff\FactoryMuff
	 */
	protected $factory;

	/**
	 * Instantiate the class.
	 *
	 * @internal param \Zizaco\FactoryMuff\FactoryMuff $factory
	 */
	public function __construct()
	{
		parent::__construct();

		$this->factory = new FactoryMuff;
	}

	/**
	 * Run the parent setup and then prepare for tests.
	 *
	 * @return void
	 */
	public function setUp()
	{
		parent::setUp();

		$this->prepareTests();
	}

	/**
	 * Creates the application.
	 *
	 * @return \Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;

		$testEnvironment = 'testing';

		return require __DIR__ . '/../../bootstrap/start.php';
	}

	/**
	 * Prepares the application for testing.
	 *
	 * @return void
	 */
	private function prepareTests()
	{
		Artisan::call('migrate');
	}

	/**
	 * Overload call so that we can do $this->get, etc.
	 *
	 * @param $method
	 * @param $args
	 *
	 * @return \Illuminate\Http\Response
	 * @throws BadMethodCallException
	 */
	public function __call($method, $args)
	{
		if (in_array($method, ['get', 'post', 'put', 'patch', 'delete']))
		{
			if (array_key_exists(1, $args))
			{
				return $this->client->request($method, $args[0], $args[1]);
			}

			return $this->client->request($method, $args[0]);
		}

		throw new BadMethodCallException;
	}

}
