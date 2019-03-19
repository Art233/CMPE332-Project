
create table CommitteeMembers(
	 member_id varchar(10) not null, 
	 fname varchar(50) not null, 
	 lname varchar(50) not null,
	 committee_name varchar(20) not null,
	 primary key (member_id, fname, lname, committee_name),
	 foreign key (committee_name) references SubCommittee (committee_name) on delete cascade);

create table SubCommittee(
	 committee_name	varchar(20) not null,
	 committee_chair_fname varchar(50) not null,
	 committee_chair_lname varchar(50) not null,
	 primary key (committee_name),
	 foreign key (fname, lname) references CommitteeMembers (fname, lname) on delete set null);
	 
create table ComferenceSchedule(
	 date date,
	 start_time time,
	 end_time time,
	 speaker_fname varchar(100),
	 speaker_lname varchar(100),
	 section_name varchar(100) not null,
	 section_id varchar(10) not null,
	 building varchar(100),
	 room_num varchar(5),
	 primary key(section_id),
	 foreign key(speaker_fname, speaker_lname) references Students (fname, lname) on delete set null,
	 foreign key(speaker_name, speaker_lname) references Professinaols (fname, lname) on delete set null,
	 foreign key(speaker_name, speaker_lname) references Sponsors (fname, lname) on delete set null);

#Attendees(
#	 registration_id varchar(5) not null,
#	 fname varchar(50) not null, 
#	 lname varchar(50) not null,
#	 attending_rate varchar(3) not null,
#	 primary key(registration_id))

create table Students(
	 student_id varchar(10) not null primary key,
	 fname varchar(50) not null, 
	 lname varchar(50) not null,
	 room_number varchar(5),
	 primary key(student_id),
	 foreign key(room_number) references Hotel_Room (room_number) on delete set null)	 
	 
create table Professinaols(
	 prof_id varchar(10) not null primary key,
	 fname varchar(50) not null, 
	 lname varchar(50) not null,
	 specialization varchar(100),
	 primary key(prof_id))
	 
create table Sponsors(
	 sponsor_id varchar(10) not null primary key,
	 fname varchar(50) not null, 
	 lname varchar(50) not null,
	 company_name varchar(100) not null,
	 primary key(sponsor_id),
	 foreign key(company_name) references Company (company_name) on delete cascade)
 
create table HotelRoom(
	 room_number varchar(5) not null,
	 num_of_bed integer not null,
	 primary key(room_number))
	 
create table Company(
	 company_name varchar(100) not null, 
	 sponsor_level varchar(10),
	 amount_of_money integer,
	 num_of_mails_limit integer,
	 num_of_mails_sent integer,
	 primary key(name)) 
	 
create table JobPost(
	 job_id varchar(10) not null,
	 company_name varchar(100) not null,
	 title varchar(50) not null,
	 city varchar(50),
	 province varchar(50),
	 pay_rate varchar(20),
	 primary key(job_id),
	 foreign key(company_name) references Company (company_name) on delete cascade)