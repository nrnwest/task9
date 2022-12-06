### Training courses

Create an application that inserts/updates/deletes data in the database using eloquent and laravel framework.
Use PostgreSQL DB.

Models have to have next field

Group:
name
Student:
group_id
first_name
last_name
Course:
name
description
Create relation MANY-TO-MANY between tables STUDENTS and COURSES.

Create a laravel application

Create migrations that create db scheme
Write seeds that generate test data
10 groups with randomly generated names. The name should contain 2 characters, hyphen, 2 numbers
Create 10 courses (math, biology, etc)
200 students. Take 20 first names and 20 last names and randomly combine them to generate students.
Randomly assign students to groups. Each group could contain from 10 to 30 students. It is possible that some groups
will be without students or students without groups
Randomly assign from 1 to 3 courses for each student
Create pages that

Find all groups with less or equals student count.
Find all students related to the course with a given name.
Add new student
Delete student by STUDENT_ID
Add a student to the course (from a list)
Remove the student from one of his or her courses
Add REST-api and swagger.

Write tests using Phpunit. Add code coverage report.

The project needs to be pinked on a Linux or Windows (wsl2 Unbuntu 20.*) platform.
Docker must be installed.

### Deployment

```bash
git clone https://github.com/nrnwest/task9.git
```

```bash
make dep
````

**If an error occurs, run the following commands, errors occur due to weak computer:**

1. make build
2. make up
3. make composer
4. make db_add

### Website

<http://localhost:5000>

### Swagger

<http://localhost:5000/api/documentation>

### Coverage

<http://localhost:5000/coverage/index.html)>

###  

user admin@admin.com
password root
<http://localhost:5050/browser/>

## Tests

```bash
make test 
````
