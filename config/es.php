<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Default Elasticsearch Connection Name
  |--------------------------------------------------------------------------
  |
  | Here you may specify which of the Elasticsearch connections below you wish
  | to use as your default connection for all work. Of course.
  |
  */

  'default' => env('ELASTIC_CONNECTION', 'default'),

  /*
  |--------------------------------------------------------------------------
  | Elasticsearch Connections
  |--------------------------------------------------------------------------
  |
  | Here are each of the Elasticsearch connections setup for your application.
  | Of course, examples of configuring each Elasticsearch platform.
  |
  */

  'connections' => [

    'default' => [

      'servers' => [

        [
          "host" => env("ELASTIC_HOST", "127.0.0.1"),
          "port" => env("ELASTIC_PORT", 9200),
          'user' => env('ELASTIC_USER', ''),
          'pass' => env('ELASTIC_PASS', ''),
          'scheme' => env('ELASTIC_SCHEME', 'http'),
        ]

      ],

      'index' => env('ELASTIC_INDEX', 'contents'),

      // Elasticsearch handlers
      // 'handler' => new MyCustomHandler(]
    ]
  ],
  'es' => [
    'connection' => env('ELASTIC_CONNECTION', 'default')
  ],
  /*
  |--------------------------------------------------------------------------
  | Elasticsearch Indices
  |--------------------------------------------------------------------------
  |
  | Here you can define your indices, with separate settings and mappings.
  | Edit settings and mappings and run 'php artisan es:index:update' to update
  | indices on elasticsearch server.
  |
  | 'my_index' is just for test. Replace it with a real index name.
  |
  */

  'indices' => [

    'contents' => [

      // "aliases" => [
      //   "contents"
      // ],

      'settings' => [
        "number_of_shards" => 5,
        "number_of_replicas" => 0,
        'analysis' =>
        [
          'filter' =>
          [
            'shingle' =>
            [
              'max_shingle_size' => '3',
              'min_shingle_size' => '2',
              'type' => 'shingle',
            ],
          ],
          'analyzer' =>
          [
            'reverse' =>
            [
              'filter' =>
              [
                0 => 'standard',
                1 => 'reverse',
              ],
              'type' => 'custom',
              'tokenizer' => 'standard',
            ],
            'trigram' =>
            [
              'filter' =>
              [
                0 => 'standard',
                1 => 'shingle',
              ],
              'type' => 'custom',
              'tokenizer' => 'standard',
            ],
          ],
        ],
      ],
      'mappings' => [
        'contents' =>
        [
          'properties' =>
          [
            'body' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
            'categories' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
            'created_at' =>
            [
              'type' => 'date',
              'format' => 'yyyy-MM-dd HH:mm:ss',
            ],
            'description' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
            'eligible_users' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
            'ended_at' =>
            [
              'type' => 'date',
              'format' => 'yyyy-MM-dd HH:mm:ss',
            ],
            'file_data' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
            'file_extensions' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
            'file_names' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
            'file_raw_names' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
            'hits' =>
            [
              'type' => 'long',
            ],
            'id' =>
            [
              'type' => 'long',
            ],
            'is_active' =>
            [
              'type' => 'boolean',
            ],
            'is_archived' =>
            [
              'type' => 'boolean',
            ],
            'is_expired' =>
            [
              'type' => 'boolean',
            ],
            'is_highlight' =>
            [
              'type' => 'boolean',
            ],
            'is_popular' =>
            [
              'type' => 'boolean',
            ],
            'is_popup' =>
            [
              'type' => 'boolean',
            ],
            'product_name' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
            'rating' =>
            [
              'type' => 'long',
            ],
            'special_notes' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
            'started_at' =>
            [
              'type' => 'date',
              'format' => 'yyyy-MM-dd HH:mm:ss',
            ],
            'status' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
            'suggest' =>
            [
              'type' => 'completion',
              'analyzer' => 'standard',
              'preserve_separators' => true,
              'preserve_position_increments' => true,
              'max_input_length' => 50,
            ],
            'tags' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
            'title' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'reverse' =>
                [
                  'type' => 'text',
                  'analyzer' => 'reverse',
                ],
                'trigram' =>
                [
                  'type' => 'text',
                  'analyzer' => 'trigram',
                ],
              ],
            ],
            'updated_at' =>
            [
              'type' => 'date',
              'format' => 'yyyy-MM-dd HH:mm:ss',
            ],
            'usp' =>
            [
              'type' => 'text',
              'fields' =>
              [
                'keyword' =>
                [
                  'type' => 'keyword',
                  'ignore_above' => 256,
                ],
              ],
            ],
          ],
        ],
      ],
    ]
  ]
];
