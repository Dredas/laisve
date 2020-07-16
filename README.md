##Laisvės partijos web

***

#####Po kapotu
***
Laravel 6.2 + backpack + backpack/permissionmanager
***

#####Pasileidimas
***
1. Nusiklonuoja repozitoriją `git clone git@github.com:Dredas/laisve.git`

2. Sukuriam naują duombazę

3. Pakopijuojam .env.example į .env ir supildom db duomenis.

4. Paleidžiam `composer install`

5. Paleidžiam `php artisan key:generate` 

6. Paleidžiam `php artisan migrate` 

7. Paleidžiam `php artisan db:seed`

8. Importuojam `storage/db/map_data.sql`

9. Susitvarkom apache ar nginx su hostais

10. Einam naršyklėje adresu `/admin/` ir susikuriam useri.
***


#####Naudingos komandos
***

```php artisan config:cache``` - pravalyti config cache

```npm run prod``` - subuildinti iš app.scss į app.css

```php artisan kml:parse``` - nuripinti duomenis į db iš .kml failo (nereik, jeigu importinama .sql)

```php artisan kml:generate``` - generuoti žemėlapio .kml failą

