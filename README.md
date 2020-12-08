# take-a-test INSTRUCTIONS

*1. Clone repository with command 'git clone https://github.com/chikenlover89/take-a-test.git'
* 2. Create an empty mysql database or use existing that does not have table with names 'table_status','tables_tests'
* 3. Edit '.env.example' file name to '.env'
* 4. Fill the env file configuration - DB_HOST=localhost, DB_USER= "your mysql user", DB_PASSWORD= "your password", DB_DATABASE= "your database name"
* 5. Launch 'composer install' command while in project folder
* 6. Launch 'php migrate.php' command while in project folder, command should finish with 'All done!' for correct page operation
* 7. Launch the project with command: php -S localhost:8000
* 8. Open page localhost:8000 in your browser

* Alternative to 2 and 6 points. Use command 'mysql -u [username] –p[password] [database_name] < tests_localhost-2020_12_08_21_37_30-dump.sql' in sqlDump folder
