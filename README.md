# my-todo
Todo listing application developed using OOP PHP with MySql and JQuery

## Configuration (Database)

Database Name : mytodo

// Create a Table using query
CREATE TABLE `todos` (
  `id` int(10) NOT NULL,
  `todo` varchar(200) NOT NULL,
  `active_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
