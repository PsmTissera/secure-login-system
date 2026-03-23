# 🔐 Secure Login System with Security Monitoring

## 📌 Project Overview
This project is a secure authentication system developed using PHP and MySQL.  
It includes advanced security features such as brute force protection, IP tracking, and login activity monitoring through an admin dashboard.

---

## 🚀 Features

### 👤 User Features
- User Registration
- Secure Login with password hashing
- Session-based authentication
- Logout functionality

### 🛡️ Security Features
- Brute force attack prevention (account lock after multiple failed attempts)
- IP address tracking for login attempts
- Suspicious login detection (IP change warning)
- Login activity logging system

### 📊 Admin Features
- Security Monitoring Dashboard
- View recent login attempts
- Track failed, successful, and locked logins
- Basic intrusion detection visibility

---

## 🛠️ Technologies Used
- PHP
- MySQL
- HTML & CSS
- XAMPP (Apache Server)

---

## 🧩 System Architecture

- `register.php` → User registration  
- `login.php` → Authentication & security logic  
- `dashboard.php` → User dashboard  
- `admin_dashboard.php` → Security monitoring dashboard  
- `logout.php` → Session termination  
- `db.php` → Database connection  

---

## 🔐 Security Concepts Implemented
- Password Hashing (`password_hash`, `password_verify`)
- Brute Force Protection
- IP Tracking (`REMOTE_ADDR`)
- Logging & Monitoring
- Basic Role-Based Access Control (Admin/User)

---


---

## 🎯 Learning Outcomes
- Understanding of authentication systems
- Implementation of basic cybersecurity concepts
- Experience with full-stack web development
- Introduction to security monitoring systems

---

## 📌 Future Improvements
- Two-Factor Authentication (2FA)
- CAPTCHA integration
- Email alerts for suspicious logins
- Advanced role management system

---

## 👩‍💻 Author
- Sandupama Tissera
