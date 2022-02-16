#/bin/bash

echo "Access at: http://127.0.0.1:8080/ - Remember to run me as root!";
chown -R www-data ./app/public/uploads; # Bí với volumes quá
chmod 777 ./app/public/uploads # Khong phai www-data thi la ai day?? -- FIXXX

docker-compose up;

