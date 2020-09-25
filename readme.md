# Task System

## V1

This is the base version.

|                  |              |                                            |
|------------------|--------------|--------------------------------------------|
| Authentication   | Registration | Route to task creation when success        |
|                  | Login        | Route to tasks list when success           |
| Task Management  | View         | `Pagination`                                |
|                  | Creation     | `Policies` to constraint user actions        |
|                  | Edit         |                                            |
|                  | Delete       | Celebration animation when tasks all clear |
| Input Validation | Client side  | HTML required attribute; Validation js     |
|                  | Server side  | `Form requests` with validation rules        |
| Error handling   | 404          | wrong url; approach non-existing task      |
|                  | 401          | violating policies                         |
|                  | UI           | Display error messages                     |
