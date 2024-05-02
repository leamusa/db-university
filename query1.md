# Query 1

## Description

After creating a new database in your phpMyAdmin and importing the attached schema, execute the queries from the attached file. After testing your queries with phpMyAdmin, report them below.

```sql
-- Select all students born in 1990 (160)

SELECT * FROM students WHERE date_of_birth LIKE '1990%';


-- Select all courses worth more than 10 credits (479)

SELECT * FROM courses WHERE `cfu` > 10;


-- Select all students over 30 years old

SELECT * FROM students WHERE TIMESTAMPDIFF(YEAR, date_of_birth, CURDATE()) > 30;


-- Select all courses in the first semester of the first year of any degree programme (286)

SELECT * FROM courses WHERE year = 1 AND period = 'First semester';




-- Select all exams that take place in the afternoon (after 2 pm) on 20/06/2020 (21)

SELECT * FROM exams WHERE date = '2020-06-20' AND HOUR(hour) > 14.00;


-- Select all Master's degree programmes (38)
SELECT * FROM degrees WHERE level = 'Magistrale';



-- How many departments does the University have? (12)

SELECT COUNT(*) AS number_of_departments FROM departments;


-- How many teachers do not have a telephone number? (50)

SELECT COUNT(*) AS teachers_without_phone FROM teachers WHERE phone IS NULL;
```
