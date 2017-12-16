# HBlog

Fork from [jcc/blog](https://github.com/jcc/blog)-1.3 and Thanks.

This blog built with `Laravel 5.*` and `Vuejs 2.*`, compared to origin blog, I try to make it simple.

## Change

- Make articles list style simple
- Add simple blog cover
- Show more functions in navigation bar and configurable
- Delete unused article subtitle
- Add about-me page


## Server Requirements

- PHP >= 7.0.0
- Node >= 6.x
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension

## Preview

![New Blog](https://raw.githubusercontent.com/hackbeex/p/master/hblog/demo1.jpg)

![New Blog](https://raw.githubusercontent.com/hackbeex/p/master/hblog/demo2.jpg)

![New Blog](https://raw.githubusercontent.com/hackbeex/p/master/hblog/demo3.jpg)

## Install

### 1. Clone the source code or create new project.

```shell
git https://github.com/hackbeex/hblog.git
```

### 2. Set the basic config

```shell
cp .env.example .env
```

Edit the `.env` file and set the `database` and other config for the system after you copy the `.env`.example file.

### 3. Install the extended package dependency.

Install the `Laravel` extended repositories: 

```shell
composer install
```

Install the `Vuejs` extended repositories: 

```shel
yarn   // recommend, In windows homestead run 'yarn --no-bin-links'

// OR

npm install   // In windows homestead run 'npm install --no-bin-links'
```

Compile the js code: 

```shel
npm run production   // recommend not a developer

// OR

npm run dev

// OR

npm run watch   // In homestead run 'npm run watch-poll'
```

### 3. Run the blog install command, the command will run the `migrate` command and generate test data.

```shell
php artisan blog:install
```

## License

The project is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).
