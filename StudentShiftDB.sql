CREATE TABLE IF NOT EXISTS StudentShiftDB (
    `Name` VARCHAR(20) CHARACTER SET utf8,
    `Birthdate` DATETIME,
    `Graduation_Date` VARCHAR(14) CHARACTER SET utf8,
    `Date_of_Employment_Acceptance` DATETIME,
    `Company_Name_School_Name` VARCHAR(34) CHARACTER SET utf8,
    `Job_Title_Area_of_Study` VARCHAR(32) CHARACTER SET utf8,
    `Job_Type` VARCHAR(11) CHARACTER SET utf8,
    `Major` VARCHAR(39) CHARACTER SET utf8,
    `Minor` VARCHAR(19) CHARACTER SET utf8,
    `GPA` NUMERIC(2, 1),
    `Salary` INT
);
INSERT INTO StudentShiftDB VALUES
    ('Angelina E. Walker','1974-10-05 00:00:00','May, 1996','1996-06-01 00:00:00','Deloitte','Content editor','Corporate','Marketing','Management',3.6,45000),
    ('Carla G. Ackerman','1994-05-01 00:00:00','May, 2016','2016-08-01 00:00:00','Conagra','Machinist ','Corporate','Mechanical Engineering',NULL,3,42000),
    ('Oliver D. Ellison','1985-02-07 00:00:00','May, 2005','2006-02-01 00:00:00','TruGreen','Placement director','Corporate','Management ',NULL,2.7,38000),
    ('Rene J. Lawson','1991-03-09 00:00:00','December, 2013','2013-03-01 00:00:00','DraftKings','App Development','Corporate','Computer Science',NULL,3.2,55000),
    ('Tonya D. Hancock','1982-03-16 00:00:00','May, 2003','2003-05-01 00:00:00','Merril Lynch','Credit investigator','Corporate','Economics/Finance',NULL,3.8,50000),
    ('Jimmy S. Smith','1966-01-17 00:00:00','May, 1985','1985-08-01 00:00:00','Herr Foods','Machinist','Corporate','Mechanical Engineering',NULL,2.9,55000),
    ('Betty D. Mora','1992-01-04 00:00:00','May, 2014','2014-08-01 00:00:00','Georgia Tech','Electrical Engineering','Grad School','Computer Science','Mathematics',4,NULL),
    ('Christopher S. Jones','1991-12-09 00:00:00','May, 2013','2014-01-01 00:00:00','Lehigh Univeristy ','MBA','Grad School','Economics/Finance',NULL,3.9,NULL),
    ('Michael B. Reynolds','1989-12-25 00:00:00','May, 2009','2009-08-01 00:00:00','Stanford','Computer Science','Grad School','Electrical Engineering','Mathematics',4,NULL),
    ('Amber J. Gurley','1991-12-28 00:00:00','May, 2011','2011-09-01 00:00:00','ACLU','Paralegal','Non-Profit','Philosophy','English',3.7,44000),
    ('Ann C. Morgan','1987-09-08 00:00:00','December, 2007','2007-01-01 00:00:00','American Red Cross','Nurse','Non-Profit','Nursing',NULL,3.8,40000),
    ('John E. Stanberry','1996-01-03 00:00:00','May, 2017','2017-06-01 00:00:00','Meritus Medical Center','trauma nurse','Corporate','Nursing',NULL,3.4,55000),
    ('Tanna L. Morris','1990-05-09 00:00:00',' May, 2013','2013-05-01 00:00:00','Tesla','Robotics Engineer','Corporate','Electrical Engineering/Computer Science',NULL,4,65000),
    ('Carol B. Hamilton','1997-03-24 00:00:00','May, 2019','2019-08-01 00:00:00','Robert Morris University','Mathematics','Grad School','Computer Science',NULL,4,NULL),
    ('Lynn K. Hyland','1985-04-04 00:00:00','May, 2007','2017-07-01 00:00:00','US Government','Secret Service Agent','Government','Criminal Justice',NULL,4,48000),
    ('Cindy M. Griggs','1989-09-20 00:00:00','May, 2010','2010-05-01 00:00:00','Omnicon Group','Multi-media Marketing','Corporate','Marketing','Media Arts & Design',3.2,44000),
    ('Charles R. Sanchez','1997-04-02 00:00:00','May, 2019','2019-08-01 00:00:00','Sheppard Pratt','Pschiatric Nursing assistant','Corporate','Nursing','Psychology',3.4,48000),
    ('Andrew J. Brown','1987-11-20 00:00:00','May, 2005','2005-09-01 00:00:00','RoosterBio','Assurance Technician','Corporate','Management ','Biology',3.5,50000),
    ('Gladys J. Riner','1988-06-03 00:00:00','December, 2006','2008-01-01 00:00:00','VTech','Purchasing Director','Corporate','English',NULL,3,35000),
    ('Leah R. Sanchez','1985-02-25 00:00:00','May, 2003','2003-09-01 00:00:00','Atlantic Real Estate','Market and Survey Researcher','Corporate','Finance',NULL,3.2,40000),
    ('Jose M. Holloway','1992-04-21 00:00:00','May, 2014','2014-05-01 00:00:00','US Army','Public Health Engineering','Government','Biology','ROTC',3.5,45000),
    ('Alexis R. Finlay','1988-04-25 00:00:00','May, 2007','2007-09-01 00:00:00','Charles County Public Schools','Guidance Counselor','Government','Secondary Education',NULL,3.3,38000),
    ('Blanche J. Baker','1992-09-28 00:00:00','May, 2014','2014-10-01 00:00:00','Ruppert Landscaping','Office Coordinator','Corporate','Management ',NULL,2.8,35000),
    ('Ronald B. Mills','1988-01-08 00:00:00','May, 2011','2011-10-01 00:00:00','US Postal Service','Linux System Admin','Government','Computer Science',NULL,3.2,55000),
    ('Daniel R. Nauman','1986-02-17 00:00:00','May, 2009','2009-05-01 00:00:00','US Army','Cyber Command','Government','Computer Science','Mathematics',3.9,55000),
    ('Latisha P. Brabham','1984-10-24 00:00:00','May, 2005','2005-07-01 00:00:00','JP Morgan','Junior Financial Officer','Corporate','Finance','Economics',3.8,60000),
    ('Mary A. Albright','1985-01-20 00:00:00','May, 2006','2006-08-01 00:00:00','Penn State Law','Law','Grad School','History','English ',4,NULL),
    ('George S. Adams','1994-11-11 00:00:00','May, 2016','2016-09-01 00:00:00','Allergan','Chemist ','Corporate','Chemistry','Biology',3.5,55000),
    ('Amber J. Dolphin','1983-07-04 00:00:00','December, 2004','2004-04-01 00:00:00','United Healthcare','Actuary ','Corporate','Finance',NULL,3.4,50000),
    ('Steven S. Alston','1986-04-16 00:00:00','December, 2007','2007-05-01 00:00:00','Wells Fargo','Human Resources','Corporate','English',NULL,3.4,43000),
    ('Louis R. Merchant','1983-04-05 00:00:00','May, 2005','2005-08-01 00:00:00','University Of Virginia','MBA','Grad School','Economics','Management',4,NULL),
    ('Keith M. Schwartz','1990-09-06 00:00:00','May, 2013','2013-09-01 00:00:00','Gilead Sciences','Biotech Engineer','Corporate','Biology',NULL,3.5,52000),
    ('Shannon M. Saunders','1991-11-03 00:00:00','May, 2013','2013-05-01 00:00:00','NSA','Encryption Analyst','Government','Computer Science',NULL,4,65000),
    ('Dan M. Georges','1987-01-03 00:00:00','December, 2004','2004-02-01 00:00:00','NASA','Mission Control Analyst','Corporate','Physics','Computer Science',4,60000),
    ('Justin D. Maday','1985-06-12 00:00:00','May, 2006','2006-09-01 00:00:00','Booz Allen Hamilton','Cyber Security Analyst','Corporate','Computer Science','Cyber Security',3.7,60000),
    ('Amy B. Levin','1986-01-08 00:00:00','December, 2005','2005-01-01 00:00:00','Cal Berkeley University','Physics','Grad School','Mathematics','Computer Science',4,NULL),
    ('Sean E. Hammond','1991-02-19 00:00:00','May, 2014','2014-08-01 00:00:00','Enviroscience','Inspection Agent','Corporate','Environmental Science',NULL,3.5,50000),
    ('Tommy R. Comeaux','1995-03-06 00:00:00','May, 2016','2016-07-01 00:00:00','Lockheed Martin','Aerospace Engineer','Corporate','Mechanical Engineering/Physics',NULL,3.7,70000),
    ('Rebecca A. Harris','1985-02-02 00:00:00','May, 2006','2006-06-01 00:00:00','AOPA','Risk Analyst','Corporate','Mathematics/Computer Science',NULL,3.6,55000),
    ('Keith H. Jones','1994-07-07 00:00:00','December, 2016','2016-05-01 00:00:00','Vertex Pharmaceuticals ','Chemical Engineer','Corporate','Chemistry',NULL,3.2,48000),
    ('Walter S. Long','1996-03-31 00:00:00','May, 2017','2017-10-01 00:00:00','Amazon Web Services','Cloud Engineer','Corporate','Computer Science',NULL,3.8,60000),
    ('Brian K. Hayden','1995-12-04 00:00:00','May, 2016','2016-06-01 00:00:00','Habitat For Humanity ','Project Manager','Non-Profit','Management','Finance',3.6,55000),
    ('Lawrence K. Lightsey','1989-03-02 00:00:00','May, 2010','2010-05-01 00:00:00','US Army','EOD','Government','Mechanical Engineering',NULL,3.5,50000),
    ('Rose J. Chapman','1989-02-20 00:00:00','December, 2010','2010-02-01 00:00:00','Boeing','Aerospace Engineer','Corporate','Mechanical Engineering','Physics ',3.9,75000),
    ('Sandy V. Fitzpatrick','1984-05-01 00:00:00','May, 2005','2005-08-01 00:00:00','Boston College','Political Science and Government','Grad School','Politcal Science','Philosophy',4,NULL),
    ('James C. Andrews','1989-12-15 00:00:00','May, 2010','2010-05-01 00:00:00','R Adams Cowley Shock Trauma Center','Nurse','Corporate','Nursing',NULL,3.6,50000),
    ('Vera C. Gill','1991-12-31 00:00:00','May, 2013','2013-06-01 00:00:00','Accenture ','Technology Consultant','Corporate','Management','Computer Science',3,48000),
    ('Joyce E. Murphey','1996-09-17 00:00:00','May, 2019','2019-11-01 00:00:00','Deloitte','Junior Staff Consultant','Corporate','Economics',NULL,3.3,44000),
    ('John M. Ginsburg','1986-09-06 00:00:00','December, 2007','2007-12-01 00:00:00','PricewaterhouseCoopers','Management Consulting','Corporate','Management ','Finance',3.4,52500);
