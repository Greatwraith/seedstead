# 🌱 Seedstead - Plant Seedling E-commerce Platform

**Seedstead** is a final project developed by our team for Grade 10 at SMK Telkom Banjarbaru, designed to build an **e-commerce platform for plant seedlings and seeds**. The primary objective of this project is to provide an online marketplace for plant seedlings with a simple, intuitive, and user-friendly interface for both administrators and users.

This Web is built using **Native PHP** with support from **HTML, CSS, and JavaScript** without relying on external frameworks. Separate dashboards are provided for **users** and **administrators** to ensure efficient transaction management and monitoring.

> ⚠️ This project is **not yet 100% complete** and is **still under active development**. Some features are not fully responsive on smaller screens, and we plan to continuously improve this project in the future, including enhancements to UI/UX design, security, and scalability.

---

## 🔥 Key Features

### 💼 Public Pages
- `index.php` → Homepage (About & Banner)
- `products.php` → Complete product catalog
- `login.php` and `register.php` → User authentication forms
- **Product search functionality**
- **Category-based filtering system**

### 👤 User Dashboard (Post-Login)
- Home Dashboard (navigation hub for all features)
- **Checkout** → Display selected products awaiting payment
- **Pending Orders** → Orders awaiting admin validation/processing
- **Completed Orders** → Order history and completed transactions
- **Canceled Orders** → List of canceled orders
- **Shopping Cart** → User shopping cart management
- **Profile** → User account information and settings
- **Logout**

### 🛠️ Admin Dashboard
- **Product Management** → Add, edit, and delete products
- **Order Validation** → Review and process user orders
- **Order Status Management** → Track orders by status (checkout, pending, complete, canceled)
- **User Account Management**

---

## 🧱 Technology Stack

| Technology | Description                    |
|------------|--------------------------------|
| PHP        | Server-side backend (native)   |
| MySQL      | Relational database            |
| HTML5      | Web page structure             |
| CSS3       | Styling and page layout        |
| JavaScript | UI interactions for banner     |
| Git        | Version control system         |
| GitHub     | Repository and collaboration   |

---

> Some files such as security validation and complex logic are not yet modularly separated — this will be improved in future development iterations.

---

## ⚙️ Local Setup Instructions

1. **Clone this repository**

```bash
git clone https://github.com/Greatwraith/seedstead.git
```

2. **Move to XAMPP directory**

```bash
C:\xampp\htdocs\seedstead
```

3. **Create new database in phpMyAdmin**

Database name: 
```seedstead```

Import file: ```ujian_blok6.sql```

4. **Configure database connection in /database/config.php**

```php
$host = 'localhost';
$user = 'root';
$pass = '';
$dbname = 'seedstead';
```

5. **Use XAMPP/MAMP/LARAGON**

Start web server (Apache), database (MySQL/MariaDB), and programming language services (PHP, Perl)

6. **Access via browser**

```
http://localhost/seedstead
```

---

## ❗ Current Limitations

> Mobile responsiveness on small devices (smartphones) is not optimal

> Display is better optimized for devices at least tablet-sized (Galaxy Fold2 or larger)

> Security measures and file structure will be enhanced in subsequent versions

---

## 📌 Future Development Roadmap

> Admin and user notification system (e.g., order status updates)
> Full responsive design implementation (mobile-first approach)
> Project migration to Laravel Framework

---

## 🤝 Contributors

**👨‍💻 M. Ardhan Rahman**  
Role: Lead Programmer | Project Coordinator  
GitHub: @Greatwraith  
Responsibilities: Project Ideation, Team Leadership, UI/UX Design, Backend & Frontend Development, Project Architecture, GitHub Maintenance, Database Management

**👨‍💻 Ricky Stevan**  
Role: Frontend Developer  
Responsibilities: Project Ideation, UI/UX Design, Frontend Development, Assistant Team Leader

**👨‍💻 Javaren**  
Role: Documentation & Presentation Specialist  
Responsibilities: Proposal Writing, Presentation Development, Project Ideation, Design Consultation

---

---

## 🙏 Acknowledgments

We extend our heartfelt gratitude to each team member who contributed their unique skills and dedication to make Seedstead a reality. This project would not have been possible without the collaborative effort, creative ideas, and unwavering commitment of M. Ardhan Rahman, Ricky Stevan, and Javaren. Each member brought their expertise to different aspects of the project, from technical development to documentation and presentation, creating a well-rounded and comprehensive e-commerce platform. Their professionalism, problem-solving abilities, and teamwork throughout the development process have been instrumental in achieving our project goals.

Above all, we are deeply grateful to Almighty God for His blessings and guidance throughout this journey, enabling us to overcome challenges and complete this project successfully. We also express our sincere appreciation to our teachers and mentors at SMK Telkom Banjarbaru for their invaluable guidance, constructive feedback, and continuous support. Their expertise and encouragement have not only helped us technically but also shaped our understanding of professional software development practices. This project stands as a testament to the power of collaboration, divine guidance, and quality education.

---

**Final Project - Grade X | SMK Telkom Banjarbaru | Academic Year 2024/2025**
