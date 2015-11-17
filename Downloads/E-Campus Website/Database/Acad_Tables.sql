
CREATE TABLE Fee(
	Reciept_No integer,
	StudentID varchar(9) REFERENCES Student(StudentID), 
	Registration_Fee integer,
	Hostel_Fee integer,
	Insurance integer,
	Excess_Pay integer,
	Cheque_No integer,
	Cheque_Date date,
	Bank varchar(20),
	PRIMARY KEY (Reciept_No)
);

