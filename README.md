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
- Vercel serverless function (Node.js)

## Serverless API
https://queszania-api.vercel.app/api/status

## Architecture
- Frontend/Backend: PHP app in Docker container on Railway
- Database: Railway MySQL (managed)
- Serverless: Vercel Node.js function
- HTTPS: Automatic via Railway

## Features
- Admin: manage teachers, students, parents
- Teacher: create notes, quizzes, record marks
- Student: view notes, attempt quizzes
- Parent: monitor child performance
