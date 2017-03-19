Insert INTO USER (SSN, User_Type_Admin, LoginName, Password, First_Name, Last_Name)
VALUES (987654321, 'Y', 'Jordan', 'rat', 'Jordan', 'mike'); //ADD ADMIN

Insert INTO DOC (Publisher, Title, PublisherID, LibID, ISBN, branch)
VALUES ('Rug Rats', 'Hood Rats', '951357', '357951', '852456', 'NYC'); //ADD BOOKS

SELECT * FROM `DOC` WHERE borrowed=0; //FILTER BOOKS

DELETE FROM `DOC` WHERE ISBN=852456; //REMOVE BOOKS

SELECT * FROM DOC WHERE ISBN=852456; //SEARCH BOOKS