# b-university

## Description

Model the structure of a database to store all data concerning a university:

- there are several departments (e.g.: Humanities, Mathematics, Engineering, etc.);
- each Department offers several Degree Programmes (e.g.: Classics, Computer Science, Electronic Engineering, etc.)
- each degree programme has several courses (e.g.: Latin Literature, Operating Systems 1, Mathematical Analysis 2, etc.);
- each course can be taught by different teachers;
- each course includes several exam calls;
- each student is enrolled in only one Degree Course;
- each student can register for more than one exam;
- for each Examination Call in which the Student has participated, it is necessary to memorize the grade obtained, even if not sufficient.
  Let’s think about what entities (tables) we create for our database and then try to establish the relationships. Finally, let’s define the columns and data types of each table.
  Use https://www.diagrams.net/ to create the schema.
  Then export the diagram to jpg and load it into the repo. (modified)

## departments

ID|BIGINT| PK | INDEX | AI |UNIQUE| NOTNULL
name | VARCHAR (50) | NOTNULL
description |TEXT | NULL

## coursework

ID |BIGINT| PK | INDEX | AI |UNIQUE| NOTNULL
id_department |FK | NOTNULL
name | VARCHAR (50) | NOTNULL
description |TEXT | NULL

## subjects

ID|BIGINT| PK | INDEX | AI |UNIQUE| NOTNULL
id_corsolaurea |FK | NOTNULL
name | VARCHAR (50) | NOTNULL
description |TEXT | NULL
credits | SMALLINT | NOTNULL

## teachers

ID|BIGINT| PK | INDEX | AI |UNIQUE| NOTNULL
id_matter |FK | NOTNULL
name |VARCHAR (100) | NOTNULL
surname |VARCHAR (100) | NOTNULL
matter |VARCHAR (50) | NULL

## students

ID|BIGINT| PK | INDEX | AI |UNIQUE| NOTNULL
id_corsolaurea |FK | NOTNULL
id_appeal |FK | NOTNULL
name |VARCHAR (100) | NOTNULL
surname |VARCHAR (100) | NOTNULL
students_number | MEDIUMINT| NOTNULL

## appeals

ID|
