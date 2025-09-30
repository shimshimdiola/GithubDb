# AJAX Input Example

This project demonstrates a simple **AJAX form submission** using **jQuery**.  
It sends data (username and email) to a PHP backend (`save.php`) via `POST` without reloading the page.

---

## 📌 Features
- Submit form data asynchronously using AJAX
- JSON-based response handling
- Displays success ✅, warning ⚠️, or error ❌ messages dynamically
- Prevents page reload on form submission

---

## 🛠️ Technologies Used
- **HTML5**
- **jQuery (3.6.0)**
- **PHP (Backend - `save.php`)**

---

## 🚀 How to Run

1. Clone or download the project.
2. Place the files inside your local server directory (e.g., `htdocs` for **XAMPP**).
3. Make sure you have a backend file at:/GithubDb/api/save.php

Example `save.php`:

```php
<?php
header("Content-Type: application/json");

if (!empty($_POST['username']) && !empty($_POST['email'])) {
    echo json_encode([
        "status" => "success",
        "message" => "Data received: " . $_POST['username'] . " (" . $_POST['email'] . ")"
    ]);
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Missing username or email."
    ]);
}
?>
```
4.Start your local server (XAMPP/WAMP).

5.Open the HTML file in your browser:

---

## 📂 Project Structure**
```bash
/GithubDb
 └── /api
     └── save.php
index.html

