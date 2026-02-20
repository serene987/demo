# 1. Create phishing folder
sudo mkdir -p /var/www/html/phishing/logs

# 2. Copy style.css to phishing folder
sudo cp /var/www/html/demo/style.css /var/www/html/phishing/

# 3. Set proper permissions
sudo chmod 755 /var/www/html/demo/*.php
sudo chmod 755 /var/www/html/phishing/*.php
sudo chmod 755 /var/www/html/phishing/logs
sudo chmod 666 /var/www/html/phishing/logs/captured_creds.txt 2>/dev/null
sudo touch /var/www/html/phishing/logs/captured_creds.txt
sudo chmod 666 /var/www/html/phishing/logs/captured_creds.txt

# 4. Disable script.js (already done)
sudo mv /var/www/html/demo/script.js /var/www/html/demo/script.js.BACKUP 2>/dev/null

# 5. Restart Apache
sudo systemctl restart apache2