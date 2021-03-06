<?php

if (!function_exists('array_order_by')) {
    function array_order_by(array $data, ...$args): array
    {
        foreach ($args as $n => $field) {
            if (is_string($field)) {
                $tmp = [];
                foreach ($data as $key => $row) {
                    $tmp[$key] = $row[$field];
                }
                $args[$n] = $tmp;
                unset($tmp);
            }
        }
        
        $args[] = &$data;
        call_user_func_array('array_multisort', $args);
        return array_pop($args);
    }
}
