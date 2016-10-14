# dms
Dms is a simple Dormitory management system.


## Install 
1. dms_carete_database_table.sql
2. import dorm  
3. import students
4. copy .zip
5. modify config/db.php
6. modify g/html/pages/db_connection.php
7. populate users

## Constraints
dorm	 
- dorm_num(南4#b124),
- region(南，必须与前一个字段第一个字匹配),
- build_num(4，必须与#之前的数字匹配),
- part(必须与后三位之前的字母匹配),
- floor(必须与倒数第三位匹配),total(可以为空)

students 
- dorm_num(必须与dorm_num匹配)

## License
Kyshel, MIT.





