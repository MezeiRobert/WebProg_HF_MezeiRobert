<?php

require_once "Student.php";
require_once "Subject.php";
require_once "University.php";

$univ = new University();

$webProg = null;
$database = null;

try {
    $webProg = $univ->addSubject('101', 'Web programming');
    $database = $univ->addSubject('102', 'Database');
} catch (Exception $e) {
    echo $e->getMessage();
}

$student1 = $webProg->addStudent('Kiss Pista', '520');
$student2 = $webProg->addStudent('Nagy Feri', '521');
$student3 = $database->addStudent('Egy Elek', '522');
$student4 = $database->addStudent('Ket Ella', '523');

$student1->setGrade($webProg, 6.0);
$student2->setGrade($database, 8.5);
$student1->setGrade($database, 7.3);
$student2->setGrade($webProg, 5.9);
$student3->setGrade($webProg, 9.1);
$student4->setGrade($database, 6.2);
$student3->setGrade($database, 5.0);
$student4->setGrade($webProg, 8.8);

$univ->addSubject('103', 'Java programming');
$univ->addStudentOnSubject('103', new Student("Harom Ella", "524"));

$univ->print();
echo "Total number of students: " . $univ->getNumberOfStudents();

echo "<br><br>";
$webProg->deleteStudent($student1);
$webProg->deleteStudent($student2);

$univ->print();

echo "<br><br>";
$univ->deleteSubject($webProg);

$univ->print();

echo "<br><br>";
$avgGrade = $student1->getAvgGrade();
echo "Average grade of {$student1->getName()}: $avgGrade <br>";
echo "<br><br>";

$subjectNames = ['101' => $webProg, '102' => $database];

echo "{$student1->getName()}: <br>";
$student1->printGrades($subjectNames);

echo "<br><br>";
$studentList=[$student1,$student2,$student3,$student4];
$sortedList= Student::sortStudents($studentList);

echo "Sorted students: <br>";
foreach ($sortedList as $student){
    echo "{$student->getName()} - Average grade: {$student->getAvgGrade()}<br>";
}