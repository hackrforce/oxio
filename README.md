## IMEI Validator

[Live Demo](http://oxio.hackrforce.com)

### General
- IMEI validation checks in App\Classes\Imei
- Luhn Algorithm Checksum validation check in App\Classes\Checksum (extracted from main IMEI class to DRY up code)

### Installation & Run
1. Download repository from Github
2. Add .env file to project root - provided via email
3. Run `composer install` in project root
4. Run `php artisan serve` in project root (Unix systems)
5. In browser, navigate to local web address (e.g. http://127.0.0.1:8000)
6. Enter desired IMEI number(s) into form & submit
7. If valid, a results page will display the IMEI number parsed
8. If invalid, an error page will be displayed with issue flagged
   1. Validation requirement: string must not be empty
   2. Validation requirement: 15 digits in length -> Invalid length
   3. Validation requirement: numeric input -> Invalid type: non-numeric
   4. Validation requirement: Luhn algorithm checksum -> Invalid checksum
9. Run `php aritsan test` in project root to run automated tests
   1. Test cases can be found in: Tests\Feature\ImeiTest
      1. success - a successful form submission
      2. fail length - incorrect string length
      3. fail numeric - string is a non-numeric
      4. fail checksum - string fails Luhn checksum 
      5. fail empty - string is empty

### Programming Language / Framework / Library
- Created with a standard vanilla Laravel PHP application
- Running code from Unix system (built locally on Mac, deployed on Ubuntu)
- Used [Laravel Valet](https://laravel.com/docs/9.x/valet) for local development
    - PHP Version: 8.1
    - Database: N/A
    - Other services: N/A

### Usage
- Developers can utilize this app/library in several different ways:
  - On demand web tool to validate IMEI numbers
  - Predefined rules to confirm IMEI validity before usage
  - Code is extracted into two main classes for validation: IMEI & Checksum (Luhn Algorithm)
    - These two classes can be built upon further, extended, etc. for more complex operations, process, etc.

### Assumptions
- Desired tool should be built into web application
- Did not want applicant to add additional development time for initial build out of independent [Composer](https://packagist.org/) package and then integrate into web app
- Did not want applicant to implement [Form Request](https://laravel.com/docs/9.x/validation#form-request-validation) helpers for basic validation (string length, numeric)

### Future Improvements
- Extract IMEI and Checksum data further into independent PHP Composer package
- Add API wrapper functionality and JSON handling for possible microservice
- Protect tool(s) with some basic form of authentication
- Add SSL certificates to demo site (e.g. Let's Encrypt)
- Add standardized [Code Sniffing](https://github.com/nunomaduro/larastan), [Style Enforcement](https://github.com/FriendsOfPHP/PHP-CS-Fixer), and tests runners into automated Github Actions
