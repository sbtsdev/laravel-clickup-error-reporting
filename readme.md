# LaravelClickupErrorReports

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

Package for sending error reports from laravel to Clickup. Take a look at [contributing.md](contributing.md) to see a to do list.

## Installation

Via Composer

``` bash
$ composer require sbtsdev/laravelclickuperrorreports
```

## Usage

Set up the following in your .env
```
//get this from "Apps" under the user profile in clickup
CLICKUP_API_PK=

//list id pulled from clickup
//to pull the list id use dev tools in a browser
// and get the value of the data-SUBcategory attribute from the div for a task in that task list
CLICKUP_LIST_ID=

//clickup Id, I pulled it from the first number in the profile image uri
CLICKUP_ASSIGNEE_ID=

//if clickup rest call fails then email this address
CLICKUP_BACKUP_EMAIL=

//set to true if you want errors sent in a dev environment
CLICKUP_SEND_DEV_ERRORS=
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash

```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email webdesign@sbts.edu instead of using the issue tracker.

## Credits

- [sbtsdev][link-author]
- [All Contributors][link-contributors]

## License

This software is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

[ico-version]: https://img.shields.io/packagist/v/sbtsdev/laravelclickuperrorreports.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/sbtsdev/laravelclickuperrorreports.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/sbtsdev/laravelclickuperrorreports/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/sbtsdev/laravelclickuperrorreports
[link-downloads]: https://packagist.org/packages/sbtsdev/laravelclickuperrorreports
[link-travis]: https://travis-ci.org/sbtsdev/laravelclickuperrorreports
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/sbtsdev
[link-contributors]: ../../contributors]
