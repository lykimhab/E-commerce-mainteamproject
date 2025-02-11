<?php

if (!function_exists('showAlert')) {
    function showAlert($message, $type = 'success', $timer = 2000)
    {
        return '
        <script>
            Swal.fire({
                title: "' . $message . '",
                icon: "' . $type . '",
                timer: ' . $timer . ',
                timerProgressBar: true,
            });
        </script>
        ';
    }
}