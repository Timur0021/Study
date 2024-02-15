
-- CREATE TABLE Animals (
--     animal_id INT PRIMARY KEY,
--     name VARCHAR(255),
--     species VARCHAR(255),
--     age INT,
--     gender VARCHAR(10),
-- );
-- CREATE TABLE Employees (
--     employee_id INT PRIMARY KEY,
--     name VARCHAR(255),
--     position VARCHAR(255)
-- );

-- CREATE TABLE Animal_Care (
--     care_id INT PRIMARY KEY,
--     employee_id INT,
--     animal_id INT,
--     FOREIGN KEY (employee_id) REFERENCES Employees(employee_id),
--     FOREIGN KEY (animal_id) REFERENCES Animals(animal_id)
-- );

-- CREATE TABLE Animal_Food (
--     food_id INT PRIMARY KEY,
--     name VARCHAR(255),
--     type VARCHAR(255)
-- );

-- CREATE TABLE Animal_Feeding (
--     feeding_id INT PRIMARY KEY,
--     animal_id INT,
--     food_id INT,
--     FOREIGN KEY (animal_id) REFERENCES Animals(animal_id),
--     FOREIGN KEY (food_id) REFERENCES Animal_Food(food_id)
-- );