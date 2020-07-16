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

8. Importuojam `https://drive.google.com/file/d/1jvFHnDGd2dnhAaHCl-_pkIKqcIzeoAcZ/view?usp=sharing` failą, kad nereiktu `kml:parse` valandą

9. Susitvarkom apache ar nginx ir hostą

10. Einam naršyklėje adresu `HOSTAS/admin/` ir susikuriam useri.
***


#####Naudingos komandos
***

```php artisan config:cache``` - pravalyti config cache

```npm run prod``` - subuildinti iš app.scss į app.css

```php artisan kml:parse``` - nuripinti duomenis į db iš `storage/maps/` .kml failų (nereik, jeigu importinama map_data.sql)

```php artisan kml:generate``` - generuoti žemėlapio .kml failą

