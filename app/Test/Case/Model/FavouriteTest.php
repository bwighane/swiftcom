<?php
App::uses('Favourite', 'Model');

/**
 * Favourite Test Case
 *
 */
class FavouriteTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.favourite',
		'app.user',
		'app.district',
		'app.contact',
		'app.product',
		'app.category',
		'app.subcategory',
		'app.extraimage',
		'app.review'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Favourite = ClassRegistry::init('Favourite');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Favourite);

		parent::tearDown();
	}

}
