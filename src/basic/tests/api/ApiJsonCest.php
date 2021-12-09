<?php

class ApiJsonCest {

    public $responseJsonKeyTypeValue = [
        'users' => [
            'id' => 'integer',
            'first_name' => 'string',
            'last_name' => 'string',
        ],
        'users/118' => [
            'id' => 'integer',
            'first_name' => 'string',
            'last_name' => 'string',
            'albums' => 'array',
        ],
        'photos/1106' => [
            'id' => 'integer',
            'album_id' => 'integer',
            'title' => 'string',
            'reg_date' => 'string',
            'URL' => 'string',
        ],
        'photos' => [
            'id' => 'integer',
            'album_id' => 'integer',
            'title' => 'string',
            'reg_date' => 'string',
            'URL' => 'string',
        ],
        'albums' => [
            'id' => 'integer',
            'title' => 'string',
        ],
        'albums/304' => [
            'id' => 'integer',
            'first_name' => 'string',
            'last_name' => 'string',
            'photos' => 'array',
        ]
    ];

    // tests
    public function tryToTest(ApiTester $I) {
        foreach ($this->responseJsonKeyTypeValue as $key => $value) {
            $I->sendGet($key);
            $I->seeResponseCodeIs(\Codeception\Util\HttpCode::OK); // 200
            $I->seeResponseIsJson();
            $I->seeResponseMatchesJsonType($value);
        }
    }

}
