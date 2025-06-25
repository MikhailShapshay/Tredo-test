<?php

namespace App\Support;

/**
 * Вспомогательный класс конвертации IP-адреса
 */
class IpConverter
{
    /**
     * Разбивает IP-адрес на 4 части и сдвигает каждую на соответствующее количество бит
     * @param string $ip
     * @return int
     */
    public static function ipToInt(string $ip): int {
        $parts = explode('.', $ip);

        if (count($parts) !== 4) {
            throw new \InvalidArgumentException("Не верный формат  IP-адреса !");
        }

        return ($parts[0] << 24) | ($parts[1] << 16) | ($parts[2] << 8) | $parts[3];
    }

    /**
     * Вытаскивает каждый октет с помощью сдвига вправо и маски 0xFF
     * @param int $int
     * @return string
     */
    public static function intToIp(int $int): string {
        $part1 = ($int >> 24) & 0xFF;
        $part2 = ($int >> 16) & 0xFF;
        $part3 = ($int >> 8) & 0xFF;
        $part4 = $int & 0xFF;

        return "{$part1}.{$part2}.{$part3}.{$part4}";
    }
}
