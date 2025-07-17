# PHP-REG-AUTH 🔐
PHPREGAUTH  is a beginner-friendly PHP & MySQL registration and authentication system. It enables users to securely register, log in, and access a protected area using session management. Ideal for beginner-level PHP/MySQL projects.

---

## 📌 Features

- User Registration (Name, Email, Phone, Password)
- Login with Email and Password
- Session-based Authentication
- Protected Home Page
- Logout functionality
- Uses PDO for secure database interaction
- Passwords hashed 

---

## 💾 Technologies Used

- PHP
- MySQL
- HTML/CSS
- PDO (PHP Data Objects) for secure DB connection

---

## 🛠️ Setup Instructions

1. **Clone the Repository**
   ```bash
   git clone https://github.com/your-username/SimplePHPAuth.git
   cd SimplePHPAuth
 2.Create the MySQL Database and Table
   ```bash
   CREATE DATABASE IF NOT EXISTS login_db;

   USE login_db;

   CREATE TABLE login_system (
       id INT AUTO_INCREMENT PRIMARY KEY,
       name VARCHAR(100) NOT NULL,
       email VARCHAR(100) NOT NULL UNIQUE,
       phone VARCHAR(15),
       password VARCHAR(255) NOT NULL
   );



