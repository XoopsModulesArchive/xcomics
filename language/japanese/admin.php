<?php

define('_CO_WRITTEN', '更新中です。少々お待ち下さい・・・');
define('_CO_ERRWR', 'ファイルに書き込めません。 <BR><BR> 次のファイルのパーミッションを確認して下さい: <BR> - modules/xcomics/cache/settings.php ');
define('_CO_ERRWR2', 'ファイルに書き込めません。 <BR><BR>次のファイルのパーミッションを確認して下さい: <BR> - modules/xcomics/cache/ownfile.php ');
define('_CO_SUB', '編集');
define('_CO_KEU', '選択してください！');
define('_CO_VERZ', '送信');
define('_CO_OPT', '以下のオプションが利用できます。');
define('_CO_AGREE', '同意します。');
define('_CO_YAGREE', '貴方は契約書に同意しなければならない');
define('_AD_SET', '設定変更');
define('_AD_ADD', 'コミックの追加');
define(
    '_AD_INFORM1',
    "この機能はXOOPS 1.3.xの初期のバージョン用に作成されたファイルから転用しました。しかし、多くの変更がXOOPSのシステムに加えられ、テンプレートをそのまま使う事ができなくなりました。\n<br><br>\n テンプレートを編集する為に、貴方はXOOPSの管理者権限を持つアカウントでアクセスする必要があります。次のリンクをクリックすると、編集が必要なテンプレートファイルをすぐに見つけられます。:\n<br><br>\n&nbsp;&nbsp;&nbsp;&nbsp;<a href=\""
       . XOOPS_URL
       . "/modules/system/admin.php?fct=tplsets&op=listtpl&tplset=x2t&moddir=xcomics\">コミックモジュールのテンプレート・ファイル・リスト</a> （<b>x2t</b>テンプレートを使用しているなら、このまま使用できます。違う場合は、下の入力ボックスでテンプレート名を変更して下さい）<br><br>※テンプレートセットを編集するには、先にシステムのテンプレート・マネージャーで、defaultのテンプレートを複製しておく必要があります。<br>※入力ボックスに指定するのは、複製したテンプレートセットの名前です。テーマ名ではありませんので、ご注意下さい。<br><br>\n<i>リンクをクリックして、次のテンプレートを編集して下さい。: xcomics_owncomic.html<br>\nメニューの名称と著作権表示を変更するには<a href=\""
       . XOOPS_URL
       . "/modules/xcomics/admin/index.php?com=xComicsAdmin\">ココ</a></i>\n<form action=\"index.php\" method=\"post\">\n<input type=\"text\" name=\"thetemplate\" value=\"貴方がディフォルトにしているテンプレート・セットの名前\">\n<input type=\"submit\" name=\"verzenden\"value=\"変更\">\n<input type=\"hidden\" name=\"com\" value=\"xComicsAdd\">\n<input type=\"hidden\" name=\"send\" value=\"yes\">\n</form>"
);
define(
    '_AD_INFORM2',
    '<b>変更中･･･</b><br><b>リンクが =&gt; 作成されました！</b><br><br>&nbsp;&nbsp;&nbsp;&nbsp;<a href="'
       . XOOPS_URL
       . '/modules/system/admin.php?fct=tplsets&op=listtpl&tplset='
       . $_POST['thetemplate']
       . '&moddir=xcomics">コミック・モジュールのテンプレート・ファイル・リスト</a> (テンプレート・セット名: <b>'
       . $_POST['thetemplate']
       . "</b>)<br><br>\n<i>リンクをクリックして、次のテンプレートを編集して下さい。: xcomics_owncomic.html<br>\nメニューの名称と著作権表示を変更するには<a href=\""
       . XOOPS_URL
       . "/modules/xcomics/admin/index.php?com=xComicsAdmin\">ココ</a></i>\n<br>"
);
