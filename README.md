📌 Change Request Management System (Laravel)
📖 Project Overview

This is a simple Change Request Management System built using Laravel Blade and MySQL.
The system allows users to submit change requests through a form and store them in a database.

The project is developed as a learning exercise to understand Laravel fundamentals such as routing, controllers, migrations, models, and Blade templates.

⚙️ Technologies Used
Laravel (PHP Framework)
MySQL Database
Blade Template Engine
HTML/CSS
Bootstrap (optional styling)

🚀 Features Implemented (Today’s Work)

1. Change Request Form
Created a Blade-based form to collect user input
Fields include:
Project Module
Department
Requested By
Priority
Request Type
Change Type
Problem Statement
Decision
Comments
Assigned Details (optional fields)
Version
2. Database Migration
Created change_requests table using Laravel migration
Defined proper data types:
string
text
date
nullable fields where required
Added timestamps for tracking records
3. Auto Request Number Feature
Implemented automatic generation of Request No
Request number is displayed in the browser before submission
Format based on last inserted record (increment logic)
4. Data Storage (Store Functionality)
Created store() method in controller
Handled form submission
Stored form data into MySQL database

📂 Project Structure
app/
 └── Http/
     └── Controllers/
         └── ChangeRequestController.php

 └── Models/
     └── ChangeRequest.php

database/
 └── migrations/
     └── create_change_requests_table.php

resources/
 └── views/
     ├── layouts/
     ├── partials/
     └── change_requests/
         ├── create.blade.php
         ├── index.blade.php
         ├── edit.blade.php
         └── show.blade.php

🔄 Workflow
User opens form
      ↓
Request No auto-generated
      ↓
User fills form
      ↓
Submit request
      ↓
Data stored in database

🎯 Learning Outcomes

Through this project, I practiced:

Laravel MVC structure
Database migrations
Blade templating
Form handling
Route resource management
Basic CRUD workflow understanding

📌 Future Improvements
Add Edit & Delete functionality
Add authentication (Login system)
Add status workflow (Pending, Approved, Rejected)
Improve UI using Bootstrap/DataTables
Add role-based access (Admin/User)
👨‍💻 Developer

Farrukh (Laravel Learning Project)