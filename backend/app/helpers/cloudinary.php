<?php

use Cloudinary\Configuration\Configuration;

Configuration::instance([
    "cloud" => [
        "cloud_name" => "rabhiconstruct",
        "api_key" => CLOUDINARY_API_KEY,
        "api_secret" => CLOUDINARY_API_SECRET,
        "url" => [
            "secret" => true
        ]
    ]
]);



function cloudinarySign($data = []): array
{
    $timestamp = strtotime("now");
    $signature = \Cloudinary\Api\ApiUtils::signParameters([...$data, "timestamp" => $timestamp], CLOUDINARY_API_SECRET);
    return ["signature" => $signature, "timestamp" => $timestamp];
}