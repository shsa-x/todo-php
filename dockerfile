# Use the official PHP image
FROM php:8.1-apache

# Set the working directory
WORKDIR /var/www/html

# Copy the project files to the working directory
COPY . .

# Install PHP extensions if necessary (e.g., PDO, MySQL)
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Expose the default Apache port
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
