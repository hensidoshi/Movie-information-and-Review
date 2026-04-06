# 🎬 Movie Information & Review System

## 📌 Project Overview
The Movie Information & Review System is a web-based application that allows users to explore movies, view detailed information, and share their reviews. It provides an easy-to-use interface for managing movies, actors, directors, and user feedback.

---

## 🚀 Features
- Browse and search movies  
- View actor and director details  
- Add and read movie reviews  
- User authentication (Login/Register)  
- Admin can add, update, and delete movies  
- Manage categories and ratings  

---

## 🛠️ Technologies Used
- Frontend: HTML, CSS, JavaScript, Bootstrap  
- Backend: Laravel / PHP  
- Database: MySQL  
- Tools: XAMPP, VS Code  

---

## 📸 Screenshots

### 🏠 Home Page
<img width="1892" height="860" alt="image" src="https://github.com/user-attachments/assets/96c23f12-5f08-4b2b-ae97-993f2b8acbb4" />
<img width="1892" height="860" alt="image" src="https://github.com/user-attachments/assets/a6e30fde-6bb4-444e-b7b0-4b85f0ad1bcb" />

### 🎬 Movie Details
<img width="528" height="859" alt="image" src="https://github.com/user-attachments/assets/0519b475-8c92-4a4c-a521-b00c96679127" />

### ⭐ Review Section
<img width="528" height="859" alt="image" src="https://github.com/user-attachments/assets/b0fc8bad-a430-449b-9426-df8ffe15842c" />

### 🔐 Login Page
<img width="597" height="777" alt="image" src="https://github.com/user-attachments/assets/16acc1a7-b4df-42fc-90a1-dc23351356e6" />
<img width="597" height="777" alt="image" src="https://github.com/user-attachments/assets/1f96e12d-0961-4583-add6-fe9143cec78a" />

### 🛠️ Admin Panel
<img width="1891" height="861" alt="image" src="https://github.com/user-attachments/assets/cd070ed3-8773-4d4e-b915-a8b6c618e3b5" />

---

## 📂 Project Structure
movie-information-and-review/

│── app/  
│── database/  
│── public/  
│── resources/  
│── routes/  
│── storage/  
│── .env  
│── composer.json  

---

## ⚙️ Installation & Setup

1. Clone the repository  
git clone https://github.com/hensidoshi/movie-information-and-review.git  

2. Go to project folder  
cd movie-information-and-review  

3. Install dependencies  
composer install  

4. Create environment file  
cp .env.example .env  

5. Setup database in .env file  
DB_DATABASE=movie_information_and_review  
DB_USERNAME=root  
DB_PASSWORD=  

6. Run migrations  
php artisan migrate  

7. Start server  
php artisan serve  

---

## 🗄️ Database Tables  
- movies  
- actors  
- directors  
- reviews
- watchlists
- users  
- genres
- languages
- roles
- movie_genres
- movie_actors

---

## 👨‍💻 Author
Hensi Doshi  
Email: hensidoshi711@gmail.com  
GitHub: https://github.com/hensidoshi  

---

## 💡 Future Improvements
- Trailer integration  
- Wishlist / Favorites  
- Mobile responsiveness improvements  
- Advanced filters  

---

## 📄 License
This project is for educational purposes.
