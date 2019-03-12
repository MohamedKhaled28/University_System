<?php

require_once 'student_class.php';
session_start();
$_SESSION['ID']=6;
/**
 * student test case.
 */
class studentTest extends PHPUnit_Framework_TestCase {
	
	/**
	 *
	 * @var student
	 */
	private $student;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated studentTest::setUp()
		
		$this->student = new student(/* parameters */);
	}
	
	
	protected function tearDown() {
		// TODO Auto-generated studentTest::tearDown()
		$this->student = null;
		
		parent::tearDown ();
	}
	
	
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	public function testUpdate() {
		// TODO Auto-generated studentTest->testUpdate()
		//$this->markTestIncomplete ( "update test not implemented" );
		
		$this->student->update();
	}
	
	public function testAdd_student() {
		// TODO Auto-generated studentTest->testAdd_student()
		//$this->markTestIncomplete ( "add_student test not implemented" );
		
		$this->student->add_student();
	}
	
	public function testDisplay() {
		// TODO Auto-generated studentTest->testDisplay()
		//$this->markTestIncomplete ( "display test not implemented" );
		
		$this->student->display();
	}
	
	public function testRegister_course() {
		// TODO Auto-generated studentTest->testRegister_course()
		//$this->markTestIncomplete ( "register_course test not implemented" );
		
		$this->student->register_course();
	}
	
	public function testCalculate_GPA() {
		// TODO Auto-generated studentTest->testCalculate_GPA()
		//$this->markTestIncomplete ( "Calculate_GPA test not implemented" );
		
		$this->student->Calculate_GPA();
	}
	
	public function testShow_result() {
		// TODO Auto-generated studentTest->testShow_result()
		//$this->markTestIncomplete ( "show_result test not implemented" );
		
		$this->student->show_result();
	}
	
	public function testEdit_profile() {
		// TODO Auto-generated studentTest->testEdit_profile()
		//$this->markTestIncomplete ( "edit_profile test not implemented" );
		
		$this->student->edit_profile();
	}
	
	
	public function testView_schedule() {
		// TODO Auto-generated studentTest->testView_schedule()
		//$this->markTestIncomplete ( "view_schedule test not implemented" );
		
		$this->assertEquals(true,$this->student->view_schedule());
	}
}

