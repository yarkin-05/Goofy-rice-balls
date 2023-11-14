CREATE TABLE `students`.`students` (
  `id` INT NOT NULL AUTO_INCREMENT , 
  `username` VARCHAR(20) NOT NULL , 
  `name` VARCHAR(50) NOT NULL , 
  `last_name` VARCHAR(50) NOT NULL , 
  `birthdate` TEXT NOT NULL , 
  PRIMARY KEY (`id`)
  ) ENGINE = InnoDB;

INSERT INTO students.students (username, name, last_name, birthdate) VALUES ('yarkinn', 'Jacqueline', 'Cruz Solis', '23/07/2005'); 


CREATE TABLE `students`.`courses` (
  `id` INT NOT NULL AUTO_INCREMENT , 
  `name` VARCHAR(70) NOT NULL , 
  `created_at` `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , 
  PRIMARY KEY (`id`)
  ) ENGINE = InnoDB;

INSERT INTO students.courses (name) VALUES ('DSW');
INSERT INTO students.courses (name) VALUES ('MA');
INSERT INTO students.courses (name) VALUES ('ADD');
INSERT INTO students.courses (name) VALUES ('ARCM');
INSERT INTO students.courses (name) VALUES ('MTDF');
INSERT INTO students.courses (name) VALUES ('TDAD');
INSERT INTO students.courses (name) VALUES ('CS');
INSERT INTO students.courses (name) VALUES ('CMEM');
INSERT INTO students.courses (name) VALUES ('MCAI');




CREATE TABLE `students`.`student_courses` (
  `student_id` INT NOT NULL,
  `course_id` INT NOT NULL,
  `grade` FLOAT NOT NULL,
  FOREIGN KEY (`student_id`) REFERENCES `students`.`students`(`id`),
  FOREIGN KEY (`course_id`) REFERENCES `students`.`courses`(`id`)
) ENGINE = InnoDB;

INSERT INTO students.student_courses (student_id, course_id, grade) 
SELECT s.id, c.id, 9.5
FROM students.students AS s
JOIN students.courses AS c ON 1 = 1 --1 = 1 means basically all s.id = students.student_courses.student_id
and c.id = students.student_courses.courses_id
WHERE s.name = 'yarkinn';



