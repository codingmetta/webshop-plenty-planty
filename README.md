# Webshop: Plenty Planty
## User Manual

### System Setup

0. Run XAMPP and start all services 'Apache', 'MySQL' and 'ProFTP'
1. Call 'localhost:8080/phpmyadmin/' from browser
2. Create a DB and name it 'plantytest'
3. Call scripts one by one by the url in the browser in the following order: 
- `localhost:8080/webshop-plenty-planty/setup/createUserTable.php`
- `localhost:8080/webshop-plenty-planty/setup/createProductTable.php`
- `localhost:8080/webshop-plenty-planty/setup/createOrderTable.php`
- `localhost:8080/webshop-plenty-planty/setup/addAdmin.php`
- `localhost:8080/webshop-plenty-planty/setup/fillProductTableDummyData.php`
- `localhost:8080/webshop-plenty-planty/setup/fillUsersDummyData.php`
4. The setup for the Project is now done and the functionalities can be tested