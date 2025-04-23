<?php
use ASCOOS\FRAMEWORK\Kernel\DB\JSQLDB;

// We read from the settings file the operating parameters of the database.
$conf = require "conf/config.php";

$properties['tables_prefix'] = 'ascoos'; // It will give e.g. a "ascoos_articles' table.

// Initialize the database object
$jsql = new TJSQLDB($conf, $properties);

// Create Database
$jsql->createDatabase('test_db');

// Create User and assign to Database
$jsql->createUser('admin', 'root', 'test_db');

// Select Current Database
$jsql->select_db('test_db');

// Create Table
$schema = [
  'id' => 'INT NOT NULL AUTO_INCREMENT PRIMARY KEY',
  'article_id' => 'INT UNSIGNED NOT NULL DEFAULT 0',
  'cat_id' => 'INT UNSIGNED NOT NULL DEFAULT 0',
  'user_id' => 'INT UNSIGNED NOT NULL DEFAULT 0',
  'lang_id' => 'INT UNSIGNED NOT NULL DEFAULT 0',
  'title' => 'VARCHAR(200) NOT NULL',
  'content' => ' TEXT NULL COMPRESSED',
  'created' => ' DATETIME NULL DEFAULT CURRENT_TIMESTAMP()',
  'updated' => 'DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP()'
];
$jsql->createTable('#__articles', $schema);

// Insert Data
$query->setSQLQuery("INSERT INTO #__articles (article_id, cat_id, user_id, lang_id, title, content) VALUES 
(1, 1, 1, 1, 'Title 1', 'Test Content 1'),
(1, 1, 1, 2, 'Title 2', 'Test Content 2'),
(2, 2, 1, 1, 'Title 3', 'Test Content 3'),
(3, 3, 1, 1, 'Title 4', 'Test Content 4'),
(3, 1, 1, 2, 'Title 5', 'Test Content 5');
");
$query->execute();

$query = "SELECT article_id AS aid, title, content AS doc FROM #__articles WHERE user_id = ".$my->id." AND lang_id = 1 ORDER BY created DESC LIMIT 10";
$jsql->setSQLQuery($query);
$jsql->execute();
$data = $jsql->getResults();

// Close all open database resources
$jsql->close();

print_r($data);
?>
