# PHP Timezone Converter

The PHP Timezone Converter is a utility library for seamless conversion between Windows and IANA (Olson) timezones, enabling interoperability and enhancing date/time handling across different systems. Ideal for projects requiring compatibility with various timezone standards, this library simplifies the conversion process, making your application more versatile and user-friendly.

## Features

- Convert from IANA (Olson) timezone to Windows timezone and vice versa.
- Simple and easy-to-use interface.
- Supports a wide range of PHP versions (>=7.4).

## Installation

Use Composer to install the PHP Timezone Converter into your project:

```bash
composer require abdulsametsahin/php-timezone-converter
```

## Usage

The Timezone Converter can be used statically, offering straightforward methods for conversion:

### Convert from Olson to Windows Timezone

```php
use Abdulsametsahin\TimezoneConverter\TimezoneConverter;

$windowsTimezone = TimezoneConverter::toWindows('Europe/Istanbul');
echo $windowsTimezone; // Outputs corresponding Windows timezone
```

### Convert from Windows to Olson Timezone

```php
$olsonTimezone = TimezoneConverter::toOlson('Turkey Standard Time');
echo $olsonTimezone; // Outputs 'Europe/Istanbul'
```

### Handling Invalid Timezones

Both conversion methods throw an `InvalidArgumentException` if the provided timezone is invalid or not supported.

```php
try {
    $invalid = TimezoneConverter::toWindows('Invalid/Timezone');
} catch (\InvalidArgumentException $e) {
    echo $e->getMessage(); // Outputs 'Invalid timezone: Invalid/Timezone'
}
```

## Requirements

- PHP >= 7.4

## Contributing

Contributions are welcome! Please feel free to submit pull requests or open issues to improve the library or add more features.
