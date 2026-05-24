# Questzania — School Management System

Live App: https://queszania-production.up.railway.app

## Login Credentials
| Role | Email | Password |
|------|-------|----------|
| Admin | admin@gmail.com | admin |
| Teacher | raja@gmail.com | 9801230192 |
| Student | dziya.zaman@gmail.com | 123 |
| Parent | terei@gmail.com | 123123 |

## Tech Stack
- PHP 8.2 + Apache (Docker on Railway)
- MySQL 9.4 (Railway managed database)
- Vercel Serverless Function (Node.js)

## Serverless API
https://queszania-api.vercel.app/api/status

## Architecture
- Frontend/Backend: PHP app in Docker container on Railway
- Database: Railway MySQL (private network, managed)
- Serverless: Vercel Node.js function
- HTTPS: Automatic SSL via Railway edge network
- CI/CD: Auto-deploy on git push to GitHub

## Features
- Admin: manage teachers, students, parents, classes
- Teacher: create notes, quizzes, record marks
- Student: view notes, attempt quizzes, view marks
- Parent: monitor child performance and notes

## Database
6 tables: user, profile, kelas, quiz, markah, nota

## Course
CIT22103 Cloud Computing — Management & Science University
