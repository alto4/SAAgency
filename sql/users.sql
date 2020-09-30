/*
  Name:         Scott Alton
  File:         users.sql
  Description:  Creates the users table for login authentication
  Date:         October 2, 2020
  Course:       WEBD3201 - Web Development - Intermediate
*/

CREATE EXTENSION
IF NOT EXISTS pgcrypto;

DROP SEQUENCE IF EXISTS user_id_seq
CASCADE;
CREATE SEQUENCE user_id_seq
START 1000;

DROP TABLE IF EXISTS users;

/* Users table - stores user account registration registration with Id as the primary key (auto-generated from users_id_sequence if no key is provided)*/
CREATE TABLE users
(
  Id INT PRIMARY KEY DEFAULT nextval('user_id_seq'),
  EmailAddress VARCHAR(255) UNIQUE,
  Password VARCHAR(255) NOT NULL,
  FirstName VARCHAR(255),
  LastName VARCHAR(255),
  LastAccess TIMESTAMP,
  EnrolDate TIMESTAMP,
  Enabled BOOLEAN,
  PhoneExt VARCHAR(4),
  Type VARCHAR(2)
);



/* Sample of user creation that will use sequence for unique ID*/
INSERT INTO Users
  (EmailAddress, Password, FirstName, LastName, LastAccess, EnrolDate, Enabled, PhoneExt, Type)
VALUES
  (
    'scottalton@gmail.com', crypt('password' , gen_salt('bf')), 'Scott', 'Alton', '2020-09-15 09:02:31', '2020-09-15 09:02:31', true, '266',
    's' 
  );
INSERT INTO Users
  (Id, EmailAddress, Password, FirstName, LastName, LastAccess, EnrolDate, Enabled, PhoneExt, Type)
VALUES
  (
    1, 'test1@gmail.com', crypt('password', gen_salt('bf')), 'John', 'Jacob', '2020-09-15 09:02:31', '2020-09-15 09:02:31', true, '266',
    's' 
  );
INSERT INTO Users
  (Id, EmailAddress, Password, FirstName, LastName, LastAccess, EnrolDate, Enabled, PhoneExt, Type)
VALUES
  (
    2, 'jjjhs@gmail.com', crypt('password', gen_salt('bf')), 'Jingle', 'Heimer-Schmitd', '2020-09-15 09:02:31', '2020-09-15 09:02:31', true, '266',
    's' 
  );


SELECT *
FROM users;




