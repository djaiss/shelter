### License

MIT license.


### Principles

- Stick with Laravel's conventions as much as possible
- No dependencies if possible

### Stack

- We use Bun to manage front end dependencies.
- We use Composer to manage back end dependencies.
- Laravel + HTMX + TailwindCSS

### Architecture

- Views should be dumb and only display data from the backend
- Controllers should be thin and only handle requests
- Data that views need should be prepared by view models and called from the controllers

### Deploy

- `php artisan icons:clear` to clear heroicons cache
- `php artisan icons:cache` to cache all heroicons used
- `php artisan view:clear` to clear view cache
- `php artisan view:cache` to cache all views

### List of caches used in the app

- `team-users-{team-id}`
  - list of users in a team
- `user-channels-{user-id}`
  - list of channels for the user (used in the messages sidebar)
- `channel-{channel-id}-user-{user-id}`
  - profile page of a channel for the given user, listing all topics
