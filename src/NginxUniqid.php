<?php


class NginxUniqid
{
    public static function decodeCookie($cookie)
    {
        return strtoupper(join('', array_map(function ($e) {
            return str_pad(
                base_convert($e, 10, 16),
                8, '0', STR_PAD_LEFT
            );
        }, unpack('I4', base64_decode($cookie)))));
    }

    public static function encodeUid($hex)
    {
        return base64_encode(pack(
            'I4',
            base_convert(substr($hex, 0, 8), 16, 10),
            base_convert(substr($hex, 8, 8), 16, 10),
            base_convert(substr($hex, 16, 8), 16, 10),
            base_convert(substr($hex, 24, 8), 16, 10)
        ));
    }
}
