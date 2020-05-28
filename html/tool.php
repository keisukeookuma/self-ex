<?php
require_once './conf/const.php';
require_once './model/tool_model.php';
$sql      = '';
$sqltype  = '';
$imgdir   = './img/';
$error    = [];
$result   = [];
$data     = [];

if(isset($_POST['sqltype'])===TRUE) {
    $sqltype = $_POST['sqltype'];
}

if($sqltype === 'new_product'){
    $item_name        = '';
    $creator          = '';
    $caption          = '';
    $template_name    = '';
    $status           = '';
    $new_img_filename = '';
    $category         = [];
    
    $item_name     = $_POST['item_name'];
    $creator       = $_POST['creator'];
    $caption       = $_POST['caption'];
    $category      = $_POST['category'];
    $template_name = $_POST['template_name'];
    $status        = $_POST['status'];
    
    if(mb_strlen(check_error_name($item_name))!==0){
        $error[] = check_error_name($item_name);
    }
    
    if(mb_strlen(check_error_name($creator))!==0){
        $error[] = check_error_name($creator);
    }
    
    if(mb_strlen(check_error_caption($caption))!==0){
        $error[] = check_error_name($caption);
    }

    foreach($category as $value){
        if(mb_strlen(check_error_name($value))!==0){
            $error[] = check_error_name($value);
        }
    }

    if(mb_strlen(check_error_status($status))!==0){
        $error[] = check_error_status($status);
    }
    
    if (is_uploaded_file($_FILES['file']['tmp_name']) === TRUE) {
        $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if ($extension === 'jpeg' || $extension === 'png' || $extension === 'jpg' 
            || $extension === 'JPEG' || $extension === 'PNG' || $extension === 'JPG') {
          $new_img_filename = sha1(uniqid(mt_rand(), true)). '.' . $extension;
          if (is_file($imgdir . $new_img_filename) !== TRUE) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $imgdir . $new_img_filename) !== TRUE) {
                $error[] = 'ファイルアップロードに失敗しました';
            }
          } else {
            $error[] = 'ファイルアップロードに失敗しました。再度お試しください。';
          }
        } else {
          $error[] = 'ファイル形式が異なります。画像ファイルはJPEGかPNGのみ利用可能です。';
        }
      } else {
        $error[] = 'ファイルを選択してください';
    }
    
}else if($sqltype === 'detail_change') {
    $img       = '';
    $item_id   = '';
    $item_name = '';
    $status    = '';
    $creator   = '';
    $caption   = '';
    
    $img       = $_POST['img'];
    $item_id   = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $status    = $_POST['status'];
    $creator   = $_POST['creator'];
    $caption   = $_POST['caption'];

    if(mb_strlen(check_error_name($item_name))!==0){
        $error[] = check_error_name($item_name);
    }
    
    if(mb_strlen(check_error_name($creator))!==0){
        $error[] = check_error_name($creator);
    }
    
    if(mb_strlen(check_error_caption($caption))!==0){
        $error[] = check_error_name($caption);
    }
    
    if(mb_strlen(check_error_status($status))!==0){
        $error[] = check_error_status($status);
    }

}else if($sqltype === 'delete'){
    $item_id     = '';
    $deletefiles = '';
    $item_id     = $_POST['item_id'];
    $deletefiles = $_POST["deletefiles"];
    
    if(mb_strlen(check_error_id($item_id))!==0){
        $error[] = check_error_id($item_id);
    }
}

try {
    $dbh = get_db_connect();
    if (count($error) === 0 && $_SERVER['REQUEST_METHOD'] === 'POST') {
        if($sqltype === 'new_product'){
            $item_id = ''; 
            item_insert($dbh, $item_name, $creator, $caption, $category, $template_name, $status, $new_img_filename);
        }else if($sqltype === 'detail_change'){
            db_detail_change($dbh, $img, $status, $item_id, $item_name, $creator, $caption, $category);
        }else if($sqltype === 'delete'){
            if(destroy_item($dbh, $item_id, $deletefiles, $imgdir) === true){
                print 'アイテム削除に成功しました。';
            }else{
                $error[] = 'アイテム削除に失敗しました。';
            }
            
        }
    }
    $result = get_all_items($dbh);
}catch (PDOException $e) {
  $error[] = '予期せぬエラーが発生しました。管理者へお問い合わせください。'.$e->getMessage();
}
print error_display($error);
var_dump($_SERVER['SERVER_ADDR'] );
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>自主トレメニュー</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="./css/tool.css">
</head>
<body>
    <h1>トレーニング管理ツール</h1>
    <div class="form">
        <form method="post" enctype="multipart/form-data">
            <h2>トレーニング追加</h2>
            <p>自主トレ名：<input type="text" name="item_name"></p>
            <p>作者名：<input type="text" name="creator"></p>
            <p>説明文:</p>
            <textarea type="text" name="caption"></textarea>
            <p>カテゴリー　※カテゴリーは入力後は変更できません。<br>
                部位<br>
                <input type="checkbox" name="category[]" value="頸部">頸部
                <input type="checkbox" name="category[]" value="肩関節">肩関節
                <input type="checkbox" name="category[]" value="腰部">腰部
                <input type="checkbox" name="category[]" value="股関節">股関節
                <input type="checkbox" name="category[]" value="膝関節">膝関節
                <input type="checkbox" name="category[]" value="足部">足部
                <br>
                病名<br>
                <input type="checkbox" name="category[]" value="肩関節周囲炎">肩関節周囲炎
                <input type="checkbox" name="category[]" value="腰部脊柱管狭窄症">腰部脊柱管狭窄症
                <input type="checkbox" name="category[]" value="腰椎椎間板ヘルニア">腰椎椎間板ヘルニア
                <input type="checkbox" name="category[]" value="変形性股関節症">変形性股関節症
                <input type="checkbox" name="category[]" value="変形性膝関節症">変形性膝関節症
                <br>
                介護部門<br>
                <input type="checkbox" name="category[]" value="立位での体操">立位での体操
                <input type="checkbox" name="category[]" value="座位での体操">座位での体操
                <input type="checkbox" name="category[]" value="ベッドでの体操">ベッドでの体操
                <input type="checkbox" name="category[]" value="セラバンド体操">セラバンド体操
                <input type="checkbox" name="category[]" value="棒体操">棒体操
            </p>
            <p>テンプレート設定<input type="text" name="template_name"></p>
            <select name="status">
                <option value="0">公開</option>
                <option value="1">非公開</option>
            </select>
            <p><input type="file" name="file" value="ファイルを選択"></p>
            <p><input type="submit" value="■□■□■商品を追加■□■□■"></p>
            <input type="hidden" name="sqltype" value="new_product">
        </form>
    </div>
    <div class="contents">
        <h2>自主トレ情報の変更</h2>
        <p>自主トレ一覧</p>
        <table border="1">
            <tr>
                <th>自主トレ画像</th>
                <th>自主トレ名</th>
                <th>作者名</th>
                <th>説明文</th>
                <th>カテゴリー</th>
                <th>テンプレート</th>
                <th>ステータス</th>
                <th>変更</th>
                <th>操作</th>
            </tr>
<?php foreach($result as $value) { ?>
    <?php if($value['status']===1) {; ?>
            <tr class=private>
    <?php }else if($value['status']===0){; ?>
            <tr>
    <?php }; ?>
                <form method="post">
                    <td class="img_table"><img class="img_size" src="./img/<?php print $value['img']; ?>"><input type="text" name="img" value="<?php print $value['img'] ?>"></td>
                    <td class="item_name"><input type="text" name="item_name" value="<?php print $value['item_name']; ?>"></td>
                    <td class="creator"><input type="text" name="creator" value="<?php print $value['creator']; ?>"></td>
                    <td class="caption"><textarea type="text" name="caption"><?php print $value['caption']; ?></textarea></td>
                    <td class="category"><?php print $value['category_name']; ?></td>
                    <td class="template_name"><?php print $value['template_name']; ?></td>
                    <td class="status">
                        <select name="status">
    <?php if($value['status']===0){ ?>
                            <option value='0'>現在：公開→非公開</option>
                            <option value='1'>非公開→公開</option>
    <?php }else if($value['status']===1){ ?>
                            <option value="1">現在：非公開→公開</option>
                            <option value="0">公開→非公開</option>
    <?php }; ?>
                        </select>
                    </td>
                    <td>
                        <input type="submit" value="内容変更">
                        <input type="hidden" name="sqltype" value="detail_change">
                        <input type="hidden" name="item_id" value="<?php print $value['item_id'] ; ?>">
                    </td>
                </form>
                <td>
                    <form method="post">
                        <input type="submit" value="削除">
                        <input type="hidden" name="sqltype" value="delete">
                        <input type="hidden" name="item_id" value="<?php print $value['item_id'] ; ?>">
                        <input type="hidden" name="deletefiles" value="<?php print $value['img'] ?>">
                    </form>
                </td>
            </tr>
<?php } ?>
        </table>
    </div>
</body>
</html>