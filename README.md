# Laravel Vue.js Todo App

A simple Todo List web application built with **Laravel (backend)** and **Vue.js (frontend)** using the **Composition API** and **Vite**. This project demonstrates how to create and fetch todos with real-time interaction between Vue components.

---

## 🔧 Features

- Add new todos with name, description, and completion status.
- Fetch and display todos from the backend.
- Dynamic Vue components communication using props & events.
- Laravel REST API with JSON responses.
- CSS variables with dark color scheme.
- Responsive & minimal design.
- Smooth interaction without full-page reloads.

---

## ⚙️ Tech Stack

- Laravel 12
- Vue 3 (with Composition API)
- Vite (modern frontend tooling)
- Fetch API (for AJAX requests)
- Vanilla CSS with CSS variables

---

## 📂 Project Structure

resources/
├── js/
│ ├── app.js # Entry point
│ ├── App.vue # Root Vue component
│ └── components/
│ ├── TodoApp.vue
│ ├── TodoForm.vue
│ └── DisplayTodo.vue
├── views/
│ └── welcome.blade.php # Main layout
routes/
    └── web.php # Web routes
app/
└── Http/
└── Controllers/
    └── TodoController.php


---

## 🚀 Setup Instructions

1. **Clone the repo:**
   ```bash
   git clone https://github.com/yourusername/your-repo-name.git
   cd your-repo-name
   ```
   Install backend dependencies:

```bash
composer install
```
Install frontend dependencies:

```bash
npm install
```
Environment setup:

```bash
cp .env.example .env
php artisan key:generate
```
Run migrations (optional for todos table):
```bash
php artisan migrate
```
Start the development servers:

```bash
php artisan serve
npm run dev
```
Visit:
```bash
http://localhost:8000
```
📬 API Endpoints
Method	Endpoint	    Description
GET	    /todos	        Fetch all todos
POST	/todos/post	    Create a new todo

✅ Example Todo Payload
{
  "name": "Buy groceries",
  "description": "Milk, Eggs, Bread",
  "is_completed": true
}
📸 UI Preview
![image](https://github.com/user-attachments/assets/f820e62b-4c52-4a9e-82ae-be161eadbcdb)
![image](https://github.com/user-attachments/assets/13f98329-8c35-42eb-bff6-e2da496d6b37)




📃 License
This project is open-source and available under the MIT License.

🙌 Credits
Built by Muhammad Ali

