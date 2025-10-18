# Define o nome do serviço da aplicação no docker-compose.yml
APP_SERVICE = app

# Comandos para Docker Compose
up:
	docker-compose up -d

down:
	docker-compose down

start: up

stop: down

restart: down up

# ...existing code...

# Regra para passar qualquer comando após 'artisan' como argumento
# artisan-%:
# 	docker-compose exec $(APP_SERVICE) php artisan $*

artisan:
	docker-compose exec $(APP_SERVICE) php artisan ${cmd}

artisan-%-%:
	docker-compose exec $(APP_SERVICE) php artisan $* $**

serve:
	docker-compose exec $(APP_SERVICE) php artisan serve

# ...existing code...

# Comandos do Artisan (executados dentro do container)
about:
	docker-compose exec $(APP_SERVICE) php artisan about

# artisan:
# 	docker-compose exec $(APP_SERVICE) php artisan

migrate:
	docker-compose exec $(APP_SERVICE) php artisan migrate

migration:
	docker-compose exec $(APP_SERVICE) php artisan make:migration

rule:
	docker-compose exec $(APP_SERVICE) php artisan make:rule

storage:
	docker-compose exec $(APP_SERVICE) php artisan storage:link

fresh:
	docker-compose exec $(APP_SERVICE) php artisan migrate:fresh $1

fresh-seed:
	docker-compose exec $(APP_SERVICE) php artisan migrate:fresh --seed

controller:
	docker-compose exec $(APP_SERVICE) php artisan make:controller $(NAME) $(ARGS)

policy:
	docker-compose exec $(APP_SERVICE) php artisan make:policy

request:
	docker-compose exec $(APP_SERVICE) php artisan make:request

model:
	docker-compose exec $(APP_SERVICE) php artisan make:model

view:
	docker-compose exec $(APP_SERVICE) php artisan make:view

component:
	docker-compose exec $(APP_SERVICE) php artisan make:component

seed:
	docker-compose exec $(APP_SERVICE) php artisan db:seed

seeder:
	docker-compose exec $(APP_SERVICE) php artisan make:seeder $(c)

rollback:
	docker-compose exec $(APP_SERVICE) php artisan migrate:rollback

cache-clear:
	docker-compose exec $(APP_SERVICE) php artisan cache:clear

config-cache:
	docker-compose exec $(APP_SERVICE) php artisan config:cache

route-list:
	docker-compose exec $(APP_SERVICE) php artisan route:list -v

factory:
	docker-compose exec $(APP_SERVICE) php artisan make:factory

# Comandos de Composer
composer:
	docker-compose exec $(APP_SERVICE) composer require ${require} --dev

composer-install:
	docker-compose exec $(APP_SERVICE) composer install

composer-update:
	docker-compose exec $(APP_SERVICE) composer update

# Comandos diversos
bash:
	docker-compose exec $(APP_SERVICE) bash

permissions:
	docker-compose exec $(APP_SERVICE) chown -R www-data:www-data storage bootstrap/cache
	docker-compose exec $(APP_SERVICE) chmod -R 775 storage bootstrap/cache

build:
	npm install && npm run build

help:
	@echo "Comandos disponíveis:"
	@echo ""
	@echo "  up             - Sobe os containers (docker-compose up -d)"
	@echo "  down           - Derruba os containers"
	@echo "  start          - Alias para 'up'"
	@echo "  stop           - Alias para 'down'"
	@echo "  restart        - Reinicia os containers"
	@echo ""
	@echo "  artisan <cmd>  - Executa um comando do Artisan (e.g., make:controller)"
	@echo "  migrate        - Roda as migrações"
	@echo "  seed           - Roda os seeders"
	@echo "  rollback       - Volta a última migração"
	@echo "  cache-clear    - Limpa o cache da aplicação"
	@echo "  config-cache   - Cria o cache de configuração"
	@echo "  route-list     - Lista todas as rotas"
	@echo "  make-controller     - Cria um novo controller"
	@echo "                           (Ex: make make-controller NAME=PostController)"
	@echo "                           (Ex: make make-controller NAME=PostController ARGS=\"--resource\")"
	@echo ""
	@echo "  composer-install - Roda 'composer install' dentro do container"
	@echo "  composer-update  - Roda 'composer update' dentro do container"
	@echo ""
	@echo "  bash           - Abre um terminal bash dentro do container 'app'"
	@echo "  permissions    - Corrige permissões de storage e cache"
	@echo ""

.PHONY: up down start stop restart artisan migrate seed rollback cache-clear config-cache route-list composer-install composer-update bash permissions help
