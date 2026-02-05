

---

# Employee Management System (PHP MVC)

---

## ☁️ EC2 Deployment Guide

## Option 1: Ubuntu AMI (22.04 / 24.04 LTS)

### 1️⃣ Update the System

```bash
sudo apt update && sudo apt upgrade -y
```

---

### 2️⃣ Install LAMP Stack

```bash
sudo apt install -y apache2 mysql-server php libapache2-mod-php php-mysql
```

Start and enable services:

```bash
sudo systemctl enable apache2 mysql
sudo systemctl start apache2 mysql
```

Verify Apache:

```bash
http://<EC2-PUBLIC-IP>
```

---

### 3️⃣ Configure MySQL

```bash
sudo mysql
```

Inside MySQL:

```sql
SOURCE /path/to/db.sql;
ALTER USER 'root'@'localhost'
IDENTIFIED WITH mysql_native_password BY 'your-strong-password';
FLUSH PRIVILEGES;

#run commands given in db.sql to create the database and tables

EXIT;
```

➡️ **Use the same credentials in `config.php`**

---

### 4️⃣ Deploy Application Code

```bash
cd /var/www/html
sudo git clone https://github.com/Omkar9689/Basic-PHP-App.git
sudo chown -R www-data:www-data Basic-PHP-App
sudo chmod -R 755 Basic-PHP-App
```

---

### 5️⃣ Configure Apache Virtual Host

```bash
sudo nano /etc/apache2/sites-available/000-default.conf
```

Update:

```apache
DocumentRoot /var/www/html/Basic-PHP-App
```

Restart Apache:

```bash
sudo systemctl restart apache2
```

---

### 6️⃣ Access the Application

```
http://<EC2-PUBLIC-IP>
```

---

## Option 2: Amazon Linux 2023 AMI

### 1️⃣ Update System

```bash
sudo yum update -y
```

---

### 2️⃣ Install LEMP Stack

```bash
sudo yum install -y nginx mariadb105-server php php-mysqlnd git
```

---

### 3️⃣ Start & Enable Services

```bash
sudo systemctl enable nginx mariadb
sudo systemctl start nginx mariadb
```

---

### 4️⃣ Configure Database

```bash
sudo mysql
```

Inside MySQL:

```sql
SOURCE /path/to/db.sql;
ALTER USER 'root'@'localhost'
IDENTIFIED BY 'your-strong-password';
FLUSH PRIVILEGES;

#run commands given in db.sql to create the database and tables
EXIT;
```

---

### 5️⃣ Deploy Application Code

```bash
cd /usr/share/nginx
sudo git clone https://github.com/Omkar9689/Basic-PHP-App.git
sudo chown -R nginx:nginx Basic-PHP-App
sudo chmod -R 755 Basic-PHP-App
```

---

### 6️⃣ Configure Nginx

```bash
sudo nano /etc/nginx/nginx.conf
```

Inside `server` block:

```nginx
root /usr/share/nginx/Basic-PHP-App;
index index.php index.html;

location / {
    try_files $uri $uri/ /index.php?$query_string;
}

location ~ \.php$ {
    include fastcgi_params;
    fastcgi_pass unix:/run/php-fpm/www.sock;
    fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
}
```

Restart services:

```bash
sudo systemctl restart nginx php-fpm
```

---

### 7️⃣ Access the Application

```
http://<EC2-PUBLIC-IP>
```

---

## 🔒 Security Group Configuration (Required)

| Type  | Protocol | Port | Source       |
| ----- | -------- | ---- | ------------ |
| HTTP  | TCP      | 80   | 0.0.0.0/0    |
| HTTPS | TCP      | 443  | 0.0.0.0/0    |
| SSH   | TCP      | 22   | Your IP only |

---


