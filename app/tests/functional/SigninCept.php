<?php 

$I = new FunctionalTester($scenario);
$I->am('a guest');
$I->wantTo('sign up for an account');

$I->amOnPage('/');
$I->click('Sign Up');
$I->seeCurrentUrlEquals('/register');

$I->fillField('E-Mail', 'janedoe@gmail.com');
$I->fillField('Password', 'secret');
$I->fillField('Password Confirmation', 'secret');
$I->click('Sign Up', 'input[type="submit"]');

$I->seeCurrentUrlEquals('/login');
$I->see("Thanks for registering!");

$I->seeRecord('users', [
    'email' => 'janedoe@gmail.com'
]);

$I->fillField('email', 'janedoe@gmail.com');
$I->fillField('password', 'secret');
$I->click('Login', 'input[type="submit"]');
$I->see('Manage Courses');
