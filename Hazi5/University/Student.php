<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:40 PM
 */

/**
 * Class Student
 */
class Student
{
    private string $name;
    private string $studentNumber;
    private array $grades = [];

    public function __construct($name, $studentNumber)
    {
        $this->name = $name;
        $this->studentNumber = $studentNumber;
    }

    public function setGrade(Subject $subject, float $grade): void
    {
        $this->grades[$subject->getCode()] = $grade;
    }

    public function getAvgGrade():float
    {
        if (count($this->grades) === 0){
            return 0.0;
        }
        $sum = array_sum($this->grades);
        return $sum / count($this->grades);
    }

    public function printGrades(array $subjectNames): void
    {
        foreach ($this->getGrades() as $subjectCode => $grade) {
            $subjectName = $subjectNames[$subjectCode] ?? $subjectCode;
            echo $subjectName . " - " . $grade . "<br>";
        }
    }

    public static function sortStudents(array $students)
    {
        usort($students, function (Student $student1, Student $student2){
            return $student2->getAvgGrade() <=> $student1->getAvgGrade();
        });

        return $students;
    }

	/**
	 * @return string
	 */
	public function getName(): string {
		return $this->name;
	}
	
	/**
	 * @param string $name 
	 * @return self
	 */
	public function setName(string $name): self {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return string
	 */
	public function getStudentNumber(): string {
		return $this->studentNumber;
	}
	
	/**
	 * @param string $studentNumber 
	 * @return self
	 */
	public function setStudentNumber(string $studentNumber): self {
		$this->studentNumber = $studentNumber;
		return $this;
	}

    public function getGrades(): array
    {
        return $this->grades;
    }
}
