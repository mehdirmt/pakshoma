### اجرای پروژه
ایجاد ادمین و نوع فروش های پیش فرض

- rename `.env.example` to `.env
- set required configs (below)
- run command => `php artisan key:generate`
- run command => `php artisan db:seed`

### کانفیگ مورد نیاز
- DB_HOST={{ DB host }}
- DB_PORT=3306
- DB_DATABASE={{ DB name }}
- DB_USERNAME={{ DB username }}
- DB_PASSWORD={{ DB password }}


### اطلاعات ادمین
- username: `admin`
- password: `1234`


### عملیات های پیاده سازی شده
- admin login
- create product
- create plan
- add product to cart
- calculate sell price by selected plan
