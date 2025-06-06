# MON-POS (Thanathip POS System)

MON-POS is a Point-of-Sale (POS) system designed for retail businesses. This guide provides step-by-step instructions for installing and running the project locally using XAMPP and PHP.

---

## 📦 Prerequisites

Before you begin, ensure the following tools are installed:

- [XAMPP](https://www.apachefriends.org/index.html)
- PHP (included with XAMPP)
- Git

---

## 🚀 Installation Guide

> ⚠️ Skip Step 1 if you already have the project files.

### 1. Clone the Project

```bash
git clone https://gitlab.com/slotty.dev/pos.git
```

### 2. Move Project to XAMPP

Copy or move the project folder to the XAMPP `htdocs` directory:

```bash
mv pos /path/to/xampp/htdocs/
```

### 3. Import the Database

1. Open [phpMyAdmin](http://localhost/phpmyadmin) in your browser.
2. Create a new database named `thanathi_pos`.
3. Import the `thanathi_pos.sql` file located in the project directory.
4. Set the **collation** to `utf8_general_ci` or UTF-8.
5. Click **Go** to complete the import.

---

## 🍎 MacOS Permission Fix (If Applicable)

If you’re installing on **MacOS**, grant necessary folder permissions:

```bash
chmod 777 /path/to/pos/client/assets/images
```

---

## 📹 Demo Videos

- 🎞️ [System Presentation Video](https://youtu.be/CF1Lkh3JpuQ)  
- 🧪 [System Testing Video](https://youtu.be/CGzwezAKZJU)

---

## 📬 Support

If you encounter any issues, please open an issue in the repository or contact the project maintainer.

---
