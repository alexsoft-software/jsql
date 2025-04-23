# **JSQLDB - JSON SQL Database for PHP**

## 💬 **A lightweight, SQL-like JSON-based database for PHP**  

**JSQLDB** is a **flexible database system** that **leverages JSON** for storage and provides **SQL-like queries** without requiring SQLite or MySQL. It’s **lightweight, fast**, and **perfect** for applications that need **portability and security**.

---

![JSQL Database](https://s.ascoos.com/images/jsql/jsqldb.jpg)

---

### 🚀 **Features**
- ✅ **JSON-based storage** without DLL/SO dependencies  
- ✅ **SQL-like queries** with support for `SELECT`, `INSERT`, `UPDATE`, `DELETE`, `JOIN`, `UNION`, `GROUP BY`, `HAVING`, `LIMIT`, `ORDER BY`, `DISTINCT` etc.
- ✅ **Indexing support** for fast searching  
- ✅ **Compressed storage** for optimized resource usage  
- ✅ **Customizable storage path** for secure data management  
- ✅ **Optimized for PHP 8.2+**  

---

### 🧩 Requires:
- PHP 8.2+
- Ascoos Framework (For high level access, and managed)
- ionCube Loaders

---

### **💻 Installation**

```bash
git clone https://github.com/alexsoft-software/jsql.git
cd jsql
composer install
```

✏️ **More details coming soon in the documentation!**

---

## 📌 **Using the Database**

The database must be initialized before using it. This is done through the settings file.


### **📑 Example Settings**
```php

return [
    'jsql' => [
        'config_path' => '/root/path/conf/config.json', 
        'users_path' => '/root/path/conf/users.json',
        'databases_root_path' => '/root/path/jsql_db',      
    ]
];
```

### **📑 Example Usage**

```php
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
$sql = "CREATE TABLE `#__articles` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `article_id` INT UNSIGNED NOT NULL DEFAULT 0,
  `cat_id` INT UNSIGNED NOT NULL DEFAULT 0,
  `user_id` INT UNSIGNED NOT NULL DEFAULT 0,
  `lang_id` INT UNSIGNED NOT NULL DEFAULT 0,
  `title` VARCHAR(200) NOT NULL,
  `content` TEXT NULL COMPRESSED,
  `created` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `updated` DATETIME NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP()
);";

$jsql->setSQLQuery($sql);
$jsql->execute();

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
```

### 📑 **Alternative way to create a table**

```php

// Direct way to create a table and its structure.
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

```

✏️ **See more examples on the official website!**  



