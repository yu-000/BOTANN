<?php
// クライアントから送信されたデータを受け取る
$data = json_decode(file_get_contents('php://input'));

if ($data && isset($data->count)) {
    // カウンターの値をデータベースやファイルに保存する処理を実行する
    // ここではファイルに保存する例を示します
    $count = $data->count;
    file_put_contents('counter.txt', $count);
}
?>
