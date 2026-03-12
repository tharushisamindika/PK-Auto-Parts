# PK Auto Parts - E-commerce Website

A PHP-based e-commerce platform for auto parts with user authentication, shopping cart, admin panel, and order management.

## Features

### User Features
- User registration and login
- Browse products by category
- Add products to cart
- Checkout and place orders
- View order history
- Contact form for inquiries
- Submit feedback

### Admin Features
- Admin dashboard
- Product management (add, edit, delete)
- User management
- Order management
- View customer feedback and messages

## Technologies Used

- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML, CSS, JavaScript
- **CSS Framework**: Bootstrap
- **Icons**: Material Design Icons
- **Animations**: Animate.css

## Requirements

- PHP 7.4 or higher
- MySQL 5.7 or higher
- Web server (Apache/Nginx)
- Composer (optional, for dependency management)

## Installation

1. **Clone or Download the Project**
   ```
   Download and extract the project files to your web server's document root.
   ```

2. **Database Setup**
   - Create a MySQL database named `pkholdin_pk_auto_parts`
   - Import the SQL file `pkholdin_pk_auto_parts.sql` into your database
   - Update database connection settings in `db_connection.php` and `admin/db_connection.php`

3. **Configuration**
   - Ensure your web server is configured to serve PHP files
   - Make sure the `uploads/` directory is writable for product image uploads
   - Update any necessary paths or URLs in the configuration files

4. **Access the Application**
   - Open your browser and navigate to the project URL
   - Default admin credentials (if set up in the SQL file):
     - Username: admin
     - Password: admin123 (or as configured)

## Project Structure

```
├── index.php                 # Homepage
├── products.php              # Product listing
├── cart.php                  # Shopping cart
├── checkout.php              # Checkout process
├── orders.php                # Order history
├── login.php                 # User login
├── contact.php               # Contact form
├── about.php                 # About page
├── admin/                    # Admin panel
│   ├── admin_dashboard.php
│   ├── manage_products.php
│   ├── manage_users.php
│   ├── manage_orders.php
│   └── ...
├── assets/                   # Static assets
│   ├── css/
│   ├── js/
│   ├── images/
│   └── font/
├── login/                    # Login/registration
├── uploads/                  # Uploaded product images
├── db_connection.php         # Database connection
└── pkholdin_pk_auto_parts.sql # Database schema
```

## Usage

### For Users
1. Register an account or login
2. Browse products on the homepage or products page
3. Add items to cart
4. Proceed to checkout
5. View your orders in the orders section

### For Admins
1. Login to the admin panel at `/admin/`
2. Manage products, users, and orders
3. View feedback and messages

## Security Notes

- Change default admin passwords after installation
- Ensure proper file permissions
- Use HTTPS in production
- Regularly update PHP and MySQL versions

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Test thoroughly
5. Submit a pull request

## License

This project is for educational purposes. Please check local laws regarding e-commerce platforms.

## Support

For issues or questions, please check the error logs or contact the development team."# PK-Auto-Parts" 
