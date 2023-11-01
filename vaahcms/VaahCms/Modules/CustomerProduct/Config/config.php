<?php

return [
    "name"=> "CustomerProduct",
    "title"=> "CustomerProduct Role And Access",
    "slug"=> "customerproduct",
    "thumbnail"=> "https://img.site/p/300/160",
    "is_dev" => env('MODULE_CUSTOMERPRODUCT_ENV')?true:false,
    "excerpt"=> "CustomerProduct Role And Access for Admin",
    "description"=> "CustomerProduct Role And Access for Admin",
    "download_link"=> "",
    "author_name"=> "vaah",
    "author_website"=> "https://vaah.dev",
    "version"=> "0.0.1",
    "is_migratable"=> true,
    "is_sample_data_available"=> false,
    "db_table_prefix"=> "vh_customerproduct_",
    "providers"=> [
        "\\VaahCms\\Modules\\CustomerProduct\\Providers\\CustomerProductServiceProvider"
    ],
    "aside-menu-order"=> null
];
