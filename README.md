Note for this group project:

Install Laravel 6.x
Install Composer
Install Nodejs 16.x
Install IDE VScode
DB XAMPP or MongoDB

composer global require laravel/installer
composer create-project --prefer-dist laravel/laravel UniversitySystemG27 "6.*"
cd UniversitySystemG27
composer require laravel/ui "^1.0" --dev
php artisan ui bootstrap --auth
npm install && npm run dev

After modify .env: php artisan config:cache
Migrate table to SQL: php artisan migrate
Delete all: php artisan migrate:rollback

Scrum User
Create new controller: php artisan make:controller RoleController
Create new model: php artisan make:model Models/Role -m

Create new controller: php artisan make:controller DepartmentController
Create new model: php artisan make:model Models/Department -m

Scrum Idea
Create new controller: php artisan make:controller CategoryController
Create new model: php artisan make:model Models/Category -m

Create new controller: php artisan make:controller SubmissionController
Create new model: php artisan make:model Models/Submission -m

Create new controller: php artisan make:controller FileController
Create new model: php artisan make:model Models/File -m

Create new controller: php artisan make:controller IdeaController
Create new model: php artisan make:model Models/Idea -m

Scrum Status
Create new controller: php artisan make:controller ViewController
Create new model: php artisan make:model Models/View -m

Create new controller: php artisan make:controller CommentController
Create new model: php artisan make:model Models/Comment -m

Create new controller: php artisan make:controller ReactionController
Create new model: php artisan make:model Models/Reaction -m

Check route: php artisan route:list
