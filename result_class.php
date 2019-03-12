
<?php
require_once 'DB.php';
class result {

function view_result ($st_id,$st_code) {
	$db=new DB();
	$q="SELECT course.name, registered_courses.grade, registered_courses.GPA, result.status
FROM course, registered_courses, result
WHERE registered_courses.st_id =".$st_id.
" AND result.st_id =".$st_code.
" AND course.ID = registered_courses.course_id
 AND course.ID = result.course_id";
	$result=$db->Select($q);
	return $result;
}
}
?>

