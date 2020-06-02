# Aidan David Ward - URL Shortener
* Allows users to shorten a URL
  * Can create custom URL shortcode
    * if no custom code is defined will pull random woord from this [list](https://www.eff.org/files/2016/09/08/eff_short_wordlist_2_0.txt "EFF Word list")
    * Will ensure all codes are unique so no two words from the EFF list will be used
  * Can add description (140 chars)
  * Can make a shortcode private so it will not show up in the recent URL's section
 * Shows the 10 most recently created shortcodes
   * Will exclude links that were created as private
   * Will show created at as time since text
   * Keeps a count of how many times the link has been visited
   
## Setup
* Copy paste .env.example and rename .env
* Create database
  * Enter database connection details and database name into .env
* Serve the project locally and whatever URL you enter into your browser to access the site should be entered into the .env file as APP_URL
    * You can use `php artisan serve` or the valet equivelant
    * I created an Apache virtualhost to the public directory of the project. `see virtualhost.example`
* In the root directory of the project run the following commands
  * `php artisan migrate`
  * `php artisan import:shortcodes`
    * this command takes the contents of any file in storage/app/import and imports them into the shortcode table. By default this folder contains ONLY THE EFF WORD LIST

