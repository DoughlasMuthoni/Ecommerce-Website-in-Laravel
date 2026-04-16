# E-SHOP — Full-Featured Laravel 10 E-Commerce Platform

A complete, production-ready e-commerce web application built with Laravel 10. It includes a customer-facing storefront, a blog, a full admin dashboard, PayPal payments, social login, real-time notifications, and much more.

---

## Table of Contents

- [Features Overview](#features-overview)
- [Tech Stack](#tech-stack)
- [Requirements](#requirements)
- [Installation](#installation)
- [Environment Configuration](#environment-configuration)
- [Database Setup](#database-setup)
- [Running the Application](#running-the-application)
- [Project Structure](#project-structure)
- [Modules & Functionality](#modules--functionality)
  - [Storefront](#storefront)
  - [Shopping Cart & Checkout](#shopping-cart--checkout)
  - [User Accounts](#user-accounts)
  - [Blog](#blog)
  - [Admin Dashboard](#admin-dashboard)
  - [Payments](#payments)
  - [Notifications](#notifications)
- [Routes Reference](#routes-reference)
- [Database Schema](#database-schema)
- [User Roles](#user-roles)
- [UI / UX Notes](#ui--ux-notes)
- [Known Limitations & Local Dev Notes](#known-limitations--local-dev-notes)
- [License](#license)

---

## Features Overview

| Area | Capabilities |
|---|---|
| Products | CRUD, categories, sub-categories, brands, image gallery, stock tracking, price/discount |
| Shopping | Cart, wishlist, coupon codes, quantity controls, live cart dropdown |
| Checkout | Address form, shipping methods, order summary, PayPal payment |
| Orders | Order placement, status tracking, admin order management |
| Blog | Posts, categories, tags, comments, pagination |
| Reviews | Star-rated product reviews with moderation |
| Users | Registration, login, profile management, order history |
| Social Auth | Login via Google, Facebook, GitHub (Socialite) |
| Admin Panel | Full dashboard — products, orders, users, banners, coupons, settings, file manager |
| Notifications | Real-time admin notifications via Pusher |
| Newsletter | Subscription management via Spatie Laravel Newsletter |
| File Manager | In-admin file/image manager (UniSharp Laravel Filemanager) |
| PDF | Invoice/order PDF generation via DomPDF |
| SEO | Breadcrumbs, meta tags, clean URLs |

---

## Tech Stack

| Layer | Technology |
|---|---|
| Backend framework | Laravel 10 (PHP 8.1+) |
| Frontend CSS | Bootstrap 4, custom CSS (~5,000 lines) |
| Frontend JS | jQuery, Owl Carousel, Flex Slider, Slicknav, Isotope, AOS |
| Admin theme | SB Admin 2 |
| Database | MySQL |
| Authentication | Laravel Auth + Laravel Socialite |
| Payments | PayPal (srmklive/paypal v3) |
| Real-time | Pusher (pusher/pusher-php-server) |
| File Manager | UniSharp Laravel Filemanager 2.x |
| PDF | barryvdh/laravel-dompdf |
| Newsletter | spatie/laravel-newsletter |
| HTTP client | Guzzle 7 |
| Local dev | XAMPP (Apache + MySQL) |

---

## Requirements

- PHP >= 8.1 with extensions: `mbstring`, `openssl`, `pdo`, `pdo_mysql`, `tokenizer`, `xml`, `ctype`, `json`, `bcmath`, `fileinfo`
- MySQL >= 5.7 or MariaDB >= 10.3
- Composer >= 2.x
- Node.js >= 16.x & NPM (for asset compilation if needed)
- XAMPP (or any Apache/Nginx + MySQL stack)

---

## Installation

```bash
# 1. Clone or copy the project into your web root
#    e.g. C:\xampp\htdocs\  or  /var/www/html/

# 2. Install PHP dependencies
composer install

# 3. Copy the environment file
cp .env.example .env

# 4. Generate the application key
php artisan key:generate
```

---

## Environment Configuration

Open `.env` and update the following values:

```env
APP_NAME="E-SHOP"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost/Complete-Ecommerce-in-laravel-10-master/public

# Database
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=e-shop
DB_USERNAME=root
DB_PASSWORD=your_password

# Mail — use "log" driver for local dev (emails go to storage/logs/laravel.log)
MAIL_MAILER=log
MAIL_FROM_ADDRESS="noreply@eshop.com"
MAIL_FROM_NAME="${APP_NAME}"

# PayPal (sandbox credentials for testing)
PAYPAL_MODE=sandbox
PAYPAL_SANDBOX_CLIENT_ID=your_sandbox_client_id
PAYPAL_SANDBOX_CLIENT_SECRET=your_sandbox_client_secret

# Pusher (real-time notifications) — optional for local dev
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

# Social login — optional
# Create apps at console.developers.google.com / developers.facebook.com / github.com/settings/apps
GOOGLE_CLIENT_ID=
GOOGLE_CLIENT_SECRET=
FACEBOOK_CLIENT_ID=
FACEBOOK_CLIENT_SECRET=
GITHUB_CLIENT_ID=
GITHUB_CLIENT_SECRET=
```

> **Important:** For local development, keep `MAIL_MAILER=log`. If you set it to `smtp` you must also provide valid `MAIL_FROM_ADDRESS` (not `null`) or password-reset emails will throw a `LogicException`.

---

## Database Setup

```bash
# Create the database first (in phpMyAdmin or MySQL CLI)
# CREATE DATABASE `e-shop`;

# Run all migrations
php artisan migrate

# (Optional) Seed sample data
php artisan db:seed
```

---

## Running the Application

### With XAMPP

1. Place the project folder inside `C:\xampp\htdocs\`
2. Start **Apache** and **MySQL** from the XAMPP Control Panel
3. Visit: `http://localhost/Complete-Ecommerce-in-laravel-10-master/public`

### With Laravel's built-in server

```bash
php artisan serve
# Visit: http://127.0.0.1:8000
```

### Clear caches after any config change

```bash
php artisan config:clear
php artisan cache:clear
php artisan view:clear
php artisan route:clear
```

---

## Project Structure

```
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/                   # Login, register, password reset
│   │   │   ├── AdminController.php     # Admin dashboard & settings
│   │   │   ├── BannerController.php
│   │   │   ├── BrandController.php
│   │   │   ├── CartController.php
│   │   │   ├── CategoryController.php
│   │   │   ├── CouponController.php
│   │   │   ├── FrontendController.php  # Public storefront pages
│   │   │   ├── MessageController.php
│   │   │   ├── NotificationController.php
│   │   │   ├── OrderController.php
│   │   │   ├── PaypalController.php
│   │   │   ├── PostController.php
│   │   │   ├── PostCategoryController.php
│   │   │   ├── PostCommentController.php
│   │   │   ├── PostTagController.php
│   │   │   ├── ProductController.php
│   │   │   ├── ProductReviewController.php
│   │   │   ├── ShippingController.php
│   │   │   ├── UsersController.php
│   │   │   └── WishlistController.php
│   │   ├── Helpers.php                 # Global helper functions
│   │   └── Middleware/                 # Admin / User role guards
│   └── Models/                         # 18 Eloquent models (see schema below)
│
├── database/
│   ├── migrations/                     # 21 migration files
│   └── seeders/
│
├── public/
│   ├── backend/                        # Admin panel assets (SB Admin 2)
│   └── frontend/
│       ├── css/
│       │   ├── style.css               # Main storefront styles (~5,000 lines)
│       │   ├── responsive.css          # Responsive breakpoints
│       │   └── reset.css               # Typography & base reset
│       └── js/
│           ├── active.js               # Site-wide JS init (sticky header, etc.)
│           └── [plugin JS files]
│
├── resources/
│   └── views/
│       ├── auth/                       # Login, register, password reset views
│       ├── backend/                    # Admin panel views
│       │   ├── layouts/                # Admin header, sidebar, footer
│       │   ├── product/                # Product CRUD views
│       │   ├── order/                  # Order management views
│       │   ├── users/                  # User management views
│       │   └── [other admin modules]
│       ├── frontend/                   # Customer-facing views
│       │   ├── layouts/                # master.blade.php, header, footer
│       │   └── pages/                  # All storefront pages
│       └── user/                       # User profile panel views
│
├── routes/
│   └── web.php                         # All application routes
│
├── .env                                # Environment configuration
└── composer.json                       # PHP dependencies
```

---

## Modules & Functionality

### Storefront

| Page | URL | Description |
|---|---|---|
| Home | `/` | Hero slider, product tabs, banners, countdown deal, newsletter |
| Product Grid | `/product-grids` | Filterable grid with sidebar (category, brand, price, tag) |
| Product List | `/product-lists` | Same filters in list layout |
| Product Detail | `/product-detail/{slug}` | Gallery, tabs (description / reviews), add to cart |
| Category | `/product-category/{slug}` | Products filtered by category |
| Sub-category | `/product-sub-category/{slug}` | Products filtered by sub-category |
| Brand | `/product-brand/{slug}` | Products filtered by brand |
| Search | `/product-search` | Full-text product search results |
| About Us | `/about-us` | Static about page |
| Contact | `/contact` | Contact form (stores message in DB) |
| Blog | `/blog` | Blog post listing |
| Blog Detail | `/blog/{slug}` | Full post with comments |
| 404 | auto | Custom error page |

### Shopping Cart & Checkout

- **Add to cart** — works for both guests and logged-in users (session-based for guests)
- **Cart page** (`/cart`) — update quantities, remove items, apply coupon codes
- **Wishlist** — save products for later (requires login)
- **Checkout** (`/checkout`) — shipping address, select shipping method, order summary
- **PayPal payment** — redirects to PayPal sandbox/live; handles success and cancel callbacks
- **Order confirmation** — order stored in DB, admin notified

### User Accounts

| Action | URL |
|---|---|
| Register | `/register` |
| Login | `/login` |
| Social Login | `/auth/{provider}` (google / facebook / github) |
| Forgot Password | `/password/reset` |
| Profile | `/user/profile` |
| My Orders | `/user/orders` |
| Order Detail | `/user/order/detail/{id}` |
| My Reviews | `/user/reviews` |
| My Comments | `/user/comments` |
| Change Password | `/user/change-password` |

### Blog

- Posts belong to **post categories** and can have multiple **post tags**
- Visitors can leave **comments** on posts (stored with moderation)
- Blog supports pagination, category filter, tag filter, and a search sidebar widget

### Admin Dashboard

Access at `/admin/dashboard` (requires login with admin role).

| Module | What you can manage |
|---|---|
| Dashboard | Overview stats — orders, products, users, messages |
| Users | View all users, assign roles, disable accounts |
| Banners | Create/edit hero slider banners with images & links |
| Brands | Brand logo, name, slug |
| Categories | Hierarchical categories (parent + child) |
| Products | Full product CRUD — name, slug, price, sale price, stock, images, description, category, brand, status |
| Blog Posts | Create/edit posts with rich content, category, tags, featured image |
| Post Categories | Blog category management |
| Post Tags | Blog tag management |
| Comments | Moderate user comments on blog posts |
| Messages | View contact form submissions |
| Orders | View all orders, update order status, view details |
| Shipping | Create/edit shipping methods with rates |
| Coupons | Fixed or percentage discount codes, expiry dates |
| Notifications | Real-time order notifications (Pusher) |
| Settings | Site name, logo, address, phone, email, short description, social links |
| File Manager | Upload and manage images/files (UniSharp Filemanager) |
| Change Password | Admin password update |

### Payments

PayPal is integrated using `srmklive/paypal` v3.

- Configure sandbox or live mode via `PAYPAL_MODE` in `.env`
- Checkout redirects the user to PayPal
- On success: order is saved with `payment_method = paypal` and `payment_status = paid`
- On cancel: user is returned to the cart

For **cash on delivery**, the checkout form also supports it as an alternative (no redirect).

### Notifications

Admin receives a real-time browser notification each time a new order is placed, powered by **Pusher**. Configure your Pusher credentials in `.env` to enable this. It degrades gracefully if Pusher is not configured.

---

## Routes Reference

```
GET  /                          Home page
GET  /about-us                  About page
GET  /contact                   Contact page
POST /contact                   Submit contact form
GET  /product-grids             Product grid
GET  /product-lists             Product list
GET  /product-detail/{slug}     Product detail
GET  /product-category/{slug}   Category products
GET  /product-sub-category/{slug} Sub-category products
GET  /product-brand/{slug}      Brand products
GET  /product-search            Search results

GET  /cart                      Cart page
POST /cart/add/{id}             Add to cart
POST /cart/update/{id}          Update cart item
DELETE /cart/delete/{id}        Remove cart item
GET  /checkout                  Checkout page
POST /checkout                  Place order

GET  /wishlist                  Wishlist
POST /wishlist/add/{id}         Add to wishlist
DELETE /wishlist/delete/{id}    Remove from wishlist

GET  /blog                      Blog listing
GET  /blog/{slug}               Blog post detail
POST /post-comment              Submit blog comment

POST /product-review            Submit product review
POST /subscribe                 Newsletter subscribe
GET  /order-tracking            Order tracking

GET  /paypal/payment            Initiate PayPal payment
GET  /paypal/success            PayPal success callback
GET  /paypal/cancel             PayPal cancel callback

# Auth
GET  /login                     Login form
POST /login                     Authenticate
GET  /register                  Register form
POST /register                  Register user
POST /logout                    Logout
GET  /auth/{provider}           Social login redirect
GET  /auth/{provider}/callback  Social login callback
GET  /password/reset            Forgot password
POST /password/email            Send reset link
GET  /password/reset/{token}    Reset password form
POST /password/reset            Reset password

# User panel (auth required)
GET  /user/profile              User profile
POST /user/profile/update       Update profile
GET  /user/orders               My orders
GET  /user/order/detail/{id}    Order detail
GET  /user/reviews              My reviews
GET  /user/comments             My comments
GET  /user/change-password      Change password form
POST /user/change-password      Change password

# Admin panel (admin role required)
GET  /admin/dashboard           Admin home
...  /admin/users/*             User management
...  /admin/banners/*           Banner management
...  /admin/brands/*            Brand management
...  /admin/categories/*        Category management
...  /admin/products/*          Product management
...  /admin/posts/*             Blog management
...  /admin/orders/*            Order management
...  /admin/shippings/*         Shipping management
...  /admin/coupons/*           Coupon management
...  /admin/settings/*          Site settings
...  /admin/messages            Contact messages
...  /admin/notifications       Notifications
```

---

## Database Schema

| Table | Key Columns |
|---|---|
| `users` | id, name, email, password, role, photo |
| `banners` | id, title, slug, photo, condition, status |
| `brands` | id, title, slug, logo, status |
| `categories` | id, title, slug, parent_id, photo, status |
| `products` | id, title, slug, summary, description, photo, file, size, color, price, discount, stock, condition, category_id, brand_id, status |
| `orders` | id, user_id, first_name, last_name, email, address, phone, post_code, total_price, payment_method, payment_status, status, shipping_id, coupon_id |
| `carts` | id, user_id, product_id, price, quantity, amount |
| `wishlists` | id, user_id, product_id |
| `coupons` | id, code, type, value, status |
| `shippings` | id, type, price, status |
| `posts` | id, title, slug, quote, summary, description, photo, post_category_id, tags, status |
| `post_categories` | id, title, slug, status |
| `post_tags` | id, title, slug, status |
| `post_comments` | id, user_id, post_id, comment, status |
| `product_reviews` | id, user_id, product_id, rate, review, status |
| `messages` | id, name, email, phone, message |
| `notifications` | id, title, comment, seen |
| `settings` | id, short_des, logo, address, phone, email, facebook, twitter, instagram |

---

## User Roles

The application has two roles controlled by the `role` column on the `users` table:

| Role value | Access |
|---|---|
| `user` | Customer storefront, cart, checkout, profile panel |
| `admin` | All of the above + full admin dashboard |

Middleware files enforce this:
- `AdminMiddleware` — blocks non-admin users from `/admin/*` routes
- `UserMiddleware` — blocks unauthenticated users from `/user/*` routes

To create the first admin, register a user normally then update the `role` column directly in the database:
```sql
UPDATE users SET role = 'admin' WHERE email = 'your@email.com';
```

---

## UI / UX Notes

- **Design system** — CSS custom properties are defined in `:root` in `style.css` (`--clr-primary`, `--clr-dark`, `--shadow-*`, `--radius-*`, etc.)
- **Sticky header** — the header becomes fixed on scroll (JS in `active.js`, CSS class `.header.sticky` in `style.css`)
- **AOS animations** — scroll-triggered fade/slide animations via AOS.js (already wired in `footer.blade.php`)
- **No preloader** — the spinner preloader has been removed; pages load and display immediately
- **Responsive** — three breakpoints: tablet (768–991px), mobile (≤767px), small mobile (≤450px) in `responsive.css`
- **Admin theme** — SB Admin 2 with custom orange accent overrides matching the storefront brand colour (`#F7941D`)

---

## Known Limitations & Local Dev Notes

- **Email** — by default configured as `MAIL_MAILER=log`; all outgoing emails (password reset, order confirmation) are written to `storage/logs/laravel.log` instead of being sent. Switch to `smtp` and fill in SMTP credentials to send real emails.
- **PayPal** — sandbox mode by default. Create a PayPal developer account at [developer.paypal.com](https://developer.paypal.com) to get test credentials.
- **Pusher** — real-time notifications require a free Pusher account. Without credentials the notification bell still works but updates require a page refresh.
- **Social Login** — each provider requires an OAuth app to be created on that provider's developer portal. Leave the keys blank to disable social login buttons.
- **File Manager** — the UniSharp filemanager publishes its assets to `public/vendor/laravel-filemanager/`. If missing, run: `php artisan vendor:publish --tag=lfm_public`
- **Storage link** — if uploaded images are not showing, run: `php artisan storage:link`

---

## License

This project is open-sourced for educational and portfolio purposes.
Built on [Laravel](https://laravel.com) — MIT License.
