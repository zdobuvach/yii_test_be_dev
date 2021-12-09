<?php

use yii\helpers\Url;

class AddUsersAndAlbumsCest {

    public function _before(AcceptanceTester $I) {
        
    }

    public function tryToTest(AcceptanceTester $I) {
        $I->amOnPage(Url::toRoute('/create/photos'));
        $I->see('Login', 'h1');

        $I->amGoingTo('try to login with correct credentials');
        $I->fillField('input[name="LoginForm[username]"]', 'admin');
        $I->fillField('input[name="LoginForm[password]"]', 'admin');
        $I->click('login-button');
        $I->wait(2); // wait for button to be clicked

        $I->expectTo('see user info');
        $I->see('Logout');
        
    }

}
