tinker:
	php artisan tinker
dump:
	php artisan dump-server
test:
	php artisan test
migrate:
	php artisan migrate
fresh:
	php artisan migrate:fresh --seed
seed:
	php artisan db:seed
dacapo:
	php artisan dacapo --seed
rollback-test:
	php artisan migrate:fresh
	php artisan migrate:refresh
optimize:
	php artisan optimize
optimize-clear:
	php artisan optimize:clear
cache:
	composer dump-autoload -o
	@make optimize
	php artisan event:cache
	php artisan view:cache
cache-clear:
	composer clear-cache
	@make optimize-clear
	php artisan event:clear
ide-helper:
	php artisan clear-compiled
	php artisan ide-helper:generate
	php artisan ide-helper:meta
	php artisan ide-helper:models --write --reset
pint:
	./vendor/bin/pint -v
pint-test:
	./vendor/bin/pint -v --test
insights:
	php artisan insights --fix
insights-test:
	php artisan insights
