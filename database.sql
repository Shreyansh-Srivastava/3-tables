CREATE TABLE student_info (student_id varchar(255) NOT NULL, fname varchar(255) NOT NULL, lname varchar(255) NOT NULL,  
mob_no varchar(255) NOT NULL, dept varchar(255) NOT NULL, year varchar(255) NOT NULL, hostel_id int(10) NOT NULL, 
room_id int(10) NOT NULL, PRIMARY KEY (student_id), KEY hostel_id (hostel_id), KEY room_id (room_id), 
FOREIGN KEY (hostel_id) REFERENCES hostel_info (hostel_id), FOREIGN KEY (room_id) REFERENCES room_info (room_id) ON DELETE CASCADE ON UPDATE CASCADE);


CREATE TABLE hostel_info (hostel_id int(10) NOT NULL, hostel_name varchar(255) NOT NULL, 
no_of_rooms varchar(255) NOT NULL, no_of_students varchar(255) NOT NULL, gender varchar(255) NOT NULL, PRIMARY KEY (hostel_id));


CREATE TABLE room_info ( room_id int(10) NOT NULL, hostel_id int(10) NOT NULL, room_No int(10) NOT NULL, 
allocated int(10) NOT NULL, PRIMARY KEY (room_id), KEY hostel_id (hostel_id), 
FOREIGN KEY (hostel_id) REFERENCES hostel_info (hostel_id) ON DELETE CASCADE ON UPDATE CASCADE);