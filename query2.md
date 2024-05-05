# Query 2

## Description

- Using the same database as last time, run the attached queries.
  Upload a second file in the same repo as yesterday db-university with today’s queries.

## Group by

```sql
## Count how many members there were each year:

SELECT
 COUNT(id) AS 'enrolments_by_year', YEAR(enrolment_date)
FROM students
GROUP BY YEAR(enrolment_date);

## Count the teachers who have the office in the same building:
SELECT
 COUNT(id)
AS 'teachers_by_office', office_address
FROM teachers
GROUP BY office_address;

## Calculate the average of the marks of each exam:
SELECT AVG(vote),
exam_id
FROM exam_student
GROUP BY exam_id;

## Count how many degree courses there are for each department:
SELECT
COUNT(degrees.id) AS 'degrees_by_department',
departments.id AS 'department_id' FROM degrees
INNER JOIN departments ON degrees.department_id = departments.id
GROUP BY departments.id;

# Joins

## Select all students enrolled in the Bachelor of Science in Economics:
SELECT
students.*,
degrees.name AS degree_name FROM students
INNER JOIN degrees ON students.degree_id = degrees.id
WHERE degrees.name = 'Laurea in Economia';

## Select all Master of Science in the Department of Neuroscience:
SELECT
 degrees.id,
 degrees.name,
 degrees.level,
 departments.name AS department_name FROM departments INNER JOIN degrees ON departments.id = degrees.department_id
 WHERE departments.name = 'Dipartmento of Neuroscienza' AND degrees.level = 'Magitrale';


## Select all courses where Fulvio Amato (id=44) teaches:
SELECT
 id
FROM teachers
WHERE name = 'fulvio' AND surname = 'amato';

## Select all students with the data relating to the degree programme to which they are enrolled and the relevant department, in alphabetical order by surname and first name:
SELECT
 students.name,
 students.surname,
 degrees.name
AS 'degree_name', departments.name AS 'department_name'
FROM students
INNER JOIN degrees ON students.degree_id = degrees.id
INNER JOIN departments ON degrees.department_id = departments.id
ORDER BY students.surname ASC, students.name ASC;

## Select all degree programmes with their courses and teachers:
SELECT
    courses.name AS 'course_name',
    degrees.name AS 'degree_name',
    teachers.id AS 'teacher_id',
    teachers.name AS 'teacher_name',
    teachers.surname AS 'teacher_surname'
FROM courses
INNER JOIN degrees ON courses.degree_id = degrees.id
INNER JOIN course_teacher ON courses.id = course_teacher.course_id
INNER JOIN teachers ON course_teacher.teacher_id = teachers.id;


## Select all teachers who teach in the Department of Mathematics (54):
SELECT DISTINCT
    teachers.id,
    teachers.name,
    teachers.surname,
    departments.name AS department_name
FROM teachers
INNER JOIN course_teacher ON teachers.id = course_teacher.teacher_id
INNER JOIN courses ON course_teacher.course_id = courses.id
INNER JOIN degrees ON courses.degree_id = degrees.id
INNER JOIN departments ON degrees.department_id = departments.id
WHERE departments.name = 'Dipartimento di Matematica';

# BONUS
## Select for each student the number of Try taken for each exam also printing the maximum grade and minimum score 18.

SELECT students.id, students.name, students.surname,
COUNT(exam_id) AS exam_try,
MAX(vote) AS max_vote,
MIN(vote) AS min_vote
FROM exam_student
JOIN students ON exam_student.student_id = students.id
GROUP BY students.id, students.name, students.surname
HAVING MIN(vote) >= 18 AND MAX(vote) <= 30;


------





```
