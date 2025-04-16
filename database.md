MariaDB [(none)]> USE midterm;
Database changed
MariaDB [midterm]> SHOW TABLES;
+-------------------+
| Tables_in_midterm |
+-------------------+
| accounts          |
| transaction       |
+-------------------+
2 rows in set (0.001 sec)

MariaDB [midterm]> DESC accounts;
+----------+----------------------+------+-----+---------+----------------+
| Field    | Type                 | Null | Key | Default | Extra          |
+----------+----------------------+------+-----+---------+----------------+
| ID       | int(11)              | NO   | PRI | NULL    | auto_increment |
| Name     | varchar(100)         | NO   |     | NULL    |                |
| Age      | int(11)              | NO   |     | NULL    |                |
| Address  | varchar(200)         | NO   |     | NULL    |                |
| Password | varchar(100)         | NO   |     | NULL    |                |
| Role     | enum('User','Admin') | NO   |     | NULL    |                |
+----------+----------------------+------+-----+---------+----------------+
6 rows in set (0.028 sec)


MariaDB [midterm]> SELECT * FROM accounts;
+----+-------+-----+--------------------+----------+-------+
| ID | Name  | Age | Address            | Password | Role  |
+----+-------+-----+--------------------+----------+-------+
|  1 | admin | 100 | Dyan lang sa gedli | admin    | Admin |
|  2 | user  | 100 | Dyan lang sa gedli | user     | User  |
|  3 | user1 | 100 | Dyan lang sa gedli | user     | User  |
|  4 | user2 | 100 | Dyan lang sa gedli | user     | User  |
+----+-------+-----+--------------------+----------+-------+
4 rows in set (0.068 sec)

MariaDB [midterm]>


MariaDB [midterm]> DESC transaction;
+-----------+--------------+------+-----+---------+----------------+
| Field     | Type         | Null | Key | Default | Extra          |
+-----------+--------------+------+-----+---------+----------------+
| ID        | int(11)      | NO   | PRI | NULL    | auto_increment |
| Name      | varchar(100) | NO   |     | NULL    |                |
| Position  | varchar(100) | NO   |     | NULL    |                |
| PartyList | varchar(100) | NO   |     | NULL    |                |
| VoteCount | int(11)      | NO   |     | NULL    |                |
+-----------+--------------+------+-----+---------+----------------+
5 rows in set (0.030 sec)

MariaDB [midterm]> SELECT * FROM transaction;
+----+--------+----------+-----------+-----------+
| ID | Name   | Position | PartyList | VoteCount |
+----+--------+----------+-----------+-----------+
|  5 | ping   | senator  | valota    |         1 |
|  6 | pinges | senator  | valota    |         1 |
|  8 | pingot | h        | h         |         1 |
|  9 | lungay | s        | s         |         1 |
+----+--------+----------+-----------+-----------+
4 rows in set (0.001 sec)

MariaDB [midterm]>