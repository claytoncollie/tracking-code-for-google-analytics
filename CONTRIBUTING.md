# Contributing

While the purpose of this plugin is to be very tightly scoped, issues and pull requests are welcome, but I do not guarantee that everything will be merged or support will be given.

1. Fork and clone the repository to your `wp-content/plugins/` directory.

```shell
git clone git@github.com:<your_name_here>/tracking-code-for-google-analytics.git
```

2. Navigate into the directory.

```shell
cd tracking-code-for-google-analytics
```

3. Install Composer dependencies.

```shell
composer install
```

4. Activate the plugin

```shell
wp plugin activate tracking-code-for-google-analytics
```

5. Check your pull request with the following commands.

```shell
composer run phpcbf
```

```shell
composer run phpcs
```

```shell
composer run phpstan
```

6. Update the README.md with this command

```shell
composer run readme
```
