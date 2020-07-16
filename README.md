# MySql Structure Compare

This is a simple script to show the differences between two mysql databases.
The script prints the needed CREATE, DROP and ALTER statements to bring the target databse up to date.

## How to 

Fill in the information in the credentials.php
Deploy the files on your webserver and call the index.php

## Requirements 
* PHP 7.0+ (only tested with 7.0+) 
* MySQL 5.0+ (Information Schema is used and was introduced into MySQL 5.0)

## Result will look like:
 
```
The database is out of Sync!
The following SQL commands need to be executed to bring the live database tables up to date:


CREATE TABLE `history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `from` datetime DEFAULT NULL,
  `to` datetime DEFAULT NULL,
  `story` varchar(2000) DEFAULT NULL,
  PRIMARY KEY (`history_id`),
  UNIQUE KEY `history_history_id_uindex` (`history_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
```  
  
