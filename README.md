## Php Authentication with CAPTCHA


#### PhpAuth Features :rocket:
- Signup with CAPTCHA
- Login

#### _How to install_ **PhpAuth** :octocat:
- git clone this repository
- install these dependencies
    - PHP
    - Apache
    - MySql

#### __Usage__ :metal:
- Navigate to the repository
- Run index.php
    - Signup for an account or Log into an account

#### __Connecting to the database__ :+1:
- Create a _constants.php_ file in includes/
- Create your constants in this format
    - define("DB_SERVER", "your_server");
    - define("DB_USER", "your_user_name");
    - define("DB_PASSWORD", "your_password);
    - define("DB_NAME", "YourAppName_db");

#### __Getting Your CAPTCHA Public and Private Keys__ :+1:
- Register YourApp for Google's [reCAPTCHA](https://www.google.com/recaptcha/intro/)
- Modify _constants.php_ file in includes/
- Create your reCAPTCHA constants in this format
  - define("SITE_KEY", "your_reCAPTCHA_site_key");
  - define("SECRET_KEY", "your_reCAPTCHA_secret_key");
