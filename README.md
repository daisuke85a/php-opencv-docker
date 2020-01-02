# 概要
phpでopencvを使い、画像から人の顔を抽出して切り出す。
docker環境で使える。

# 使い方
$git cloneする
$docker-compose up -d
$docker exec -it php-opencv-trim bash
$cd src
$composer install
$php detect_face_by_cascade_classifier_trim.php
resultsフォルダの中に、人の顔の画像が格納される
