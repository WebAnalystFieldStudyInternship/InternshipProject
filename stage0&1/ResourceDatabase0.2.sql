DROP Database IF EXISTS Resource_DB;
CREATE DATABASE Resource_DB;
USE Resource_DB;

DROP TABLE IF EXISTS Users;
CREATE TABLE Users (
UserID INT AUTO_INCREMENT PRIMARY KEY, 
Username VARCHAR(255) NOT NULL, 
Password VARCHAR(255) NOT NULL, 
AccessLevel INT NOT NULL
);

DROP TABLE IF EXISTS States; 
CREATE TABLE States (
StateID VARCHAR(2) NOT NULL PRIMARY KEY,
StateName VARCHAR(15)
);

DROP TABLE IF EXISTS Counties; 
CREATE TABLE Counties (
CountyID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
CountyName VARCHAR(45)
);

DROP TABLE IF EXISTS UserAssignment;
CREATE TABLE UserAssignment (
UserAssignmentID INT AUTO_INCREMENT PRIMARY KEY, 
UserID INT NOT NULL, 
CountyID INT NOT NULL, 
FOREIGN KEY (UserID) REFERENCES Users(UserID),
FOREIGN KEY (CountyID) REFERENCES Counties(CountyID)
);

DROP TABLE IF EXISTS CountyAssignment; 
CREATE TABLE CountyAssignment (
CountyAssignmentID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
StateID VARCHAR(2) NOT NULL,
CountyID INT NOT NULL,
FOREIGN KEY (StateID) REFERENCES States(StateID),
FOREIGN KEY (CountyID) REFERENCES Counties(CountyID)
);

DROP TABLE IF EXISTS ResourceTypes; 
CREATE TABLE ResourceTypes (
ResourceTypeID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
ResourceTypeName VARCHAR(45)
);

DROP TABLE IF EXISTS Resources; 
CREATE TABLE Resources (
ResourceID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
ResourceName VARCHAR(255) NOT NULL,
StreetAddress VARCHAR(255) NOT NULL,
City VARCHAR(255) NOT NULL,
StateID VARCHAR(2) NOT NULL,
ZIP VARCHAR(10) NOT NULL,
PhoneNUMBER VARCHAR(12) NOT NULL,
Fax VARCHAR(12),
Email VARCHAR(12),
FOREIGN KEY (StateID) REFERENCES States(StateID)
);

DROP TABLE IF EXISTS ResourceTypeAssignment; 
CREATE TABLE ResourceTypeAssignment (
ResourceTypeAssignmentID INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
ResourceTypeID INT NOT NULL,
ResourceID INT NOT NULL,
FOREIGN KEY (ResourceTypeID) REFERENCES ResourceTypes(ResourceTypeID),
FOREIGN KEY (ResourceID) REFERENCES Resources(ResourceID)
);

INSERT INTO States (StateID,StateName)
VALUES 
('AK', 'Alaska'),
('AZ', 'Arizona'),
('AR', 'Arkansas'),
('CA', 'California'),
('CO', 'Colorado'),
('CT', 'Connecticut'),
('DE', 'Delaware'),
('DC', 'District of Columbia'),
('FL', 'Florida'),
('GA', 'Georgia'),
('HI', 'Hawaii'),
('ID', 'Idaho'),
('IL', 'Illinois'),
('IN', 'Indiana'),
('IA', 'Iowa'),
('KS', 'Kansas'),
('KY', 'Kentucky'),
('LA', 'Louisiana'),
('ME', 'Maine'),
('MD', 'Maryland'),
('MA', 'Massachusetts'),
('MI', 'Michigan'),
('MN', 'Minnesota'),
('MS', 'Mississippi'),
('MO', 'Missouri'),
('MT', 'Montana'),
('NE', 'Nebraska'),
('NV', 'Nevada'),
('NH', 'New Hampshire'),
('NJ', 'New Jersey'),
('NM', 'New Mexico'),
('NY', 'New York'),
('NC', 'North Carolina'),
('ND', 'North Dakota'),
('OH', 'Ohio'),
('OK', 'Oklahoma'),
('OR', 'Oregon'),
('PA', 'Pennsylvania'),
('PR', 'Puerto Rico'),
('RI', 'Rhode Island'),
('SC', 'South Carolina'),
('SD', 'South Dakota'),
('TN', 'Tennessee'),
('TX', 'Texas'),
('UT', 'Utah'),
('VT', 'Vermont'),
('VA', 'Virginia'),
('WA', 'Washington'),
('WV', 'West Virginia'),
('WI', 'Wisconsin'),
('WY', 'Wyoming');