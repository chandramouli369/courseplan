# Course File Management System
This course files project is designed purely for faculty to maintain the records of the lesson plan, timetable, assignment, mid paper, rubrics, remedial classes, tutorial classes.                      
This course plan helps the faculty to make the course plan online and helps to store the course details without the fear of losing the documents.

course files System is a one-stop solution for all the course file systems. This system’s access is granted only to the Administrator and Faculty and provides the users with a very friendly user interface.

Administrator’s functionalities are to add faculty, map faculty to a subject, view upload status of all faculty, map faculty to review the question paper, update the database.

Faculty’s functionalities are to upload the assignment question paper, mid-question paper, review paper, tutorial, and to fill the details of the remedial classes, rubrics, roleplay, open-book test.

This System is a replacement to the existing Course files System, to reduce paper-work and to avoid the loss of data. This system can be accessed by all the intended users, all the time based on the Network Availability through a desktop computer or personal mobile device.

The faculty have to upload the required documents and fill the details. The proposed system helps the management in taking actions regarding issues faced by the faculty in the institution quicker. This system ensures both security and maintainability. This System has scope to make changes easily because it has been developed by using the feature of Modularity.


## Features
* Administrator or Faculty can log in.
* Admin can export Faculty Details.
* Admin can Map Subject to a Faculty Member.
* Admin can update the Database.
* Admin can modify the Mapping of Faculty.
* Admin or Faculty can view Course plan details.
* Admin and Faculty can Change Password.
* Faculty must upload the timetable, mid-question paper, mid answer scripts, assessment paper, and fill the details of remedial classes, tutorial classes, rubrics.

## Getting Started

The below link is the implemented version of the entire project.
Link Removed

### Prerequisites

Your system must be installed with xampp/wampp server running with Apache and MySQL servers.

### Installing

If you want to deploy this project in your machine, import the courseplan.sql file into MySQL. Change the database name in db.php.
Otherwise, you can test the implemented model( Link Removed ).

## Running the tests

<h3 align="center">Faculty</h3>

### Home Page (Login Page)
![Login](README/images/faculty/login.png)

* You can log in as Faculty/Admin from this page.
* If you forgot your password, you can change it by clicking the "Forgot Password" option below the Login button.

### Courses
![Courses](README/images/faculty/course.png)

* After login, this is the course selection page for faculty.
* In this, first you have to select the academic year.
* Then the courses that the faculty teaching/taught will appear here.
* Now, select any course of your choice.

### Faculty Course Dashboard
![Login](README/images/faculty/dashboard.png)

* From this page, you can view the status of the review of your course file.
* You can change your password from this page.
* You can select the required page from the left side menu.
* you can expand and collapse this sidebar.

### Upload Page
![Upload](README/images/faculty/upload.png)

* On this page, you can upload the files like images, audio, video, text files, etc.
* Uploading of PHP files is not allowed.

### Open File
![Open File](README/images/faculty/Open%20File.png)

* You can view, update, rename and delete a file.

### Mid papers
![Mid Papers](README/images/faculty/mid.png)

* On this page, you can upload paper, scheme of evolution, key, marks, sample papers.
* You can send the mid paper for review by other faculty who are teaching the same subject.

### Assignments
![Mid Papers](README/images/faculty/Assignments.png)

* On this page, you can upload CO Attainment, Bloom's Taxonomy, Rubric, Marks.

### Question Paper
![Question Paper](README/images/faculty/question%20paper.png)

* On this page, you can create your question paper.

### Rubric
![Rurbic](README/images/faculty/rubrics.png)

* Creation of rubric for the assignment and mid papers are possible from this page.

### Quiz
![Quiz](README/images/faculty/quiz.png)

* On this page, you can add the quiz links of moodle.

### Remedial Classes
![Remedial Classes](README/images/faculty/remedial.png)

* You can maintain the remedial class data.

### Content Beyond Syllabus
![Content Beyond Syllabus](README/images/faculty/content%20beyond%20syllabus.png)

* The data of any extra topics that were explained to students can be maintained here.

### Review
![Review](README/images/faculty/review.png)

* You can review the mid papers that others sent to you here.

### Reviewer
![Reviewer](README/images/faculty/reviewer.png)

* We can review the mid papers that others sent to you.
* You should enter the question no, CO, PO, matched(yes/no).

### Roleplay List
![Roleplay List](README/images/faculty/roleplay_index.png)

* The roleplay list that you have created will be displayed here.
* You can create a new roleplay by entering a name for roleplay and click the New roleplay button.

### Tutorial Classes
![Tutorial Classes](README/images/faculty/tutorial%20classes.png)

* You can enter the data of tutorial classes conducted here.



<h3 align="center">Admin</h3>

### Edit Lecturer
![Edit Lecturer](README/images/admin/edit%20lecturer.png)

* On this page, you can edit review and delete the assigned lecturer.

### Review Report
![Review Report](README/images/admin/review%20report.png)

* When you click review in edit lecturer page, the following page appears.
* You can set the status of the individual pages here by giving the review.
* Click on mark completed if updated data is correct.
* At last, don't forget to click the update button located at the end of the page.

* Exclamatory symbol(!) appears when the lecturer clicks on the button placed at the bottom right side of some pages and click on "send for review".

### Overall Review
![Overall Review](README/images/admin/overall%20review.png)

* The review of all the assigned lecturers of a particular academic year appears here.

### Add User
![Add user](README/images/admin/add%20user.png)

* You can add new users here.

### Assign Lecturer
![Assign Lecturer](README/images/admin/assign%20lecturer.png)

* You can assign lecturers to different subjects here.


## Built With

* HTML
* CSS
* BootStrap
* JavaScript
* jQuery
* php
* MySQL

## Contributers

* **S.Dinesh**
* **V.Jahnavi**
* **R.Vivekananda**
* **T.Chandra Mouli**
* **Sheema Patro**
* **P.Rushitha**
* **S.Pushpa Moulika**
* **S.Aakanksha**
* **S.Gnana Sri**
* **O.Sandeep**
* **V.Sateesh**
* **D.Yogini**
* **S.Karthik**

