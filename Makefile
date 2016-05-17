server:
	php -S 0.0.0.0:8000 -t public
test:
	phpunit -c backend/phpunit.xml