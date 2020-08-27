<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>掲示板</title>
    <link rel="stylesheet" href="destyle.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
    mb_internal_encoding("utf8");
    $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","");
    $stmt = $pdo->query("select * from 4each_keijiban");
    /*
    while ($row = $stmt->fetch()){//foreach ($stmt as $row){
        echo $row['handlename'];
        echo $row['title'];
        echo $row['comments'];
    }
    */
?>
    <header>
        <div class="wrap">
            <h1 class="logo"><img src="4eachblog_logo.jpg" alt=""></h1>
        </div>
        <div class="g-navi">
            <ul>
                <li>トップ</li>
                <li>プロフィール</li>
                <li>4eachについて</li>
                <li>登録フォーム</li>
                <li>問い合わせ</li>
                <li>その他</li>
            </ul>
        </div>
    </header>
    <div class="main">
        <div class="left">
            <h2>プログラミングに役立つ掲示板</h2>
            <div id="form-wrap">
                <div id="form-box">
                    <h3>入力フォーム</h3>
                    <form method="post" action="insert.php">
                        <p>ハンドルネーム</p>
                        <input type="text" name="handlename" id="">
                        <p>タイトル</p>
                        <input type="text" name="title" id="">
                        <p>コメント</p>
                        <textarea name="comments" id="" cols="40" rows="10"></textarea>
                        <input type="submit" value="送信する">
                    </form>
                </div><!-- /#form-box -->
                <?php
                while ($row = $stmt->fetch()){
                    echo "<div class='comment-box'>";
                        echo "<h4>".$row['title']."</h4>";
                        echo "<p>".$row['comments']."</p>";
                        echo "<p class='handlename'>posted by".$row['handlename']."</p>";
                    echo "</div><!-- /.comment-box -->";
                }
                ?>
            </div><!-- /#form-wrap -->

        </div>
        <div class="right">
            <ul class="side-navi">
                <li><h5>人気の記事</h5>
                    <ul>
                        <li>PHPオススメ本</li>
                        <li>PHP Myadminの使い方</li>
                        <li>今人気のエディタ Top5</li>
                        <li>HTMLの基礎</li>
                    </ul>
                </li>
                <li><h5>オススメリンク</h5>
                    <ul>
                        <li>インターノウス株式会社</li>
                        <li>XAMPPのダウンロード</li>
                        <li>Eclipseのダウンロード</li>
                        <li>Bracketsのダウンロード</li>
                    </ul>
                </li>
                <li><h5>カテゴリ</h5>
                    <ul>
                        <li>HTML</li>
                        <li>PHP</li>
                        <li>MySQL</li>
                        <li>JavaScript</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
    <footer>
        <p class="copy">copyright &copy; internous | 4each blog which provides A to Z about programming.</p>
    </footer>
</body>
</html>