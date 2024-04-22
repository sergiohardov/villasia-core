<?php

namespace VillasiaCore\SYS;

class Helpers
{
    public static function log($data)
    {
        if (!file_exists(VILLASIACORE_LOGS_PATH)) return null;

        $timestamp = date("Y-m-d H:i:s");
        $log = $timestamp . " - " . print_r($data, true) . "\n";
        error_log($log, 3, VILLASIACORE_LOGS_PATH . "helpers_debug.log");
        return null;
    }

    public static function add_post_type($post_type, $labels = [], $params = [])
    {
        if (!post_type_exists($post_type)) {
            register_post_type($post_type, array_merge(['labels' => $labels], $params));
        }
    }

    public static function add_taxonomy($id, $types = [], $labels = [], $params = [])
    {
        if (!taxonomy_exists($id)) {
            register_taxonomy($id, $types, array_merge(['labels' => $labels], $params));
        }
    }
}
