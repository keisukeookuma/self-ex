<?php
    require_once './conf/const.php';
    require_once './model/tool_model.php';
    require_once './model/opinion_model.php';

    $name = '';
    $message = '';
    if($_POST['opinion'] !== '' && $_POST['opinion']!==null){
        $name = $_POST['name'];
        $opinion = $_POST['opinion'];
        $dbh = get_db_connect();

        opinion_insert($dbh, $name, $opinion);

        $message = 'ご意見ありがとうございました！';
    }elseif($_POST['opinion'] == '' && $_POST['opinion']!==null){
        $message = 'ご意見が入力されていません';
    }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>リハビリメニュー作成</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="bg-light">
    <div class="container pt-3">
    <div class="card col-md-8 m-auto">
        <div class="card-body">
            <p class="text-center lead"><?php echo $message ?></p>
            <h3 class="text-center">ご意見箱</h3>
            <form action="" method="post">
                <div class="form-group">
                    <label for="name">お名前</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">ご意見入力</label>
                    <textarea class="form-control" name="opinion" cols="30" rows="5"></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">送信</button>
            </form>
            <a type="button" class="btn btn-secondary w-100 mt-2 text-light" href="index.php">戻る</a>
        </div>
    </div>
    </div>
</body>
</html>