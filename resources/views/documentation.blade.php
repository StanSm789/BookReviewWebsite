@extends('layouts.master')

    @section('title')
        Documentation
    @endsection

    @section('content')
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1>1. Entity Relationship Diagram</h1>
                <img src="images/Untitled.png" alt="ERD" width="700" height="600"/><br><br>
        </div>
        <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1>2. Degree of Project Completion</h1>
                <p>I was able to complete all 18 requirements of the Task 1 and all requirements of the Task 2. 
                Nevertheless, I was not able to create a symbolic link to display images stored in the database.</p><br>
        </div>
        <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1>3. Reflection</h1>
                <p>Compared to the first assignment, the second project was much more difficult. Not only did I have to spend a lot of my 
                time watching pre-recorded lectures but also had to read the official Laravel documantation very carefully. Nevertheless, 
                after completing the project, I learned how to build web applications using PHP programming language, together with Laravel 
                and Bootstrap frameworks. I believe, these skills are essential when entering the job market. </p><br>
        </div>
        <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1>4.  The Recommendation Feature Implementation</h1>
                <p>The recommendation feature is located in the Web Routes. It calculates the average rating for a particular book and then picks the 
                reviews with an average rating of 4.0 and higher. It also makes sure that the total number of reviews has to be no lower that 50% of the 
                total number of users, before displaying the result on a separate web page. If a user wants to find the most popular books, they simply open 
                this page and start scrolling down. </p><br>
        </div>
            </div>
    @endsection