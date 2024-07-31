# Outreach Resource API

## Table of Contents

1. [GoDaddy Credentials](#godaddy-credentials)
2. [How to Use API Token](#how-to-use-api-token)
3. [Authentication Resource](#authentication-resource)
    - [Register Student](#register-student)
    - [Login User](#login-user)
4. [Registration Process](#registration-process)
5. [User Resource](#user-resource)
6. [College Resource](#college-resource)
7. [Skillset Resource](#skillset-resource)
8. [Student Resource](#student-resource)
9. [Company Resource](#company-resource)
10. [Company Skills Need Resource](#company-skills-need-resource)
11. [Student Skill Set Resource](#student-skill-set-resource)
12. [Student Rank Resource](#student-rank-resource)
13. [Jobs Resource](#jobs-resource)

## How to Use API Token

1. Run signin with correct credentials. Copy the token from the response.
    - **POST URL**: `/api/signin`
    - **Method**: POST
    - **Request Body**:
    ```json
    {
        "email": "student@test.com",
        "password": "password"
    }
    ```
    - **Response**:
    ```json
    {
        "status": true,
        "message": "User Logged In Successfully",
        "token": "9|esq0XlNou9E2hRstqNhrRloXfa2CeDpzAUAWPOSa",
        "user": {
            "id": 2,
            "email": "student@test.com",
            ...
        }
    }
    ```
2. Under Authorization, choose Type Bearer Token, then paste the token.

## Authentication Resource

### Register Student

- **URL**: `/api/signup`
- **Method**: POST
- **Request Body**:
    ```json
    {
        "email": "joel@test.com",
        "name": "Joel Maique"
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "User Created Successfully",
        "token": "1|e4GFuaqWSeWKAg3ioPJpRgQL9ZwvOAg95rVKs0D7",
        "user": {
            "email": "joel@test.com",
            ...
        },
        "student": {
            "email": "joel@test.com",
            ...
        }
    }
    ```

### Login User

- **POST URL**: `/api/signin`
- **Method**: POST
- **Request Body**:
    ```json
    {
        "email": "joel@test.com",
        "password": "password"
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "User Logged In Successfully",
        "token": "2|cNJTVy5E8qkEUxJIcS4JrYpf4TEq7MNl27tIdugl",
        "user": {
            "id": 2,
            ...
        }
    }
    ```

## Registration Process

1. Create Account:
    - **POST URL**: `/api/signup`
    - **Method**: POST
    - **Request Body**:
    ```json
    {
        "email": "student15@test.com",
        "name": "Anna Parejo",
        "user_type_id": 3
    }
    ```
    - **Response**:
    ```json
    {
        "status": true,
        "message": "User Created Successfully",
        "token": "13|bGhConberDwDzS0KVwySwFep1wB2xA1DOomrKKBS",
        ...
    }
    ```

2. Log in to Mailtrap using the credentials and check the email.

3. Click on verify email, and it will give you a temporary password to login.

## User Resource

### Get All Users as Admin/Employers/Students

- **URL**: `/api/user`
- **Method**: GET
- **Query Params**: `?userType=3` (1- Admin, 2- Employers, 3-Students)
- **Response**:
    ```json
    {
        "status": true,
        "users": [
            {
                "id": 1,
                "email": "admin@worker.ca",
                ...
            },
            ...
        ]
    }
    ```

### Get a Specific User

- **URL**: `/api/user/{user_id}`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "user": {
            "id": 3,
            "email": "student2@test.com",
            ...
        }
    }
    ```

### Enable/Disable User

- **URL**: `/api/user/{user_id}`
- **Method**: PUT
- **Request Body**:
    ```json
    {
        "enable": 0
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "User is updated successfully",
        ...
    }
    ```

### Update Password

- **URL**: `/api/user/{user_id}`
- **Method**: PUT
- **Request Body**:
    ```json
    {
        "password": "test1234"
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "User is updated successfully",
        ...
    }
    ```

## College Resource

### Get All Colleges

- **URL**: `/api/college`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "colleges": [
            {
                "id": 1,
                "name": "Acsenda School of Management",
                ...
            },
            ...
        ]
    }
    ```

### Add a College

- **URL**: `/api/college`
- **Method**: POST
- **Request Body**:
    ```json
    {
        "name": "University of the Philippines"
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "College Created successfully!",
        ...
    }
    ```

### Get a Specific College

- **URL**: `/api/college/{college_id}`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "college": {
            "id": 2,
            "name": "Alexander College",
            ...
        }
    }
    ```

### Update College

- **URL**: `/api/college/{college_id}`
- **Method**: PUT
- **Request Body**:
    ```json
    {
        "name": "Alex 1234"
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "College Updated successfully!",
        ...
    }
    ```

### Delete College

- **URL**: `/api/college/{college_id}`
- **Method**: DELETE
- **Response**:
    ```json
    {
        "status": true,
        "message": "College Deleted successfully!"
    }
    ```

## Skillset Resource

### Get All Skill Sets

- **URL**: `/api/skillset`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "skillset": [
            {
                "id": 1,
                "name": "Database",
                ...
            },
            ...
        ]
    }
    ```

### Add a Skill Set

- **URL**: `/api/skillset`
- **Method**: POST
- **Request Body**:
    ```json
    {
        "name": "GitHub"
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Skillset Created successfully!",
        ...
    }
    ```

### Get a Specific Skill Set

- **URL**: `/api/skillset/{skillset_id}`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "skill": {
            "id": 20,
            ...
        }
    }
    ```

### Update Skill Set

- **URL**: `/api/skillset/{skillset_id}`
- **Method**: PUT
- **Request Body**:
    ```json
    {
        "name": "GitHub Repository"
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Skillset Updated successfully!",
        ...
    }
    ```

### Delete Skill Set

- **URL**: `/api/skillset/{skillset_id}`
- **Method**: DELETE
- **Response**:
    ```json
    {
        "status": true,
        "message": "Skillset Deleted successfully!"
    }
    ```

## Student Resource

### Get All Students

- **URL**: `/api/student`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "students": [
            {
                "id": 2,
                "email": "student15@test.com",
                ...
            },
            ...
        ]
    }
    ```

### Add a Student

- **URL**: `/api/student`
- **Method**: POST
- **Request Body**:
    ```json
    {
        "email": "student10@test.com",
        "user_id": 11,
        "college_id": 5,
        "user_type_id": 3
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Student Created successfully!",
        ...
    }
    ```

### Get a Specific Student

- **URL**: `/api/student/{student_id}`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "student": {
            "id": 3,
            "email": "student2@test.com",
            ...
        }
    }
    ```

### Update Student

- **URL**: `/api/student/{student_id}`
- **Method**: PUT
- **Request Body**:
    ```json
    {
        "email": "student2_update@test.com",
        "user_id": 11,
        "college_id": 5,
        "user_type_id": 3
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Student Updated successfully!",
        ...
    }
    ```

### Delete Student

- **URL**: `/api/student/{student_id}`
- **Method**: DELETE
- **Response**:
    ```json
    {
        "status": true,
        "message": "Student Deleted successfully!"
    }
    ```

## Company Resource

### Get All Companies

- **URL**: `/api/company`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "companies": [
            {
                "id": 1,
                "name": "TestCompany",
                ...
            },
            ...
        ]
    }
    ```

### Add a Company

- **URL**: `/api/company`
- **Method**: POST
- **Request Body**:
    ```json
    {
        "name": "TestCompany",
        "email": "test@company.com"
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Company Created successfully!",
        ...
    }
    ```

### Get a Specific Company

- **URL**: `/api/company/{company_id}`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "company": {
            "id": 1,
            ...
        }
    }
    ```

### Update Company

- **URL**: `/api/company/{company_id}`
- **Method**: PUT
- **Request Body**:
    ```json
    {
        "name": "UpdatedCompany",
        "email": "updated@company.com"
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Company Updated successfully!",
        ...
    }
    ```

### Delete Company

- **URL**: `/api/company/{company_id}`
- **Method**: DELETE
- **Response**:
    ```json
    {
        "status": true,
        "message": "Company Deleted successfully!"
    }
    ```

## Company Skills Need Resource

### Get All Company Skills Needs

- **URL**: `/api/company_skills_need`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "company_skills_need": [
            {
                "id": 1,
                "company_id": 2,
                "skillset_id": 3,
                ...
            },
            ...
        ]
    }
    ```

### Add a Company Skills Need

- **URL**: `/api/company_skills_need`
- **Method**: POST
- **Request Body**:
    ```json
    {
        "company_id": 2,
        "skillset_id": 3
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Company Skills Need Created successfully!",
        ...
    }
    ```

### Get a Specific Company Skills Need

- **URL**: `/api/company_skills_need/{company_skills_need_id}`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "company_skills_need": {
            "id": 1,
            ...
        }
    }
    ```

### Update Company Skills Need

- **URL**: `/api/company_skills_need/{company_skills_need_id}`
- **Method**: PUT
- **Request Body**:
    ```json
    {
        "company_id": 2,
        "skillset_id": 4
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Company Skills Need Updated successfully!",
        ...
    }
    ```

### Delete Company Skills Need

- **URL**: `/api/company_skills_need/{company_skills_need_id}`
- **Method**: DELETE
- **Response**:
    ```json
    {
        "status": true,
        "message": "Company Skills Need Deleted successfully!"
    }
    ```

## Student Skill Set Resource

### Get All Student Skill Sets

- **URL**: `/api/student_skill_set`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "student_skill_set": [
            {
                "id": 1,
                "student_id": 2,
                "skillset_id": 3,
                ...
            },
            ...
        ]
    }
    ```

### Add a Student Skill Set

- **URL**: `/api/student_skill_set`
- **Method**: POST
- **Request Body**:
    ```json
    {
        "student_id": 2,
        "skillset_id": 3
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Student Skill Set Created successfully!",
        ...
    }
    ```

### Get a Specific Student Skill Set

- **URL**: `/api/student_skill_set/{student_skill_set_id}`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "student_skill_set": {
            "id": 1,
            ...
        }
    }
    ```

### Update Student Skill Set

- **URL**: `/api/student_skill_set/{student_skill_set_id}`
- **Method**: PUT
- **Request Body**:
    ```json
    {
        "student_id": 2,
        "skillset_id": 4
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Student Skill Set Updated successfully!",
        ...
    }
    ```

### Delete Student Skill Set

- **URL**: `/api/student_skill_set/{student_skill_set_id}`
- **Method**: DELETE
- **Response**:
    ```json
    {
        "status": true,
        "message": "Student Skill Set Deleted successfully!"
    }
    ```

## Student Rank Resource

### Get All Student Ranks

- **URL**: `/api/student_rank`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "student_rank": [
            {
                "id": 1,
                "student_id": 2,
                "rank": 1,
                ...
            },
            ...
        ]
    }
    ```

### Add a Student Rank

- **URL**: `/api/student_rank`
- **Method**: POST
- **Request Body**:
    ```json
    {
        "student_id": 2,
        "rank": 1
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Student Rank Created successfully!",
        ...
    }
    ```

### Get a Specific Student Rank

- **URL**: `/api/student_rank/{student_rank_id}`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "student_rank": {
            "id": 1,
            ...
        }
    }
    ```

### Update Student Rank

- **URL**: `/api/student_rank/{student_rank_id}`
- **Method**: PUT
- **Request Body**:
    ```json
    {
        "student_id": 2,
        "rank": 2
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Student Rank Updated successfully!",
        ...
    }
    ```

### Delete Student Rank

- **URL**: `/api/student_rank/{student_rank_id}`
- **Method**: DELETE
- **Response**:
    ```json
    {
        "status": true,
        "message": "Student Rank Deleted successfully!"
    }
    ```

## Jobs Resource

### Get All Jobs

- **URL**: `/api/job`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "jobs": [
            {
                "id": 1,
                "title": "Software Developer",
                ...
            },
            ...
        ]
    }
    ```

### Add a Job

- **URL**: `/api/job`
- **Method**: POST
- **Request Body**:
    ```json
    {
        "title": "Software Developer",
        "description": "We are looking for a skilled software developer...",
        "company_id": 1,
        "skillset_id": 2,
        "student_rank_id": 3
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Job Created successfully!",
        ...
    }
    ```

### Get a Specific Job

- **URL**: `/api/job/{job_id}`
- **Method**: GET
- **Response**:
    ```json
    {
        "status": true,
        "job": {
            "id": 1,
            "title": "Software Developer",
            ...
        }
    }
    ```

### Update Job

- **URL**: `/api/job/{job_id}`
- **Method**: PUT
- **Request Body**:
    ```json
    {
        "title": "Senior Software Developer",
        "description": "We are looking for a skilled senior software developer...",
        "company_id": 1,
        "skillset_id": 2,
        "student_rank_id": 3
    }
    ```
- **Response**:
    ```json
    {
        "status": true,
        "message": "Job Updated successfully!",
        ...
    }
    ```

### Delete Job

- **URL**: `/api/job/{job_id}`
- **Method**: DELETE
- **Response**:
    ```json
    {
        "status": true,
        "message": "Job Deleted successfully!"
    }
    ```

## Conclusion

This README file provides the necessary information to get started with the Outreach Resource API. Follow the steps for each resource to perform CRUD operations as required. For any issues or further assistance, please contact the support team.
