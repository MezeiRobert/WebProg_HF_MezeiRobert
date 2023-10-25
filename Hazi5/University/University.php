<?php
require_once "AbstractUniversity.php";

class University extends AbstractUniversity
{
    public function addSubject(string $code, string $name): Subject
    {
        if ($this->isSubjectExists($code,$name))
        {
            throw new Exception("The subject is already exist!");
        }

        $subject = new Subject($code, $name);
        $this->subjects[]=$subject;

        return $subject;
    }

    public function deleteSubject(Subject $subject)
    {
        $subjectkey = array_search($subject, $this->subjects, true);

        if ($subjectkey === false) {
            throw new Exception("The subject does not exist!");
        }

        if (count($subject->getStudents()) === 0) {
            unset($this->subjects[$subjectkey]);
            $this->subjects = array_values($this->subjects);
            echo "Tantargy torlesre kerult <br>";
        } else {
            throw new Exception("The subject has students assigned. Cannot delete.");
        }
    }


    public function isSubjectExists(string $code, string $name): bool
    {
        foreach ($this->subjects as $subject)
        {
            if ($subject->getCode() === $code && $subject->getName() === $name)
            {
                return true;
            }
        }
        return false;
    }
    /**
     * Method accepts subject code and Student. Finds subject in $subjects array based on code and adds student to its array.
     *
     * @param string   $subjectCode
     * @param \Student $student
     * @return mixed
     */
    public function addStudentOnSubject(string $subjectCode, Student $student): void
    {
        foreach ($this->subjects as $subject) {
            if ($subject->getCode() == $subjectCode) {
                $subject->addStudent($student->getName(), $student->getStudentNumber());
            }
        }
    }

    /**
     * Method returns students for given subject
     *
     * @param string $subjectCode
     * @return mixed
     */
    public function getStudentsForSubject(string $subjectCode)
    {
        $studentsArray = [];

        foreach ($this->subjects as $subject) {
            if ($subject->getCode() === $subjectCode){
                $studentsArray = $subject->getStudents();
                break;
            }
        }
        return $studentsArray;
    }

    /**
     * This method returns number of total students registered on all subjects
     *
     * @return int
     */

    /**
     * Method must iterate over $subjects, print the subject name then "-" 25 times,
     * then iterate over students of the subject and print student name and student number in format
     * StudentName - StudentNumber
     * Student2Name - Student2Number
     *
     * @return mixed
     */
    public function print(): void
    {
        foreach ($this->subjects as $subject) {
            echo '--------------------------------'. '<br>';
            echo $subject. "<br>";
            echo '--------------------------------'. '<br>';

            foreach ($subject->getStudents() as $student){
                echo $student->getName(). " - " . $student->getStudentNumber();
                echo "<br>";
            }
        }
    }

    public function getNumberOfStudents(): int
    {
        $total = 0;
        foreach ($this->subjects as $subject) {
            foreach ($subject->getStudents() as $st) {
                $total++;
            }
        }
        return $total;
    }
}
