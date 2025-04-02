# MScProject: STAR (Staff and Applicant Recruitment System) 

This is the final year project for my MSc in Software Development, designed to manage recruitment processes for an organization. The system handles staff, applicants, HR managers, and administrative functions using a role-based access control model.

## 🧩 Features

- 👥 Role-based dashboards for:
  - **Admin**
  - **HR**
  - **Manager**
  - **Staff**
  - **Applicants**
- 📊 Visual charts and summaries
- 📂 Database backup functionality
- ✉️ Email notifications (via PHPMailer)
- 📑 Summary reports and downloadable documents

## 🛠️ Tech Stack

- **Backend:** PHP (Vanilla PHP)
- **Frontend:** HTML, CSS, JS
- **Database:** MySQL
- **Libraries:** PHPMailer

## 📁 Project Structure
├── admin/ 
├── applicant/ 
├── charts/ 
├── Database Backup/ 
├── email/ 
├── HR/ 
├── imgs/ 
├── include/ 
├── Manager/ 
├── member/ 
├── PHPMailer/ 
├── RoleSummary/ 
├── script/ 
├── staff/ 
├── stafflogin/ 
├── style/ 
├── conn.php 
└── index.php


## 🚀 Getting Started

1. Clone the repository:
   ```bash
   git clone https://github.com/wingnuttia/MScProject.git


2. Import the SQL file (in Database Backup/) into your local MySQL database.

3.  Set up conn.php with your database credentials:
   
      $host = "localhost";
      $user = "root";
      $pass = "";
      $db = "your_database_name";

4.  Serve the project using a local PHP server or through XAMPP/WAMP.


## Notes
Be sure to configure your email settings in the PHPMailer config file if you want to enable email notifications.

Logins are based on user roles stored in the database.

📜 License
This project was developed as part of my MSc dissertation and is for academic use.
