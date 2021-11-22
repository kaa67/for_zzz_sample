# for_zzz_sample
Пример запуска проекта под имитатором env_hostland

## Подготовка кода
1. Перейти в папку www
  __`cd ~/www`__
2. Склонировать имитатор командой
  __`git clone https://github.com/JackRabbit911/env_hostland for_zzz_sample`__
3. Перейти в папку for_zzz_sample
  __`cd for_zzz_sample`__
4. Создать (требование имитатора) папку site.zone
  __`mkdir site.zone`__
5. Войти в неё
  __`cd site.zone`__
6. Создать (требование имитатора) папку htdocs
  __`mkdir htdocs`__
7. Войти в неё
  __`cd htdocs`__
8. Теперь клонируем сюда этот реп
  __`git clone https://github.com/kaa67/for_zzz_sample www`__
9. Добавляем права на запись в папку для кеша
  __`chmod -R 777 www/writable`__

Итог:
требование имитатора выполнено, сформирован корень сайта:
  __`site.zone/htdocs/www`__
В корне находятся скрипты примера
Требование ядра семпла (права на запись в указанную папку) выполнено

## Подготовка СУБД
1. Перейти в папку www
  __`cd ~/www/for_zzz_sample`__
2. Поднять имитатор
  __`docker-compose up`__
3. Перейти по адресу
  http://localhost/adminer481.php
  Войти:
    Сервер: __`mysql`__
    username: __`root`__
    password: __`secret`__
4. Создать базу __`test2`__
5. Импортировать дамп (найти в корневой папке сайта) __`dump.sql`__

## Проверить работу системы
1. Перейти по адресу http://localhost
2. Попробовать залогиниться (kolosoft@gmail.com/123456), разлогиниться
