Create Table Sub_Committee(
	committee_name varchar(20) not null,
	committee_chair_fname varchar(50),
	committee_chair_lname varchar(50),
	primary key (committee_name));

Create Table Committee_Members(
	member_id varchar(10) not null,
	first_name varchar(50) not null,
	last_name varchar(50) not null,
	committee_name varchar(20) not null,
	primary key(member_id,first_name,last_name),
	foreign key(committee_name) references sub_committee(committee_name) on delete
	cascade);

create table membersFromCommittee(
	member_id varchar(10) not null,
	first_name varchar(50) not null,
	last_name varchar(50) not null,
	committee_name varchar(20) not null,
	foreign key(member_id, first_name, last_name) references Committee_Members
	(member_id, first_name, last_name) on delete cascade,
	foreign key(committee_name) references Sub_Committee (committee_name) on delete
	cascade);

Create Table Attendees(
	ID varchar(10) not null,
	first_name varchar(100) not null,
	last_name varchar(100) not null,
	email varchar(255) not null,
	attendee_type varchar(100) not null,
	attending_rate varchar(100) not null,
	primary key(ID));

Create Table Hotel_Room(
	room_number varchar(5) not null ,
	num_of_bed integer not null,
	primary key(room_number));

Create Table Students(
	ID varchar(10) not null,
	first_name varchar(100) not null,
	last_name varchar(100) not null,
	room_number varchar(5),
	primary key(ID),
	foreign key(ID) references attendees(ID) on delete cascade,
	foreign key(room_number) references Hotel_Room (room_number) on delete set null
	);

Create Table Level_Table(
	sponsor_level varchar(30) not null,
	amount_of_money varchar(9) not null,
	total_mail integer not null,
	primary key (sponsor_level)
	);

Create Table Company(
	company_name varchar(100) not null,
	sponsor_level varchar(30)not null,
	amount_of_money integer not null,
	total_mail integer not null,
	primary key(company_name),
	foreign key(sponsor_level) references Level_Table(sponsor_level)
	);

Create Table Job_Post(
	job_id varchar(10) not null,
	company_name varchar(100),
	title varchar(50),
	city varchar(50),
	province varchar(50),
	pay_rate varchar(20),
	primary key(job_id),
	foreign key(company_name) references Company (company_name) on delete cascade
	);

Create Table Sponsors(
	ID varchar(10) not null,
	first_name varchar(100) not null,
	last_name varchar(100) not null,
	company_name varchar(10) not null,
	num_of_mails_sent integer not null,
	foreign key(company_name) references Company (company_name) on delete cascade,
	foreign key(ID) references attendees(ID) on delete cascade
	);
	
Create Table Professionals(
	ID varchar(10) not null,
	first_name varchar(100) not null,
	last_name varchar(100) not null,
	specialization varchar(100),
	foreign key(ID) references attendees(ID) on delete cascade
	);
	
Create Table Conference_Schedule(
	date date,
	start_time time,
	end_time time,
	speaker_id varchar(10),
	speaker_front_name varchar(100),
	speaker_last_name varchar(100),
	section_id varchar(10) not null,
	section_name varchar(100) not null,
	building varchar(100),
	room_num varchar(5),
	primary key(section_id),
	foreign key(speaker_id) references attendees (id) on delete cascade
	);

