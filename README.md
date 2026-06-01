Student Database Management System
A straightforward and beginner-friendly web application designed to manage student records. Built with PHP, MySQL, HTML, and CSS, this project allows users to easily add, view, update, search, and delete student data from a central database.

✨ Features
Create: Add new student records (ID, Name, Age, Gender, Email, Contact, Department).

Read: View a clean, tabular list of all enrolled students.

Update: Edit existing student details seamlessly.

Delete: Remove a student record with a safe confirmation prompt to prevent accidental deletions.

Search: Quickly find specific students by typing their Student ID, Name, or Department.

Responsive Design: Clean and accessible UI that looks good on both desktop and smaller screens.

🛠️ Technologies Used
Frontend: HTML5, CSS3, FontAwesome (for UI icons)

Backend: PHP (Core)

Database: MySQL

Architecture: Procedural PHP with Prepared Statements (for security against SQL injection)

📁 Project Structure
index.php - The main landing page with navigation options.

add_student.php - The form page to insert a new student into the database.

view_students.php - Displays the student table and contains the search functionality.

edit_student.php - Fetches a specific student's data and allows you to update it.

delete_confirmation.php - A safety screen that asks for confirmation before deleting a record.

connection.php - Handles the database connection logic using mysqli.

styles.css - Contains all the visual styling and layout rules for the application.

🚀 How to Run the Project Locally
Follow these simple steps to get the project running on your own machine.

Prerequisites
You will need a local server environment like XAMPP, WAMP, or MAMP installed on your computer.

Step 1: Set Up the Files
Download or clone this repository.

Move the project folder into your local server's root directory:

For XAMPP: Move it to the C:\xampp\htdocs\ folder.

For WAMP: Move it to the C:\wamp\www\ folder.

Step 2: Set Up the Database
Open your XAMPP/WAMP control panel and start Apache and MySQL.

Open your web browser and go to http://localhost/phpmyadmin.

Create a new database and name it exactly: studentdb.

Click on the studentdb database, go to the SQL tab, and run the following query to create the necessary table:

SQL
CREATE TABLE student_info (
    Student_id VARCHAR(50) PRIMARY KEY,
    Name VARCHAR(100) NOT NULL,
    Age INT NOT NULL,
    gender VARCHAR(20) NOT NULL,
    Email VARCHAR(100) NOT NULL,
    Contact VARCHAR(20) NOT NULL,
    Department VARCHAR(100) NOT NULL
);
Step 3: Run the Application
Open your web browser.

Type in the URL path to your project folder. For example: http://localhost/your_project_folder_name/index.php.

You are all set! Start adding students to your new database.

👤 Author
Developed by Shaheer.
