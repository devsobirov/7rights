<?php

/**
 * Возвращает значение массива по ключу после проверки
 *
 * @param array $array
 * @param string $key
 * @param string $default
 * @return mixed|string
 */
function get_if_key_exists(array $array, string $key, $default = '') {
    if (!empty($array[$key])) {
        return $array[$key];
    }
    return $default;
}

/**
 * Возвращает число элементов массива после проверки типа
 *
 * @param array|mixed $countable
 * @param int $default = 0
 * @return int
 */
function count_if_array($countable, $default = 0) {
    if (is_array($countable)) return (int) count($countable);
    return (int) $default;
}
