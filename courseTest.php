<?php

require_once 'course_class.php';

require_once 'PHPUnit\Framework\TestCase.php';

/**
 * course test case.
 */
class courseTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var course
	 */
	private $course;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated courseTest::setUp()
		
		$this->course = new course(/* parameters */);
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated courseTest::tearDown()
		$this->course = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests course->get_courses()
	 */
	public function testGet_courses() {
		// TODO Auto-generated courseTest->testGet_courses()
		//$this->markTestIncomplete ( "get_courses test not implemented" );
		
		$this->course->get_courses(/* parameters */);
	}
	
	/**
	 * Tests course->check_prerequsted()
	 */
	public function testCheck_prerequsted() {
		// TODO Auto-generated courseTest->testCheck_prerequsted()
		//$this->markTestIncomplete ( "check_prerequsted test not implemented" );
		
		$this->course->check_prerequsted(/* parameters */);
	}
	
	/**
	 * Tests course->check_pass()
	 */
	public function testCheck_pass() {
		// TODO Auto-generated courseTest->testCheck_pass()
		//$this->markTestIncomplete ( "check_pass test not implemented" );
		
		$actual=$this->course->check_pass(11/* parameters */);
		$this->assertEquals(1, $actual);
	}
	
	/**
	 * Tests course->RegisterCourse()
	 */
	public function testRegisterCourse() {
		// TODO Auto-generated courseTest->testRegisterCourse()
		//$this->markTestIncomplete ( "RegisterCourse test not implemented" );
		
		$this->course->RegisterCourse(/* parameters */);
	}
	
	/**
	 * Tests course->open_course()
	 */
	public function testOpen_course() {
		// TODO Auto-generated courseTest->testOpen_course()
		//$this->markTestIncomplete ( "open_course test not implemented" );
		
		$this->course->open_course(/* parameters */);
	}
	
	/**
	 * Tests course->add_course()
	 */
	public function testAdd_course() {
		// TODO Auto-generated courseTest->testAdd_course()
		//$this->markTestIncomplete ( "add_course test not implemented" );
		
		$this->course->add_course(/* parameters */);
	}
	
	/**
	 * Tests course->delete_course()
	 */
	public function testDelete_course() {
		// TODO Auto-generated courseTest->testDelete_course()
		//$this->markTestIncomplete ( "delete_course test not implemented" );
		
		$this->course->delete_course(/* parameters */);
	}
	
	/**
	 * Tests course->add_new_course()
	 */
	public function testAdd_new_course() {
		// TODO Auto-generated courseTest->testAdd_new_course()
		//$this->markTestIncomplete ( "add_new_course test not implemented" );
		
		$this->course->add_new_course(/* parameters */);
	}
}

