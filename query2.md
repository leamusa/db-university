# Query 2

## Description

Using the same database as last time, run the attached queries.
Upload a second file in the same repo as yesterday db-university with today’s queries.

```sql
# Group by

## Count how many members there were each year

SELECT COUNT(id) AS 'enrolments_by_year', YEAR(enrolment_date) FROM students GROUP BY YEAR(enrolment_date);

## Count the teachers who have the office in the same building

SELECT COUNT(id) AS 'teachers_by_office', office_address FROM teachers GROUP BY office_address;

## Calculate the average of the marks of each exam

SELECT AVG(vote), exam_id FROM exam_student GROUP BY exam_id;

## Count how many degree courses there are for each department

SELECT COUNT(id) AS 'degrees_by_department', department_id FROM degrees GROUP BY department_id;

# Joins

## Select all students enrolled in the Bachelor of Science in Economics

SELECT students.*, degrees.name AS degree_name
FROM students
INNER JOIN degrees
ON students.degree_id = degrees.id
WHERE degrees.name = 'Bachelor of Science in Economics';

## Select all Master of Science in the Department of Neuroscience

SELECT degrees.id, degrees.name, degrees.level, departments.name AS department_name
FROM departments
INNER JOIN degrees
ON departments.id = degrees.department_id
WHERE departments.name = 'Department of Neuroscience'
AND degrees.level = 'Master';

## Select all courses where Fulvio Amato (id=44) teaches

SELECT courses.*
FROM courses
INNER JOIN teachers
ON courses.teacher_id = teachers.id
WHERE teachers.id = 44;

## Select all students with the data relating to the degree programme to which they are enrolled and the relevant department, in alphabetical order by surname and first name

SELECT students.*, degree_courses.name AS degree_program, departments.name AS department
FROM students
INNER JOIN degree_courses ON students.degree_id = degree_courses.id
INNER JOIN departments ON degree_courses.department_id = departments.id
ORDER BY students.surname, students.first_name;

## Select all degree programmes with their courses and teachers

SELECT degree_courses.name AS degree_program, courses.name AS course, teachers.name AS teacher
FROM degree_courses
INNER JOIN courses ON degree_courses.id = courses.degree_course_id
INNER JOIN teachers ON courses.teacher_id = teachers.id;

## Select all teachers who teach in the Department of Mathematics (54)

SELECT teachers.*
FROM teachers
INNER JOIN department_teacher
ON teachers.id = department_teacher.teacher_id
WHERE department_teacher.department_id = 54;


# BONUS

## Select for each student the number of attempts taken for each exam, also printing the maximum mark. Next, filter attempts with a minimum score of 18
```
