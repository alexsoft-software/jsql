## **JSQLDB - JSON SQL Database for PHP**

📌 **A lightweight, SQL-like JSON-based database for PHP**  

**JSQLDB** is a **flexible database system** that **leverages JSON** for storage and provides **SQL-like queries** without requiring SQLite or MySQL. It’s **lightweight, fast**, and **perfect** for applications that need **portability and security**.

---

### **🚀 Features**

✅ **JSON-based storage** without DLL/SO dependencies  
✅ **SQL-like queries** with support for `SELECT`, `JOIN`, `GROUP BY`, `HAVING`, `LIMIT`  
✅ **Indexing support** for fast searching  
✅ **Compressed storage** for optimized resource usage  
✅ **Customizable storage path** for secure data management  
✅ **Optimized for PHP 8.2+**  

---

### **📌 Installation**

```bash
git clone https://github.com/alexsoft-software/jsql.git
cd jsql
composer install
```

✏️ **More details coming soon in the documentation!**

---

### **📌 Example Usage**

```php
<?php
use ASCOOS\FRAMEWORK\Kernel\DB\JSQLDB;

$conf = require "conf/config.php";

$sql = "CREATE TABLE `#__articles` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `article_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `cat_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `lang_id` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `title` varchar(200) NOT NULL,
  `content` text NULL,
  `created` timestamp NULL DEFAULT current_timestamp()
  `updated` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()  
);";

$jsql = new TJSQLDB($conf);

// Create Database
$jsql->createDatabase('test_db');

// Create User and assign to Database
$jsql->createUser('admin', 'root', 'test_db');

// Select Current Database
$jsql->select_db('test_db');

// Create Table
$jsql->setSQLQuery($sql);
$jsql->execute();

$query = "SELECT article_id AS aid, title, content AS doc FROM #__articles WHERE user_id = ".$my->id." AND lang_id = 1 ORDER BY created DESC LIMIT 10";
$jsql->setSQLQuery($query);
$jsql->execute();
$data = $jsql->getResults();

// Close all open database resources
$jsql->close();

print_r($data);
?>
```
📌 **See more examples on the official website!**  

---

