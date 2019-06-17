<?php

class LoginFormCest
{
    public function _before(\FunctionalTester $I)
    {
        $I->amOnRoute('login');
    }

    public function openLoginPage(\FunctionalTester $I)
    {
        $I->wantTo('Получить форму входа');
        $I->see('Вход', 'button');
    }

    public function internalLoginAsAdmin(\FunctionalTester $I)
    {
        $I->wantTo('Осуществить внутреннюю авторизацию без ввода данных');
        $admin = \app\models\Identity::findByUsername('admin');
        $I->amLoggedInAs($admin);
        $I->amOnPage('/');
        $I->seeElement('a', ['title' => 'Выход']);
    }

    public function loginWithEmptyCredentials(\FunctionalTester $I)
    {
        $I->wantTo('Запрет авторизации с пустыми данными');
        $I->submitForm('form[action="/login"]', []);
        $I->expectTo('Ошибки ввода данных');
        $I->see('Необходимо заполнить «Логин»');
        $I->see('Необходимо заполнить «Пароль»');
    }

    public function loginSuccessfully(\FunctionalTester $I)
    {
        $I->wantTo('Успешная авторизация с вводом данных');
        $I->submitForm('form[action="/login"]', [
            'LoginForm[username]' => 'admin',
            'LoginForm[password]' => 'iddqdidkfa',
        ]);
        $I->amOnPage('/');
    }

    public function logoutSuccessfully(\FunctionalTester $I)
    {
        $I->wantTo('Успешный выход');
        $admin = \app\models\Identity::findByUsername('admin');
        $I->amLoggedInAs($admin);
        $I->amOnPage('/');
        $I->seeElement('a', ['title' => 'Выход']);
        $I->click('a[title="Выход"]');
        $I->seeElement('form[action="/login"]');
    }
}
