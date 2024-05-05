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
--- SELECT all students in the degree table and print as degree_name
SELECT
    students.*,
    degrees.name AS degree_name
-- Select data from the 'students' table, which contains information about students.
FROM students
-- Join the 'students' table with the 'degrees' table to link students with their respective degrees.
INNER JOIN degrees ON students.degree_id = degrees.id
-- Filter the results to include only rows where the degree's name is 'Laurea in Economia'.
WHERE degrees.name = 'Laurea in Economia';


## Select all Master of Science in the Department of Neuroscience:
--- SELECT id, name, level of degrees and department name will be printed as  department_name
SELECT
    degrees.id,
    degrees.name,
    degrees.level,
    departments.name AS department_name
-- Select data from the 'departments' table, which contains information about departments.
FROM departments
-- Join the 'departments' table with the 'degrees' table to link departments with their respective degrees.
INNER JOIN degrees ON departments.id = degrees.department_id
-- Filter the results to include only rows where the department's name is 'Dipartimento of Neuroscienza' and the degree level is 'Magistrale'.
WHERE departments.name = 'Dipartimento of Neuroscienza' AND degrees.level = 'Magistrale';


## Select all courses where Fulvio Amato (id=44) teaches:
--- SELECT id courses FROM teachers
SELECT
    courses.id
-- Select data from the 'teachers' table, which contains information about teachers.
FROM teachers
-- Filter the results to include only rows where the teacher's name is 'Fulvio' and surname is 'Amato'.
WHERE name = 'Fulvio' AND surname = 'Amato';

## Select all students with the data relating to the degree programme to which they are enrolled and the relevant department, in alphabetical order by surname and first name:
-- Select all students with information about their degree programme and relevant department, sorted alphabetically by surname and first name:
SELECT
    students.name,
    students.surname,
    degrees.name AS 'degree_name',
    departments.name AS 'department_name'
-- Select data from the 'students' table, which contains information about students.
FROM students
-- Join the 'students' table with the 'degrees' table to link students with their degree programmes.
INNER JOIN degrees ON students.degree_id = degrees.id
-- Join the 'degrees' table with the 'departments' table to associate degree programmes with their respective departments.
INNER JOIN departments ON degrees.department_id = departments.id
-- Sort the results in alphabetical order by surname and first name of the students.
ORDER BY students.surname ASC, students.name ASC;



## Select all teachers who teach in the Department of Mathematics (54):
-- Select all teachers who teach in the Department of Mathematics (54):
SELECT DISTINCT
    teachers.id,
    teachers.name,
    teachers.surname,
    departments.name AS department_name
--- Select data from the 'teachers' table, which contains information about teachers. ----
FROM teachers
-- Join the 'teachers' table with the 'course_teacher' table to link teachers with courses they teach.
INNER JOIN course_teacher ON teachers.id = course_teacher.teacher_id
-- Join the 'course_teacher' table with the 'courses' table to link courses with their details.
INNER JOIN courses ON course_teacher.course_id = courses.id
-- Join the 'courses' table with the 'degrees' table to associate courses with their respective degrees.
INNER JOIN degrees ON courses.degree_id = degrees.id
-- Join the 'degrees' table with the 'departments' table to associate degrees with their respective departments.
INNER JOIN departments ON degrees.department_id = departments.id
-- Filter the results to include only teachers who teach in the Department of Mathematics.
WHERE departments.name = 'Dipartimento di Matematica';


# BONUS
## Select for each student the number of tries taken for each exam, also printing the maximum grade and minimum score 18.

-- Select "ID, name, surname" FROM the exam_student table
SELECT students.id, students.name, students.surname,
-- Count the number of exam tries for each student; the result will be under the number_of_tries table
COUNT(exam_id) AS number_of_tries,
-- Determine the maximum and minimum vote for each student; the results will be under the max_vote and min_vote tables
MAX(vote) AS max_vote,
MIN(vote) AS min_vote
-- Related to SELECT
FROM exam_student
-- JOIN operation between the exam_student table and the id of the students table
JOIN students ON exam_student.student_id = students.id
-- GROUP BY groups together the results according to the id, name, and surname of each student
GROUP BY students.id, students.name, students.surname
-- Each student can have a minimum grade of 18 or more and a maximum grade of 30 or less
HAVING MIN(vote) >= 18 AND MAX(vote) <= 30;






```
