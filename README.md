# Construction Finance Management System

A web-based application for managing finances in construction projects. Built with **Laravel**, this system allows construction companies to efficiently track expenses, employee payments, project budgets, and generate detailed reports.

---

## Features

- **Project Management**
  - Create, edit, and track construction projects.
  - Assign employees and resources to projects.
- **Expense Tracking**
  - Record and categorize project-related expenses.
  - Generate expense reports by date, project, or type.
- **Employee Management**
  - Manage employee details and salaries.
  - Track payments and financial contributions.
- **Reports**
  - Generate PDF/Excel reports for projects, expenses, and employees.
- **User-Friendly Dashboard**
  - Responsive interface with statistics and summaries.
  - Easy navigation and clear visualization of data.

---

## Technology Stack

- **Backend:** Laravel 10  
- **Frontend:** Blade templates, Bootstrap/Tailwind CSS  
- **Database:** MySQL  
- **Version Control:** Git & GitHub  

---

## Installation

1. **Clone the repository**

```bash
composer install
npm install
npm run dev
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
Visit http://127.0.0.1:8000 in your browser.

Usage

Access the dashboard after registering or logging in.

Navigate through Projects, Expenses, Employees, and Reports.

Create, edit, or delete records as needed.

Generate reports for financial analysis and record-keeping.

Contributing

Contributions are welcome!

Fork the repository

Create your feature branch: git checkout -b feature-name

Commit your changes: git commit -m "Add feature"

Push to the branch: git push origin feature-name

Open a Pull Request

License

This project is licensed under the MIT License.

Author

Gashumba Aimable Pacifique

GitHub: GASHUMBA


git clone https://github.com/GASHUMBA/construction-finance-api.git
cd construction-finance-api
