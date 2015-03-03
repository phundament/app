wip

    mkdir -p web/assets-prod/js
    mkdir -p web/assets-prod/css
    touch web/assets-prod/js/backend-temp.js
    
    docker-compose run web ./yii asset config/assets.php config/assets-prod.php