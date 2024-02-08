<?php

namespace Abdulsametsahin\TimezoneConverter;

class TimezoneConverter
{
    private const TIZONES_FILE_PATH = __DIR__ . "/../data/timezones.json";

    public static function fromOlson(string $timezone): string
    {
        $timezones = self::getTimezones();

        if (isset($timezones[$timezone])) {
            return $timezones[$timezone];
        }

        throw new \InvalidArgumentException("Invalid timezone: $timezone");
    }

    public static function fromWindows(string $timezone): string
    {
        $timezones = self::getTimezones();

        $flippedTimezones = array_flip($timezones);

        if (isset($flippedTimezones[$timezone])) {
            return $flippedTimezones[$timezone];
        }

        throw new \InvalidArgumentException("Invalid timezone: $timezone");
    }

    public static function toOlson(string $timezone): string
    {
        return self::fromWindows($timezone);
    }

    public static function toWindows(string $timezone): string
    {
        return self::fromOlson($timezone);
    }

    private static function getTimezones(): array
    {
        return json_decode(file_get_contents(self::TIZONES_FILE_PATH), true);
    }
}