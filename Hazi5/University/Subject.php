<?php
/**
 * User: TheCodeholic
 * Date: 4/8/2020
 * Time: 10:16 PM
 */

/**
 * Class Subject
 */
class Subject
{
    private string  $code;
    private string $name;
    /**
     * @var Student[]
     */
    private array $students;



    // TODO Generate getters and setters
    // TODO Generate constructor for all attributes. $students argument of the constructor can be empty

    //ToDo
    /**
     * @param string $code
     * @param string $name
     * @param Student[] $students
     */
    public function __construct(string $code, string $name, array $students = [])
    {
        $this->code = $code;
        $this->name = $name;
        $this->students = $students;
    }

    /**
     * Method accepts student name and number, creates instance of the Student class, adds inside $students array
     * and returns created instance
     *
     * @param string $name
     * @param string $studentNumber
     * @return \Student
     */
    public function addStudent(string $name, string $studentNumber): Student
    {
        if ($this->isStudentExists($studentNumber))
        {
            throw new Exception("The student is already exist!");
        }

        $student = new Student($name,$studentNumber);
        $this->students[]=$student;

        return $student;
    }

    public function deleteStudent(Student $student)
    {
        $studentkey = array_search($student, $this->students, true);

        if ($studentkey = true) {
            unset($this->students[$studentkey-1]);
            $this->students = array_values($this->students);
            echo "{$student->getName()} torlesre kerult<br>";
            return true;
        }
        return false;
    }

    // ToDo
    private function isStudentExists(string $studentNumber): bool
    {
        foreach ($this->students as $student)
            {
                if ($student->getStudentNumber() === $studentNumber)
                {
                   return true;
                }
            }
        return false;
    }

    public function __toString(): string
    {
        return "{$this->code}- {$this->name}";
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getStudents(): array
    {
        return $this->students;
    }

    public function setStudents(array $students): void
    {
        $this->students = $students;
    }


}
