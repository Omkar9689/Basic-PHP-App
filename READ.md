
# Employee Management System (PHP MVC)

A lightweight, clean Employee Registration System built using the **Model-View-Controller (MVC)** architecture. This project demonstrates basic CRUD operations, PDO for secure database interactions, and a responsive front-end design.

## 🚀 Features

* **MVC Architecture:** Separates business logic, data handling, and presentation.
* **Secure:** Uses PDO prepared statements to prevent SQL Injection.
* **Modern UI:** Clean, responsive interface built with CSS3.
* **Dynamic List:** View registered employees instantly below the form.

## 📂 Project Structure

```text
/employee_app
│── config.php          # Database connection settings
│── index.php           # Router & Controller logic
│── model.php           # Data handling (SQL queries)
│── view.php            # HTML/CSS UI template
│── db.sql              # Database schema

```

---

## 🛠️ Local Installation

1. Clone the repository to your local server directory (e.g., `htdocs` or `var/www/html`).
2. Import the `db.sql` file into your MySQL database.
3. Update `config.php` with your local database credentials.
4. Access the project via `http://localhost/employee_app`.

---

## ☁️ EC2 Deployment Guide

### Option 1: Ubuntu AMI (22.04 or 24.04 LTS)

1. **Update System:**
```bash
sudo apt update && sudo apt upgrade -y

```


2. **Install LAMP Stack:**
```bash
sudo apt install apache2 mysql-server php libapache2-mod-php php-mysql -y

```


3. **Setup Database:**
```bash
sudo mysql -u root
# Run the SQL commands from db.sql here

```


4. **Deploy Code:**
```bash
cd /var/www/html
sudo git clone https://github.com/your-username/employee_app.git .
sudo chown -R www-data:www-data /var/www/html

```



### Option 2: Amazon Linux 2023 AMI

1. **Update System:**
```bash
sudo dnf update -y

```


2. **Install LAMP Stack:**
```bash
sudo dnf install -y httpd mariadb105-server php php-mysqlnd

```


3. **Start Services:**
```bash
sudo systemctl start httpd
sudo systemctl enable httpd
sudo systemctl start mariadb
sudo systemctl enable mariadb

```


4. **Deploy Code:**
```bash
cd /var/www/html
sudo git clone https://github.com/your-username/employee_app.git .
sudo chmod -R 755 /var/www/html

```



---

## 🔒 Security Group Configuration

To access the app via your browser, ensure your EC2 Security Group has the following inbound rules:

| Type | Protocol | Port Range | Source |
| --- | --- | --- | --- |
| HTTP | TCP | 80 | 0.0.0.0/0 |
| HTTPS | TCP | 443 | 0.0.0.0/0 |
| SSH | TCP | 22 | Your IP |

---



