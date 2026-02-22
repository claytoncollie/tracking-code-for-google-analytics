#!/bin/bash
npx wp-env run tests-wordpress -- chmod -c ugo+w /var/www/html
npx wp-env run tests-cli -- wp rewrite structure '/%postname%/' --hard
