# Notely 📚

**Your ultimate SaaS platform for managing handwritten notes & flashcards.**

![Notely Banner]("\img\banner.jpg")

---

## 🚀 Overview

Notely is a lightweight, **full-stack** web application designed for students to **upload handwritten notes, categorize them by subjects**, and manually **create interactive flashcards** for efficient studying.

**Built with:**
🔹 **Frontend:** HTML, CSS, JavaScript (Vanilla)
🔹 **Backend:** PHP
🔹 **Database:** MySQL (running on XAMPP)

---

## 🌟 Features

✅ **User Authentication**

* Secure sign-up & login system
* Password hashing with Bcrypt
* Session-based authentication

✅ **Note Management**

* Upload handwritten notes as **JPG, PNG, PDF**
* Categorize notes by subject
* View & delete uploaded notes

✅ **Flashcard System**

* Manually create **Q\&A flashcards**
* View flashcards grouped by subject
* **Flip animation** for interactive studying

✅ **User Dashboard**

* Overview of subjects
* Quick access to notes & flashcards

---

## 🏗️ Directory Structure

```
notely/
├── config/               # Database connection
├── controllers/          # Business logic (authentication, upload, flashcards)
├── models/               # Database interaction (Notes, Users, Flashcards)
├── helpers/              # Session management & utilities
├── views/                # Frontend templates (HTML & embedded PHP)
├── public/               # Assets (CSS, JS, uploads/)
├── sql/                  # Database schema
```

---

## ⚡ Installation

### == 1️⃣ Set up your environment

Ensure you have:

* ✔ **XAMPP** (Apache & MySQL) installed
* ✔ **PHP 7+**

### == 2️⃣ Clone the repository

```sh
git clone https://github.com/zaeeeeeem/notely.git
cd notely
```

### == 3️⃣ Set up the database

* Open **XAMPP** and start **Apache** & **MySQL**.
* Visit **phpMyAdmin** and create a database named `notely`.
* Import the `sql/schema.sql` file.

### == 4️⃣ Configure the environment

Edit `config/db.php` and set your database credentials:

```php
$host = 'localhost';
$dbname = 'notely';
$username = 'root';
$password = '';
```

### == 5️⃣ Run Notely

Simply open:

```
http://localhost/notely/
```

your browser will load the app! 🎉

---

## 👨‍💻 Contributors

* **Muhammad Zaeem Ul Hassan** ([GitHub](https://github.com/zaeeeeeem))
* **Copilot** (AI-powered assistance 🤖)

---

## 📜 License

This project is open-source under the **MIT License**. Feel free to use, modify, and contribute!

---

## ✨ Contributing

We welcome pull requests, feature suggestions, and bug reports! To contribute:

1. Fork the repo
2. Create a branch (`feature-new`)
3. Commit your changes
4. Open a pull request

---

## 📝 To-Do

🔲 **Enhancements**

* [ ] Implement search functionality
* [ ] Improve UI responsiveness
* [ ] Add popups for confirmation dialogs

---

🔥 **Ready to make Notely the ultimate study tool? Clone, build, and contribute now!**