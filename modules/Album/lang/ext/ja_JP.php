<?php
$lang['friendlyname'] = 'フォトアルバム';
$lang['postinstall'] = '';
$lang['postuninstall'] = '';
$lang['really_uninstall'] = 'よろしいですか？';
$lang['uninstalled'] = 'モジュールがアンインストールされました。';
$lang['installed'] = 'リリース%sがインストールされました。';
$lang['upgraded'] = 'モジュールがリリース%sにアップグレードされました。';
$lang['moddescription'] = '';
$lang['error'] = 'エラー!';
$lang['admindescription'] = '';
$lang['accessdenied'] = 'アクセスが拒否されました。';
$lang['changelog'] = '<ul><li>バージョン 0.0.1. 5 April 2006. 初回リリース</li></ul>';
$lang['help'] = '<h3>What Does This Do?</h3>
<p>This module can be used to manage picture gallery</p>
<h3>How Do I Use It</h3>
<p>To show albums in a page, just put this code : </p>
<p><code>{cms_module module="album" albums="1,3"}</code></p>
<p>The code above allows you to show in a page albums whose IDs are 1 and 3 for example. If you do not provide paramater "albums", it will show all the albums.</p>
<h3>Support</h3>
<p>As per the GPL, this software is provided as-is. Please read the text of the license for the full disclaimer.</p>
<h3>Copyright and License</h3>
<p>Copyright © 2006, dam. All Rights Are Reserved.</p>
<p>This module has been released under the <a href="http://www.gnu.org/licenses/licenses.html#GPL">GNU Public License</a>. You must agree to this license before using the module.</p>';
$lang['addalbum'] = 'アルバムを追加';
$lang['addpicture'] = '画像を追加';
$lang['addtemplate'] = 'テンプレートを追加';
$lang['albumidtext'] = 'ID';
$lang['albumnametext'] = 'アルバム';
$lang['albumthumbtext'] = 'サムネイル';
$lang['Albums'] = 'アルバム';
$lang['areyousure'] = 'よろしいですか？';
$lang['browsepictures'] = '変更';
$lang['cancel'] = 'キャンセル';
$lang['changecomment'] = '編集コメント';
$lang['changepicture'] = '画像を変更';
$lang['changethumb'] = '変更';
$lang['changethumbnail'] = 'サムネイルを変更';
$lang['columns'] = 'コラム番号';
$lang['comment'] = 'コメント';
$lang['currenttemplate'] = '現在のテンプレート';
$lang['currentpicture'] = '現在の画像';
$lang['currentthumbnail'] = '現在のサムネイル';
$lang['deletealbum'] = '削除';
$lang['deletepicture'] = '削除';
$lang['Help'] = 'ヘルプ';
$lang['modify'] = '変更';
$lang['moveleft'] = '左へ移動';
$lang['moveright'] = '右へ移動';
$lang['multiplealbumtemplate'] = '複数アルバムテンプレート';
$lang['name'] = '名前';
$lang['nocomment'] = '(no comment)';
$lang['nothumbnail'] = '(no thumbnail)';
$lang['picture'] = '画像';
$lang['parentdir'] = '(親ディレクトリ)';
$lang['pictures'] = '画像';
$lang['Picture'] = '画像';
$lang['Pictures'] = '画像';
$lang['Properties'] = 'プロパティ';
$lang['resetthumb'] = 'サムネイルをリセット';
$lang['return'] = '戻る';
$lang['rows'] = 'Row number';
$lang['selectall'] = 'すべて選択';
$lang['selectpicture'] = 'この画像を使用';
$lang['selectthumb'] = 'この画像のサムネイルを使用';
$lang['submit'] = '保存';
$lang['template'] = 'テンプレート';
$lang['Template'] = 'テンプレート';
$lang['templatenametext'] = 'テンプレート';
$lang['Templates'] = 'テンプレート';
$lang['thumbnail'] = 'サムネイル';
$lang['title'] = 'タイトル';
$lang['uploadpicture'] = '画像をアップロード';
$lang['upload'] = 'アップロード';
$lang['view'] = 'サイトの確認';
$lang['help_template'] = '<h3>Album list</h3>
<p>You can use smarty tag {$albums} which is an array. Each of its elements is one of the selected albums.
The structure of an album is described in next chapter.
To show the albums, use loop <code>{foreach from=$albums item=album}{/foreach}</code></p>
<h3>Album</h3>
<p>If there is only one album, or if a specific album is selected, you can use tag {$album}. It allows to access following items :</p>
<ul>
	<li>{$album->name} : name</li>
	<li>{$album->comment} : comment</li>
	<li>{$album->columns} : column number</li>
	<li>{$album->rows} : row number</li>
	<li>{$album->thumbnail} : adress (url) of thumbnail</li>
	<li>{$album->link} : link to album</li>
	<li>{$album->picturecount} : number of pictures of an album</li>
</ul>
<h3>Image list</h3>
<p>If an album is selected, you can use tag {$pictures} which is an array of arrays : it contains rows that contain pictures.
The structure of an image is described in following chapter.
To show image list, use the following loop :
<code>{foreach from=$pictures item=picturesrow}
	{foreach from=$picturesrow item=onepicture}
	{/foreach}
{/foreach}</code></p>
<h3>Picture</h3>
<p>If a picture is selected, you can use tag  {$picture}. It is automatically set to first picture of album if no picture is selected.</p>
<ul>
	<li>{$picture->name} : name</li>
	<li>{$picture->comment} : comment</li>
	<li>{$picture->thumbnail} : adress (url) of thumbnail</li>
	<li>{$picture->picture} : adress (url) of picture</li>
	<li>{$picture->link} : link to picture</li>
	<li>{$picture->number} : picture number</li>
</ul>
<h3>Other</h3>
<p>You can also use following tags :</p>
<ul>
	<li>{$returnlink} : back to previous page</li>
	<li>{$albumnumber} : current album number</li>
	<li>{$albumcount} : album count</li>
	<li>{$picturenumber} : current picture number</li>
	<li>{$picturecount} : picture count</li>
	<li>{$pagenumber} : current page number</li>
	<li>{$pagecount} : page count</li>
	<li>{$link.album.1} : link to first album. You can also indicate another number</li>
	<li>{$link.album.first}, {$link.album.previous}, {$link.album.next}, {$link.album.last}</li>
	<li>{$link.picture.1} : link to first picture. You can also indicate another number</li>
	<li>{$link.picture.first}, {$link.picture.previous}, {$link.picture.next}, {$link.picture.last}</li>
	<li>{$link.page.1} : link to first page. You can also indicate another number</li>
	<li>{$link.page.first}, {$link.page.previous}, {$link.page.next}, {$link.page.last}</li>
</ul>
';
?>