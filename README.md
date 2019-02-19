# roles

The package allows to adding and deleting roles and assigning those roles to users.

# .env

To set some email as admin you have to put this vairable to your *.env* file. Use comma to set many emails.

    APP_ADMINS=example@email.com

# Publish

To publish all assets and configs you simple need to run 

    php artisan vendor:publish --provider="Shortcodes\Roles-package\RolesPackageProvider"