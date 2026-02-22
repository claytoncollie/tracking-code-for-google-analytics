#!/bin/bash
npx wp-env run tests-wordpress -- chmod -c ugo+w /var/www/html
npx wp-env run tests-cli -- wp rewrite structure '/%postname%/' --hard

# Force PHP to check file timestamps on every request so wp-config.php
# changes from wp config set are picked up immediately by Cypress tests
npx wp-env run tests-wordpress -- bash -c "echo 'php_value opcache.revalidate_freq 0' >> /var/www/html/.htaccess"