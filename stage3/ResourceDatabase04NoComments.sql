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
StreetAddress VARCHAR(255),
City VARCHAR(255),
StateID VARCHAR(2),
ZIP VARCHAR(10),
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

INSERT INTO `States` (`StateID`, `StateName`) VALUES
('AK', 'Alaska'),
('AR', 'Arkansas'),
('AZ', 'Arizona'),
('CA', 'California'),
('CO', 'Colorado'),
('CT', 'Connecticut'),
('DC', 'District of Col'),
('DE', 'Delaware'),
('FL', 'Florida'),
('GA', 'Georgia'),
('HI', 'Hawaii'),
('IA', 'Iowa'),
('ID', 'Idaho'),
('IL', 'Illinois'),
('IN', 'Indiana'),
('KS', 'Kansas'),
('KY', 'Kentucky'),
('LA', 'Louisiana'),
('MA', 'Massachusetts'),
('MD', 'Maryland'),
('ME', 'Maine'),
('MI', 'Michigan'),
('MN', 'Minnesota'),
('MO', 'Missouri'),
('MS', 'Mississippi'),
('MT', 'Montana'),
('NC', 'North Carolina'),
('ND', 'North Dakota'),
('NE', 'Nebraska'),
('NH', 'New Hampshire'),
('NJ', 'New Jersey'),
('NM', 'New Mexico'),
('NV', 'Nevada'),
('NY', 'New York'),
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
('VA', 'Virginia'),
('VT', 'Vermont'),
('WA', 'Washington'),
('WI', 'Wisconsin'),
('WV', 'West Virginia'),
('WY', 'Wyoming');

INSERT INTO `Counties` (`CountyID`,`CountyName`) VALUES
(55001, 'Adams'),
(55003, 'Ashland'),
(55005, 'Barron'),
(55007, 'Bayfield'),
(55009, 'Brown'),
(55011, 'Buffalo'),
(55013, 'Burnett'),
(55015, 'Calumet'),
(55017, 'Chippewa'),
(55019, 'Clark'),
(55021, 'Columbia'),
(55023, 'Crawford'),
(55025, 'Dane'),
(55027, 'Dodge'),
(55029, 'Door'),
(55031, 'Douglas'),
(55033, 'Dunn'),
(55035, 'Eau Claire'),
(55037, 'Florence'),
(55039, 'Fond du Lac'),
(55041, 'Forest'),
(55043, 'Grant'),
(55045, 'Green'),
(55047, 'Green Lake'),
(55049, 'Iowa'),
(55051, 'Iron'),
(55053, 'Jackson'),
(55055, 'Jefferson'),
(55057, 'Juneau'),
(55059, 'Kenosha'),
(55061, 'Kewauna'),
(55063, 'La Crosse'),
(55065, 'Lafayette'),
(55067, 'Langlade'),
(55069, 'Lincoln'),
(55071, 'Manitowoc'),
(55073, 'Marathon'),
(55075, 'Marinette'),
(55077, 'Marquette'),
(55078, 'Menominee'),
(55079, 'Milwaukee'),
(55081, 'Monroe'),
(55083, 'Oconto'),
(55085, 'Oneida'),
(55087, 'Outagamie'),
(55089, 'Ozaukee'),
(55091, 'Pepin'),
(55093, 'Pierce'),
(55095, 'Polk'),
(55097, 'Portage'),
(55099, 'Price'),
(55101, 'Racine'),
(55103, 'Richland'),
(55105, 'Rock'),
(55107, 'Rusk'),
(55109, 'Sauk'),
(55111, 'Sawyer'),
(55113, 'Shawano'),
(55115, 'Sheboygan'),
(55117, 'St. Croix'),
(55119, 'Taylor'),
(55121, 'Trempealeau'),
(55123, 'Vernon'),
(55125, 'Vilas'),
(55127, 'Walworth'),
(55129, 'Washburn'),
(55131, 'Washington'),
(55133, 'Waukesha'),
(55135, 'Waupaca'),
(55137, 'Waushara'),
(55139, 'Winnebago'),
(55141, 'Wood');

INSERT INTO CountyAssignment (StateID,CountyID) VALUES
('WI', 55001),
('WI', 55003),
('WI', 55005),
('WI', 55007),
('WI', 55009),
('WI', 55011),
('WI', 55013),
('WI', 55015),
('WI', 55017),
('WI', 55019),
('WI', 55021),
('WI', 55023),
('WI', 55025),
('WI', 55027),
('WI', 55029),
('WI', 55031),
('WI', 55033),
('WI', 55035),
('WI', 55037),
('WI', 55039),
('WI', 55041),
('WI', 55043),
('WI', 55045),
('WI', 55047),
('WI', 55049),
('WI', 55051),
('WI', 55053),
('WI', 55055),
('WI', 55057),
('WI', 55059),
('WI', 55061),
('WI', 55063),
('WI', 55065),
('WI', 55067),
('WI', 55069),
('WI', 55071),
('WI', 55073),
('WI', 55075),
('WI', 55077),
('WI', 55078),
('WI', 55079),
('WI', 55081),
('WI', 55083),
('WI', 55085),
('WI', 55087),
('WI', 55089),
('WI', 55091),
('WI', 55093),
('WI', 55095),
('WI', 55097),
('WI', 55099),
('WI', 55101),
('WI', 55103),
('WI', 55105),
('WI', 55107),
('WI', 55109),
('WI', 55111),
('WI', 55113),
('WI', 55115),
('WI', 55117),
('WI', 55119),
('WI', 55121),
('WI', 55123),
('WI', 55125),
('WI', 55127),
('WI', 55129),
('WI', 55131),
('WI', 55133),
('WI', 55135),
('WI', 55137),
('WI', 55139),
('WI', 55141);


INSERT INTO `Resources` (`ResourceID`, `ResourceName`, `StreetAddress`, `City`, `StateID`, `ZIP`, `PhoneNUMBER`, `Fax`, `Email`) VALUES

(134, 'Sparrows Nest- Beloit', NULL, NULL, NULL, NULL, '608-362 8215', NULL, NULL),
(135, 'Lazarus House- Janesville', NULL, NULL, NULL, NULL, '608-373-0766', NULL, NULL),
(137, 'Red Road House', NULL, 'Beloit', 'WI', '53548', '608-743-0904', NULL, NULL),
(138, 'YWCA Transitional Living Women- Janesville', NULL, 'Janesville', 'WI', NULL, '608-755-4749', NULL, NULL),
(139, 'Housing 4 our Vets', NULL, NULL, NULL, NULL, '608-741-4500', '608-741-4502', NULL),

(140, 'Beloit Housing Authority', NULL, NULL, NULL, NULL, '608-364-8740', NULL, NULL),
(141, 'Janesville Neighborhood & Community', NULL, 'Janesville', 'WI', NULL, '608-755-3065', NULL, NULL), 
(142, 'Edgerton Housing Authority', NULL, NULL, NULL, NULL, '608-884-8454', NULL, NULL),
(143, 'Evansville Housing Authority', NULL, NULL, NULL, NULL, '608-882-4518', NULL, NULL), 
(144, 'Grant Village -Janesville', NULL,'Janesville', 'WI', NULL, '608-755-1755', NULL, NULL), 
(145, 'Janesville Commons -Janesville', NULL, 'Janesville', 'WI', NULL, '608-754-3178', NULL, NULL), 
(146, 'lexington CourtApartments', NULL, 'Janesville', 'WI', NULL, '262-642-7704', NULL, NULL), 
(147, 'Woodside Terrace -Beloit', NULL, 'Beloit', 'WI', NULL, '608-365-0333', NULL, NULL), 
(148, 'Alden Street Apartments,Janesville', NULL, 'Janesville', 'WI', NULL, '608-752-4259', NULL, NULL), 
(149, 'Independent Disability Services', NULL, 'Janesville', 'WI', NULL, '608-754-5552', NULL, NULL),
(150, 'Hamilton Terrace -Janesville', NULL, 'Janesville', 'WI', NULL, '608-754-4040', NULL, NULL),
(151, 'G.I.F.T.S Men\'s Shelter -Janesville', NULL, 'Janesville', 'WI', NULL, '608-728-0140', NULL, NULL),
(152, 'Hands of Faith Families- Beloit', NULL, 'Beloit', 'WI', NULL, '608-363-0683', NULL, 'staff@handsoffaith.org'), 
(153, 'House of Mercy Families- Janesville', NULL, 'Janesville', 'WI', NULL, '608-754-0045', NULL, NULL),
(154, 'Britton House- Men Beloit', NULL, 'Beloit', 'WI', NULL, '608-365-4787', NULL, NULL),

(167, 'Aids Network, Beloit', NULL, NULL, NULL, NULL, '608-364-4027', NULL, NULL),
(168, 'Aids Network, Janesville', NULL, NULL, NULL, NULL, '608-756-3010', NULL, NULL), 
(170, 'Beloit Area Community Health CareCenter', '74 Eclipse Blvd', 'Beloit', 'WI', '53511', '608-361-0311', NULL, NULL),
(171, 'First Choice Women\'s Care Center,Janesville', '1015 W Burbank Ave', 'Janesville', 'WI', '53546', '608-755-2438', NULL, NULL), 
(172, 'First Choice Women\'s Care Center Beloit', '600 Henry Ave', 'Beloit', 'WI', '53511', '608-313-1300', NULL, NULL),
(173, 'Health Net of Janesville', '23 W Milwaukee St # 204', 'Janesville', 'WI', '53548', '608-756-4638', NULL, NULL);

INSERT INTO `ResourceTypes` (`ResourceTypeID`, `ResourceTypeName`) VALUES
(1, 'Treatment'),
(2, 'Local Shelter'),
(3, 'Inpatient'),
(4, 'Misc');

INSERT INTO `ResourceTypeAssignment` (`ResourceTypeAssignmentID`, `ResourceTypeID`, `ResourceID`) VALUES

(134, 2, 134),
(135, 2, 135),
(137, 2, 137),
(138, 2, 138),
(139, 2, 139),
(140, 2, 140),
(141, 2, 141),
(142, 2, 142),
(143, 2, 143),
(144, 2, 144),
(145, 2, 145),
(146, 2, 146),
(147, 2, 147),
(148, 2, 148),
(149, 2, 149),
(150, 2, 150),
(151, 2, 151),
(152, 2, 152),

(153, 1, 153),
(154, 1, 154),
(167, 1, 167),
(168, 1, 168),
(170, 1, 170),
(171, 1, 171),
(172, 1, 172),
(173, 1, 173);
