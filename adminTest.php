<?php

require_once 'admin_class.php';

require_once 'PHPUnit\Framework\TestCase.php';

/**
 * admin test case.
 */
class adminTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var admin
	 */
	private $admin;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated adminTest::setUp()
		
		$this->admin = new admin(/* parameters */);
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated adminTest::tearDown()
		$this->admin = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests admin->register_observer()
	 */
	public function testRegister_observer() {
		// TODO Auto-generated adminTest->testRegister_observer()
		//$this->markTestIncomplete ( "register_observer test not implemented" );
		
		$this->admin->register_observer(/* parameters */);
	}
	
	/**
	 * Tests admin->remove_observer()
	 */
	public function testRemove_observer() {
		// TODO Auto-generated adminTest->testRemove_observer()
		//$this->markTestIncomplete ( "remove_observer test not implemented" );
		
		$this->admin->remove_observer(/* parameters */);
	}
	
	/**
	 * Tests admin->notify_observer()
	 */
	public function testNotify_observer() {
		// TODO Auto-generated adminTest->testNotify_observer()
		//$this->markTestIncomplete ( "notify_observer test not implemented" );
		
		$this->admin->notify_observer(/* parameters */);
	}
	
	/**
	 * Tests admin->add_new_student()
	 */
	public function testAdd_new_student() {
		// TODO Auto-generated adminTest->testAdd_new_student()
		//$this->markTestIncomplete ( "add_new_student test not implemented" );
		
		$this->admin->add_new_student(/* parameters */);
	}
	
	/**
	 * Tests admin->remove_student()
	 */
	public function testRemove_student() {
		// TODO Auto-generated adminTest->testRemove_student()
		//$this->markTestIncomplete ( "remove_student test not implemented" );
		
		$this->admin->remove_student(/* parameters */);
	}
	
	/**
	 * Tests admin->open_new_course()
	 */
	public function testOpen_new_course() {
		// TODO Auto-generated adminTest->testOpen_new_course()
		//$this->markTestIncomplete ( "open_new_course test not implemented" );
		
		$this->admin->open_new_course(/* parameters */);
	}
	
	/**
	 * Tests admin->register_new_course()
	 */
	public function testRegister_new_course() {
		// TODO Auto-generated adminTest->testRegister_new_course()
		//$this->markTestIncomplete ( "register_new_course test not implemented" );
		
		$this->admin->register_new_course(/* parameters */);
	}
	
	/**
	 * Tests admin->add_new_department()
	 */
	public function testAdd_new_department() {
		// TODO Auto-generated adminTest->testAdd_new_department()
		//$this->markTestIncomplete ( "add_new_department test not implemented" );
		
		$this->admin->add_new_department(/* parameters */);
	}
	
	/**
	 * Tests admin->add_stuff()
	 */
	public function testAdd_stuff() {
		// TODO Auto-generated adminTest->testAdd_stuff()
		//$this->markTestIncomplete ( "add_stuff test not implemented" );
		
		$this->admin->add_stuff(/* parameters */);
	}
}

