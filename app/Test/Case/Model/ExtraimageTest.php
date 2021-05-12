<?php
App::uses('Extraimage', 'Model');

/**
 * Extraimage Test Case
 *
 */
class ExtraimageTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.extraimage',
		'app.product',
		'app.category',
		'app.subcategory'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Extraimage = ClassRegistry::init('Extraimage');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Extraimage);

		parent::tearDown();
	}

}
