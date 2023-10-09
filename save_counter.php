<?php
// データベースに接続
$servername = "localhost";
$username = "ユーザー名";
$password = "パスワード";
$dbname = "データベース名";

$conn = new mysqli($servername, $username, $password, $dbname);

// 接続エラーの確認
if ($conn->connect_error) {
    die("接続エラー: " . $conn->connect_error);
}

// クライアントから送信されたデータを受け取る
$data = json_decode(file_get_contents('php://input'));

if ($data && isset($data->count)) {
    // カウンターの値をデータベースに保存する
    $count = $data->count;
    $sql = "UPDATE counter_table SET count = $count WHERE id = 1";

    if ($conn->query($sql) === TRUE) {
        echo "カウンターの値が更新されました";
    } else {
        echo "エラー: " . $sql . "<br>" . $conn->error;
    }
}

// データベース接続を閉じる
$conn->close();
?>
