<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); // Resume all session data
include 'connect.php';

$pdo = pdo_connect_mysql();
$stmt = $pdo->prepare('SELECT * FROM student_courses WHERE student_id=:student_id');
$stmt->execute(['student_id' => $_SESSION['id']]); // Execute the query

$courses = $stmt->fetchAll(); // Fetch all results

?>

<?=template_header('Courses')?>

<table>
  <tr>
    <th>Course</th>
    <th>Grade</th>
  </tr>
  <?php if ($courses): ?>
    <?php foreach ($courses as $course): ?>
      <?php 
        $stmt = $pdo->prepare('SELECT name FROM courses WHERE id=:id');
        $stmt->execute(['id' => $course['course_id']]);
        $courseName = $stmt->fetchColumn(); // Fetch the course name
      ?>
      <tr>
        <td><?= $courseName ?></td>
        <td><?= $course['grade'] ?></td>
      </tr>
    <?php endforeach; ?>
  <?php endif; ?>
</table>

<?=template_footer()?>
