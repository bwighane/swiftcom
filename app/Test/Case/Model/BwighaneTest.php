<?php
App::uses('Bwighane', 'Model');

/**
 * Bwighane Test Case
 *
 */
class BwighaneTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.bwighane'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Bwighane = ClassRegistry::init('Bwighane');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bwighane);

		parent::tearDown();
	}

}
