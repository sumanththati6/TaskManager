[![License: MIT](https://img.shields.io/badge/License-MIT-yellow.svg)](https://opensource.org/licenses/MIT)

# Task Manager (PHP + MySQL)

A simple task management web application built using PHP, MySQL, HTML, CSS, and JavaScript.

## ✨ Features

- Create, view, edit, and delete tasks
- Set and display task priority (Low, Medium, High)
- Live search and filtering by priority
- Simple, responsive layout using custom CSS
- Runs on free web hosts like InfinityFree

## 🚀 Technologies Used

- PHP (Server-side scripting)
- MySQL (Database)
- HTML/CSS (Frontend)
- JavaScript (Client-side interactivity)

## 📦 Setup Instructions

1. **Clone this repository**

```bash

Upload Files to Web Host

Use InfinityFree or any PHP-compatible hosting

Upload the project contents to the htdocs or root directory

Create the MySQL Database

Use phpMyAdmin to create a database named tasks

Add a table called tasks with the following fields:

sql
CREATE TABLE tasks (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  status VARCHAR(20) NOT NULL,
  priority VARCHAR(10) DEFAULT 'medium',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

Update Database Credentials

Edit your .php files to match your database host, username, password, and name
