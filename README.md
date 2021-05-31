<p align="center"><img src="public/tiger.svg" width="200"></p>

# TravelMaker

Travel Maker is a [Laravel](https://laravel.com") Based Web Application that is custom built to provide a sturdy backbone for any frontend designs. The backend provides various functionalities for adding, editing trip packages, itineraries, categories, homepage slider pictures, trip galleries, user roles and so on. Currently following are how it is working.

## Developer's Note
- [IDE HELPER](https://github.com/barryvdh/laravel-ide-helper/) configuration clearly helps to add docfile as well as discover native methods coming with the class.

```bash
#install the packages
composer require --dev barryvdh/laravel-ide-helper
```

- Include the class in ```providers``` array in ```config/app.php```
```bash
Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class,
```

- Running the main codes
```bash
##ide helper
php artisan ide-helper:generate

### ide-helper for models
php artisan ide-helper:models

##phpstorm meta file (only works in php storm, still)
php artisan ide-helper:meta
```

<br><br>
# Features and Capabilities

Features and capabilities classified with Backend, SEO and Frontend work



## Backend
- Admin Login and User Registration
- Enter, update, edit or delete trips
- CRUD categories
- CRUD Tags
- CRUD Itineraries
- Extract data from Itineraries to show visual information in graphs, e.g - trip altitude graph, daily distance graph, meals data.
- Add sections to each trips: Overview, Itineraries, Highlights of Trip, Categories.
- Add trip booking section to open and accept bookings set by website owner.
- Classify user roles: Superadmin, Content Writer, SEO Analyst.


## SEO
- Meta Descriptions and Title for each page, trips, categories
- Facebook Open Graph Implementation.
- Schema Markup
- Adding SEO Keyword to show realtime analysis of content.
- Generate Sitemap.
- Option to index / noindex pages
- Local SEO


## Frontend
- Display backend data properly with various pages
- User Experience Design and Implementation.




## Developer Documentation Links

[Laravel documentation](https://laravel.com/docs) for official explanation of code and conducts.
[Laracasts](https://laracasts.com) for comprehensive video library.



## Important Links

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).




### To do

- **Fire up Apache and Mysql with Laragon**
- **Enter [Travel Maker Dev Website](travelmaker.test) (Works only in localhost)**
- **Open the root folder with VS Code or such**




### Developer

Find Me on [Github](https://github.com/deepyes02)