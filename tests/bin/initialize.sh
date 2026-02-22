#!/bin/bash
npx wp-env run tests-wordpress -- chmod -c ugo+w /var/www/html
npx wp-env run tests-cli -- wp rewrite structure '/%postname%/' --hard

# Disable PHP opcache so wp-config.php changes from wp config set are picked up immediately
npx wp-env run tests-wordpress -- bash -c "echo 'opcache.enable=0' > /usr/local/etc/php/conf.d/opcache-disable.ini && apache2ctl graceful"