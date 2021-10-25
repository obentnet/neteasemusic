<?php
    $id = $_GET['id'];
    $api = 'https://api.paugram.com/netease/?id=';
    $song_json = file_get_contents($api.$id);
    $song_data = json_decode($song_json,true);
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>网易云音乐解析</title>
    <link rel="shortcut icon" href="https://yujienb.cn/favicon.ico" type="image/x-icon">
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
      integrity="sha384-cLRrMq39HOZdvE0j6yBojO4+1PrHfB7a9l5qLcmRm/fiWXYY+CndJPmyu5FV/9Tw"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <div class="sidebar">
            <div class="mdui-appbar mdui-color-red-700">
                <div class="mdui-toolbar mdui-color-theme">
                  <a href="./" class="mdui-typo-headline">网易云解析</a>
                  <a href="https://yujienb.cn/" class="mdui-typo-title">首页</a>
                  <div class="mdui-toolbar-spacer"></div>
                  <a href="https://music.163.com/#/search/m/" target="_blank" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">search</i></a>
                  <a href="javascript:location.reload();" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">refresh</i></a>
                  <a href="javascript:alert('本站采用保罗api开发,请尊重原作者')" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">help</i></a>
                </div>
              </div>
        </div>
    </div>

    <div class="core-main mdui-row">
        <div class="mdui-card mdui-typo">
            <div class="song-cover mdui-col-xs-6">
                <img src="<?php echo $song_data['cover']?>" alt="">
            </div>
            <div class="song-title mdui-col-xs-6">
                <?php echo $song_data['title']?>
            </div>
            <div class="song-info mdui-col-xs-6">
                作者：<?php echo $song_data['artist']?> <br>
                专辑：<?php echo $song_data['album']?> <br>
                会员：<?php
                    if($song_data['served'] == true){
                        echo '黑胶专享<br/>';
                    }elseif($song_data['served'] == false){
                        echo '无需会员<br/>';
                    }
                ?>
                封面：<a href="<?php echo $song_data['cover']?>" target="_blank" rel="noopener noreferrer">点我跳转</a> <br>
                下载：<a href="<?php echo $song_data['link']?>" target="_blank" rel="noopener noreferrer">跳转下载</a> <br>
            </div>
        </div>
    </div>

    <footer>
        <script
          src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
          integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
          crossorigin="anonymous"
        ></script>
    </footer>
</body>
</html>