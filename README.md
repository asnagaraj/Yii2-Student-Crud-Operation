Requirements
-------------------

	1. php 7.3+
	2. Mysql 5.6
    
Setup development
-------------------

	1. From /var/www/html folder Run git clone https://github.com/g-manikandan845/yii2_student_crud_operation.git
	2. Enter git username and password when prompted
	3. Run cd yii_student
	4. Run git checkout master
	5. Run git pull origin master
	6. Run php init
	7. Run composer install
	8. Run composer update
    9. Create an empty database
    10. Run zcat db/yii_student.sql.gz | mysql -u {database_username} -p {database_name} 
    11. Enter databse password when prompted.
	12. Add DB Connection
		file path : common/config/main-local.php
	13. Backend Url : http://localhost/yii_student/backend/web/
		Frontend Url : http://localhost/yii_student/frontend/web/

3rd-Party Extensions in vendor folder
--------------------------------------

	1. https://github.com/kartik-v/yii2-export
	2. https://github.com/kartik-v/yii2-widget-depdrop

DIRECTORY STRUCTURE
-------------------

```
common
    config/              contains shared configurations
    mail/                contains view files for e-mails
    models/              contains model classes used in both backend and frontend
    tests/               contains tests for common classes    
console
    config/              contains console configurations
    controllers/         contains console controllers (commands)
    migrations/          contains database migrations
    models/              contains console-specific model classes
    runtime/             contains files generated during runtime
backend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains backend configurations
    controllers/         contains Web controller classes
    models/              contains backend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for backend application    
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
frontend
    assets/              contains application assets such as JavaScript and CSS
    config/              contains frontend configurations
    controllers/         contains Web controller classes
    models/              contains frontend-specific model classes
    runtime/             contains files generated during runtime
    tests/               contains tests for frontend application
    views/               contains view files for the Web application
    web/                 contains the entry script and Web resources
    widgets/             contains frontend widgets
vendor/                  contains dependent 3rd-party packages
environments/            contains environment-based overrides
```
