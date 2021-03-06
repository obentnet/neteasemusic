<?php
    /**
     * Netease
     * By 狱杰
     * Link: https://github.com/obentnet/neteasemusic
     */
    $id = $_GET['id'];
    $api = 'https://api.paugram.com/netease/?id=';
    $song_json = file_get_contents($api.$id);
    $song_data = json_decode($song_json,true);
?>
<!--
    网易云解析
    By 狱杰
    Link: https://github.com/obentnet/neteasemusic
-->
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
    <link rel="stylesheet" href="style.css?v=1.2">
    <!-- Aplayer -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aplayer@1.10.0/dist/APlayer.min.css">
    <script src="https://cdn.jsdelivr.net/npm/aplayer@1.10.0/dist/APlayer.min.js"></script>
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
            <div id="aplayer">
                <pre class="aplayer-lrc-content">
                    <?php echo $song_data['lyric']?>
                </pre>
            </div>
            <br>
            <br>
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
        <script>
            const ap = new APlayer({
                container: document.getElementById('aplayer'),
                audio: [{
                    name: '<?php echo $song_data['title']?>',
                    artist: '<?php echo $song_data['artist']?>',
                    url: '<?php echo $song_data['link']?>',
                    cover: '<?php echo $song_data['cover']?>',
                    autoplay:true,
                }]
            });
        </script>
        <script>
            console.log('\u8be5\u7a0b\u5e8f\u4f7f\u7528\u4e86\u5947\u8da3\u4fdd\u7f57\u7684\u0041\u0050\u0049\u63a5\u53e3\u5f00\u53d1\uff0c\u8bf7\u5c0a\u91cd\u539f\u4f5c\u8005\u3002\u672c\u7a0b\u5e8f\u7531\u0020\u72f1\u6770\u0020\u5f00\u53d1\uff0c\u9e23\u8c22\u004d\u0044\u0055\u0049')
        </script>
        <script
          src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
          integrity="sha384-gCMZcshYKOGRX9r6wbDrvF+TcCCswSHFucUzUPwka+Gr+uHgjlYvkABr95TCOz3A"
          crossorigin="anonymous"
        ></script>
    </footer>
</body>
</html>