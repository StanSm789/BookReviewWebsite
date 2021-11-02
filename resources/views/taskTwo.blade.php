@extends('layouts.master')

    @section('title')
        Documentation
    @endsection

    @section('content')
        <div class="position-relative overflow-hidden p-3 p-md-5 m-md-3 text-center bg-light">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1>1. Seeding: Spring Boot/Laravel</h1>
                <p>Similarly to Laravel, Spring Boot (Java Based framework) also has a seeder. 
                Nevertheless, it requres more steps to make it work; Moreover, Java code and 
                Spring Boot framework in particular are more complex compared to Laravel.</p>
        </div>
        <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1>2. Command Line Support: Spring Boot/Laravel</h1>
                <p>The Spring Boot Command Line Interface not only allows to run Groovi scripts but also helps to set up the project faster. 
                Nevertheless, the functionality of Spring CLI is less convenient than Laravel's Command Line Support. 
                The latter allows to do Migration and seeding, create models and controllers. In Spring, these actions are
                 generally done manually (e.g with raw SQL). </p>
        </div>
        <div class="col-md-5 p-lg-5 mx-auto my-5">
        <h1>3. Security Features: Spring Boot/Laravel</h1>
                <p>Spring is often chosen for big enterprice projects. It's security frameworks - Spring Security and Spring Vault - 
                provide relaible security tools for different purposes. At the same time, Laravel has more simple yet still 
                relaible fesatures that allow to sanitise SQL or prevent CSRF. </p><br>
        </div>
            </div>
    @endsection