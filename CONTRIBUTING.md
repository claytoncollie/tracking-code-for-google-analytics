# Contributing

While the purpose of this plugin is to be very tightly scoped, issues and pull requests are welcome, but I do not guarantee that everything will be merged or support will be given.

1. Clone the repository to your `wp-content/plugins/` directory.

`git clone git@github.com:claytoncollie/tracking-code-for-google-analytics.git`

2. Navigate into the directory.

`cd tracking-code-for-google-analytics`

3. Install Composer dependencies.

`composer install`

4. Check your pull request with the following commands.

`composer run phpcbf`

`composer run phpcs`

`composer run phpstan`
