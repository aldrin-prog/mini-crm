# **Mini-CRM Laravel Application**

This is a simple Mini-CRM application built using Laravel, MySQL, and AdminLTE. It allows for CRUD operations on companies and employees, provides basic authentication, and includes multi-language support for English and Tagalog.

## **Features**

- Basic Laravel authentication with admin login.
- CRUD operations for:
  - **Companies**: Name, email, logo (min 100x100), and website.
  - **Employees**: First name, last name, email, phone, and associated company.
- Logo upload and display (with file storage in the `storage/app/public/logos` folder).
- Multi-language support (English and Tagalog).
- DataTables integration for company and employee lists.
- Pagination for viewing companies and employees (10 entries per page).
- Email notification when a new company is created.
- Uses AdminLTE for sleek UI and responsive design.

## **Technologies Used**

- Laravel 9.x
- MySQL
- AdminLTE 3
- DataTables.js
- Bootstrap 4
- PHP 8.x

## **Installation Instructions**

Follow these steps to get the project running on your local machine.

### **1. Clone the repository**

```bash
git clone https://github.com/aldrin-prog/mini-crm.git
cd mini-crm
