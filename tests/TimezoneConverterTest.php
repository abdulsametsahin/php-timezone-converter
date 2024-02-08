<?php
use PHPUnit\Framework\TestCase;

class TimezoneConverterTest extends TestCase
{
    private const TIZONES_FILE_PATH = __DIR__ . "/../data/timezones.json";
    private array $timezones = [];

    public function setUp(): void
    {
        $this->timezones = json_decode(file_get_contents(self::TIZONES_FILE_PATH), true);
    }

    public function testConvertFromOlsonToWindows()
    {
        $this->assertEquals('Eastern Standard Time', \Abdulsametsahin\TimezoneConverter\TimezoneConverter::fromOlson('America/New_York'));
    }

    public function testConvertFromWindowsToOlson()
    {
        $timezone = "Eastern Standard Time";
        $expected = [];

        foreach ($this->timezones as $olson => $windows) {
            if ($windows === $timezone) {
                $expected[] = $olson;
            }
        }

        $this->assertContains(\Abdulsametsahin\TimezoneConverter\TimezoneConverter::fromWindows($timezone), $expected);
    }
}