Insert INTO USER (SSN, User_Type_Admin, LoginName, Password, First_Name, Last_Name)
VALUES (987654321, 'Y', 'isaac', 'dog', 'Isaac', 'Clarke'); //ADD ADMIN

UPDATE USER SET PASSWORD = 'e49512524f47b4138d850c9d9d85972927281da0' WHERE SSN = 987654321;

Insert INTO DOC (Publisher, Title, PublisherID, LibID, ISBN, branch)
VALUES ('Rug Rats', 'Hood Rats', '951357', '357951', '852456', 'NYC'); //ADD BOOKS

ALTER TABLE USER
 ADD CONSTRAINT FK_LibID_Doc FOREIGN KEY(LibID) REFERENCES BRANCH (LibID);, 
 CONSTRAINT FK_PublisherID FOREIGN KEY(PublisherID) REFERENCES PUBLISHER (PublisherID);

create table USER
(
SSN INT (9) PRIMARY KEY, User_Type_Admin char(1) NOT NULL, LoginName Varchar(255) NOT NULL, Password Varchar(255) NOT NULL, First_Name Varchar(255) NOT NULL, Last_Name Varchar(255) NOT NULL);

SELECT `Title`, COUNT(`Title`) AS `Title`FROM `DOC` GROUP BY `Title` ORDER BY `Title` DESC;

SELECT * FROM `DOC` WHERE borrowed=0; //FILTER BOOKS

DELETE FROM `DOC` WHERE ISBN=852456; //REMOVE BOOKS

SELECT * FROM DOC WHERE ISBN=852456; //SEARCH BOOKS