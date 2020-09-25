# New feature

- Users can assign and edit the deadline for each task
- The tasks are ordered by the deadline in ascending order
- Overdue tasks' header now have a warning color to make them explicit

## How to upgrade from v1

Run the migration command to add a deadline column into the tasks table

```php
php artisan migrate
```
