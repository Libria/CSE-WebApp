create table student(
    student_id integer NOT NULL PRIMARY KEY,
    name varchar(10) NOT NULL,
    year tinyint NOT NULL DEFAULT 1,
    dept_no integer,
    major varchar(20) NOT NULL
);

create table department(
  dept_no integer NOT NULL AUTO_INCREMENT PRIMARY KEY,
  dept_name varchar(20) NOT NULL UNIQUE,
  office varchar(20) NOT NULL,
  office_tel varchar(13)
);




alter table student modify major varchar(30);

desc student;

alter table student add gender varchar(10);

alter table student drop gender;




insert into student values (20070002, 'Jane Smith', 3, 4, 'Business Administration');
insert into student values (20060001, 'Ashley Jackson', 4, 4, 'Business Administration');
insert into student values (20030001, 'Liam Johnson', 4, 2, 'Electrical Engineering');
insert into student values (20040003, 'Jacob Lee', 3, 2, 'Electrical Engineering');
insert into student values (20060002, 'Noah Kim', 3, 1, 'Computer Science');
insert into student values (20100002, 'Ava Lim', 3, 4, 'Business Administration');
insert into student values (20110001, 'Emma Watson', 2, 1, 'Computer Science');
insert into student values (20080003, 'Lisa Maria', 4, 3, 'Law');
insert into student values (20040002, 'Jacob William', 4, 5, 'Law');
insert into student values (20070001, 'Emily Rose', 4, 4, 'Business Administration');
insert into student values (20100001, 'Ethan Hunt', 3, 4, 'Business Administration');
insert into student values (20110002, 'Jason Mraz' 2, 1, 'Electrical Engineering');
insert into student values (20030002, 'John Smith', 5, 1, 'Computer Science');
insert into student values (20070003, 'Sophia Park', 4, 3, 'Law');
insert into student values (20070007, 'James Michael', 2, 4, 'Business Administration');
insert into student values (20100003, 'James Bond', 3, 1, 'Computer Science');
insert into student values (20070005, 'Olivia Madison', 2, 5, 'English Language and Literature');


insert into department (dept_name, office, office_tel) values ('Computer Science', 'Science Building 101', '02-3290-0123');
insert into department (dept_name, office, office_tel) values ('Electrical Engineering', 'Engineering Building 401', '02-3290-2345');
insert into department (dept_name, office, office_tel) values ('Law', 'Law Building 201', '02-3290-7896');
insert into department (dept_name, office, office_tel) values ( 'Business Administration', 'Business Building 104', '02-3290-1112');
insert into department (dept_name, office, office_tel) values ('English Language and Literature', 'Language Building 303', '02-3290-4412');





update student set major = 'Electrical and Electronics Engineering' where major = 'Electrical Engineering';
update department set dept_name = 'Electrical and Electronics Engineering' where dept_name = 'Electrical Engineering';

insert into department (dept_name, office, office_tel) values ('Special Education', 'Education Building 403', '02-3290-2347');

update student set major = 'Special Education' where name = 'Emma Watson';

delete from student where name = 'Jason Mraz';
delete from student where name = 'John Smith';

select * from student where major = 'Computer Science';
select student_id, year, major from student;
select * from student where year = 3;
select * from student where year = 1 or year = 2;
select * from student where dept_no = (select dept_no from department where dept_name = 'Business Administration');




select * from student where student_id like '%2007%';
select * from student order by student_id;
select major from student group by major having avg(year) > 3;
select * from student where major = 'Business Administration' and student_id like '%2007%' limit 2;




-- I don't know where I can download imdb db;;;
-- I couldn't find.
/*
select role from roles as r join movies as m where r.movie_id = m.id and m.name = 'Pi';
select first_name, last_name, role from actors as a join roles as r where a.id = r.actor_id and a.id in (select id from movies where name='Pi');
select first_name, last_name from actors as a join roles as r where r.id = m.id and r.actor_id in (select id from movies where name = 'Kill Bill: Vol.1') and r.actor_id in (select id from movies where name = 'Kill Bill: Vol.2');
select id, first_name, count(movie_id) from actors as a join roles as a r where a.id = r.actor_id group by actor_id;
*/
