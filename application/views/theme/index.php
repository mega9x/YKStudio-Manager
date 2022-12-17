<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>自定义主题上传</title>
    <link href="<?php echo base_url() ?>theme/default/css/common.css" rel="stylesheet" type="text/css">
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/Common.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/jquery.min.js"></script>
    <script language="javascript" src="<?php echo base_url() ?>theme/default/js/tips.js"></script>
    <script src="<?php echo base_url() ?>theme/default/js/jquery.artDialog.js?skin=default"></script>
    <script src="<?php echo base_url() ?>theme/default/js/iframeTools.js"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>theme/editor/themes/default/default.css"/>
    <script src="<?php echo base_url() ?>theme/editor/kindeditor.js" charset="utf-8"></script>
    <script src="<?php echo base_url() ?>theme/editor/lang/zh_CN.js" charset="utf-8"></script>
    <script>
        KindEditor.ready(function (K) {
            var editor = K.editor({
                uploadJson: '<?php echo site_url('common/upload')?>',
                fileManagerJson: '<?php echo site_url('common/upload_manage')?>',
                allowFileManager: true
            });
            K('#image1').click(function () {
                editor.loadPlugin('image', function () {
                    editor.plugin.imageDialog({
                        showRemote: false,
                        imageUrl: K('#tsmallpic').val(),
                        clickFn: function (url, title, width, height, border, align) {
                            K('#tsmallpic').val(url);
                            document.getElementById('pic1').src = url;
                            editor.hideDialog();
                        }
                    });
                });
            });

            K('#image3').click(function () {
                editor.loadPlugin('image', function () {
                    editor.plugin.imageDialog({
                        showRemote: false,
                        imageUrl: K('#tbigpic').val(),
                        clickFn: function (url, title, width, height, border, align) {
                            K('#tbigpic').val(url);
                            document.getElementById('pic2').src = url;
                            editor.hideDialog();
                        }
                    });
                });
            });

        });
    </script>
    <script src="<?php echo base_url() ?>theme/default/js/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>theme/default/css/sweetalert.css">
</head>
<body>

<span class="MenuboxS">
 <ul>
 <li><span><a href="<?php echo site_url('theme/add') ?>">主题上传</a></span></li>
 <li class="hover"><span><a href="<?php echo site_url('theme') ?>">主题管理</a></span></li>
 
 </ul>
</span>

<div class="allpage">
    <ul class="themelist">
        <?php foreach ($list as $arr => $row) { ?>
            <li>
                <div class="theme_icon"><img src="<?php echo base_url($row['smallpic']) ?>" width="140" height="100">
                </div>
                <?php if ($row['uid'] > 0) { ?>
                    <div class="theme_text"><span style="font-weight:bold;"><?php echo $row['name'] ?></span> <span
                                style=" margin-left:20px;"><a
                                    href="<?php echo site_url('theme/edit') ?>?id=<?php echo $row['id'] ?>">修改</a> <a
                                    href="<?php echo site_url('theme/del') ?>?id=<?php echo $row['id'] ?>">删除</a></span>
                    </div>
                <?php } else { ?>
                    <div class="theme_text" style="color:#717273;"><span
                                style="font-weight:bold;"><?php echo $row['name'] ?></span> <span
                                style=" margin-left:20px;">[系统壁纸]</span></div>
                <?php } ?>

            </li>
        <?php } ?>


    </ul>
</div>

</body>
</html>

 