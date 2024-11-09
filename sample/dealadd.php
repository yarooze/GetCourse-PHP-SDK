#!/usr/bin/env php
<?php
require_once __DIR__.'/../sample/bootstrap.php';

// Если вы не используете composer, то можно использовать include
// require_once __DIR__.'/../lib/GetCourse/autoload.php';

$deal = new \GetCourse\Deal();

// Замените на ваш аккаунт
$deal::setAccountName('getcourse_host');
// Замените токен на сгенерированный вашим аккаунтом (http://{your_account}.getcourse.ru/saas/account/api)
$deal::setAccessToken('secret_key');

try {
	$result = $deal
		->setEmail('vasiliy.pupkin@getcourse.ru')
		->setFirstName('Василий')
		->setLastName('Пупкин')
		->setUserAddField('Почтовый адрес', 'New Васюки')
		->setOverwrite()
		->setSessionReferer('http://getcourse.ru')
		->setProductTitle('Как заработать первый доллар')
		->setDealNumber('30046')
		->setDealCost(64.24)
		->setDealAddField('Таможенная стоимость', '10')
		->apiCall($action = 'add');
} catch (Exception $e) {
	echo $e->getMessage();
}

print_r( $result );
