# Use official PHP + Apache image
FROM php:8.1-apache

# Copy project files into Apache root
COPY . /var/www/html/

# Expose port 10000 (Render default)
EXPOSE 10000
