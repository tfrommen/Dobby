# Dobby

[![Version](https://img.shields.io/packagist/v/tfrommen/dobby.svg)](https://packagist.org/packages/tfrommen/dobby)
[![Status](https://img.shields.io/badge/status-active-brightgreen.svg)](https://github.com/tfrommen/Dobby)
[![Downloads](https://img.shields.io/packagist/dt/tfrommen/dobby.svg)](https://packagist.org/packages/tfrommen/dobby)
[![License](https://img.shields.io/packagist/l/tfrommen/dobby.svg)](https://packagist.org/packages/tfrommen/dobby)

> Dobby, the friendly Admin Elf, takes care of all your (unwanted) admin notices.

## Installation

Install with [Composer](https://getcomposer.org):

```sh
$ composer require tfrommen/dobby
```

Or:

1. [Download ZIP](https://github.com/tfrommen/Dobby/releases).
1. Upload contents to the `/wp-content/plugins/` directory on your web server.
1. Activate the plugin through the _Plugins_ menu in WordPress.
1. See only a single admin notice, if at all.

### Requirements

This plugin **requires PHP 5.4** or higher, but you really **should be using PHP 7** or higher, as we all know.

## Usage

Dobby captures everything that gets printed on one of the admin notice hooks (i.e., `network_admin_notices`, `user_admin_notices`, `admin_notices` and `all_admin_notices`), and hides it, for now.
In case Dobby did capture anything, he will inform you (yes, via an admin notice).

![Dobby in Action](assets/images/dobby.gif)

### Filters

In order to customize certain aspects of the plugin, it provides you with several filters.
For each of these, a short description as well as a code example on how to alter the default behavior is given below.
Just put the according code snippet in your theme's `functions.php` file or your _customization_ plugin, or to some other appropriate place.

#### `\tfrommen\Dobby\FILTER_THRESHOLD` (`dobby.threshold`)

This filter lets you customize the minimum number of admin notices required for Dobby to take action.
The default value is `1`.

**Usage Example:**

```php
<?php
/**
 * Filters the minimum number of admin notices required for Dobby to take action.
 *
 * @param int $threshold Required minimum number of admin notices.
 */
add_filter( \tfrommen\Dobby\FILTER_THRESHOLD, function () {

	return 3;
} );
```

## License

Copyright (c) 2017 Thorsten Frommen

This code is licensed under the [MIT License](LICENSE).
