# my-todo
Todo listing application developed using OOP PHP with MySql and JQuery. This is local server optimized.

## Configuration (Database)

### Database Name : mytodo

### Create a Table using query
CREATE TABLE `todos` (
  `id` int(10) NOT NULL,
  `todo` varchar(200) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

### Database connection config : dbConn.php

## User Guide
### 1. Insert and Save a Todo
### 2. Delete any Todo by click on right cross button
### 3. To make any completion of a Todo, please click and check left checkbox
### 4. To change or update any Todo, double click on it and proceed changes
