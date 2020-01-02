# 概要
phpでopencvを使う
docker環境で使える

# 使い方
$git cloneする
$docker-compose up -d
$docker exec -it php-opencv bash
$cd src
$php detect_face_by_dnn_ssd.php
resultフォルダができて、顔画像が赤枠でくくられた画像が格納される
