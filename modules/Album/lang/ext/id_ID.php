<?php
$lang['friendlyname'] = 'Album foto';
$lang['postinstall'] = 'Album sekarang sudah terpasang. Jangan lupa melampirkan stylesheet baru &quot;Album (untuk template default, ImageGallery, dan Thickbox)&quot; ke template halaman dimana Anda akan menggunakan Album tersebut.';
$lang['postuninstall'] = 'Album sekarang sudah dibuang dari database.';
$lang['uninstalled'] = 'Modul sudah dilepas';
$lang['installed'] = 'Rilis %s terpasang';
$lang['upgraded'] = 'Modul dinaik tingkatkan pada rilis %s.';
$lang['error_nofilesuploaded'] = 'Ada kesalahan uploading. Mohon periksa dan pastikan bahwa folder nya dapat ditulis/writable.';
$lang['error'] = 'Salah!';
$lang['next_picture'] = 'Gambar berikutnya';
$lang['admindescription'] = 'Modul Album memungkinkan Anda memunculkan galeri foto di website Anda.';
$lang['accessdenied'] = 'Akses ditolak';
$lang['module_example_stylesheet'] = 'Album (untuk template default, ImageGallery, dan Thickbox)';
$lang['module_example_stylesheet_intro'] = 'Template ini diperlukan jika Anda menggunakan template default, ImageGallery, atau Thickbox pada modul Album.
Template ini bisa saja ditimpa ketika modul dinaik tingkatkan dan akan dihapus ketika modul dilepas kembali, karena itu buatlah salinannya jiga Anda akan mengubahnya.';
$lang['changelog'] = '<ul><li>Versi 0.0.1. 5 April 2006. Rilis Awal.</li></ul>';
$lang['help_albums'] = 'Daftar dari satu atau lebih (dipisahkan dengan tanda koma) IDs dari Album-album yang akan ditampilkan.';
$lang['help_sortdesc'] = 'Album singkat dalam urutan descending.';
$lang['help'] = '<h3>Apa yang dilakukannya?</h3>
<p>Modul ini digunakan untuk mengatur galeri gambar</p>
<h3>Bagaimana cara menggunakannya</h3>
<p>Untuk melihat semua album di sebuah halaman, tingga masukkan kode berikut ini : </p>
<p><code>{cms_module module=&#039;album&#039;}</code></p>
<p>Jika Anda hanya ining album tertentu saja yang ditampilkan, gunakan kode ini:
<p><code>{cms_module module=&#039;album&#039; albums=&#039;1,3&#039;}</code></p>
<p>Kode di atas membuat kita dapat menampilkan dalam satu halaman dimana ID nya adalah 1 dan 3 misalnya. Jika Anda tidak menggunakan parameter &quot;albums&quot;, maka keseluruhan album akan ditampilkan</p>
<h3>Templates</h3>
<p>Sebuah &quot;Album (defaultnya, template ImageGallery, Thickbox )&quot; stylesheet untuk yang default, templates dipasang dengan. Stylesheet dihapus ketika modul dilepas dan mungkin juga karena ditimpa ketika melakukan penaikan tingkat, karena itu sebaiknya Anda salin/copy dulu jika ingin memodifikasinya. Pasangkan stylesheet tersebut ke halaman yang digunakan.</p>
<h3>Dukungan</h3>
<p>Sebagai bagian dari GPL, software ini didukung apa adanya. Silahkan baca teks yang menjelaskan tentang lisensi agar menjadi jelas semuanya.</p>
<h3>Hak Cipta dan Lisensi</h3>
<p>Copyright &copy; 2006, dam. All Rights Are Reserved.</p>
<p>Modul ini dikeluarkan berdasarkan <a href=&amp;amp;amp;amp;quot;http://www.gnu.org/licenses/licenses.html#GPL&amp;amp;amp;amp;quot;>GNU Public License</a>. Anda harus sudah setuju sebelum menggunakan modul ini.</p>';
$lang['addalbum'] = 'Menambah sebuah album';
$lang['error_nonamegiven'] = 'Anda harus memberikan nama pada album baru Anda.';
$lang['albumadded'] = 'Album sudah berhasil ditambahkan. Gambar-gambar dapat ditambahkan ke dalamnya di bawah ini.';
$lang['albumdeleted'] = 'Album sudah berhasil dilepas dari database.';
$lang['noalbumstext'] = 'Anda belum membuat satu album foto pun.';
$lang['addpicture'] = 'Menambah gambar';
$lang['addtemplate'] = 'Menambah template';
$lang['albumidtext'] = 'IDs ';
$lang['albumnametext'] = 'Album';
$lang['albumthumbtext'] = 'Gambar mungil';
$lang['albumnumpicturestext'] = 'Banyaknya gambar';
$lang['albumreordertext'] = 'Diurutkan kembali';
$lang['albumactionstext'] = 'Aksi';
$lang['Albums'] = 'Album-album';
$lang['areyousure'] = 'Anda yakin ?';
$lang['browsepictures'] = 'Mengubah';
$lang['cancel'] = 'Tunda';
$lang['changecomment'] = 'Memperbaiki catatan';
$lang['changepicture'] = 'Mengubah gambar';
$lang['changethumb'] = 'Mengubah';
$lang['changethumbnail'] = 'Merubah gambar mungil';
$lang['columns'] = 'Jumlah maksimum kolom gambar mungil (0 artinya tidak terbatas. Hanya digunakan pada template tabel)';
$lang['comment'] = 'Komentar';
$lang['currenttemplate'] = 'Template Daftar Album';
$lang['currentpicture'] = 'Gambar saat ini';
$lang['currentthumbnail'] = 'Gambar mungil saat ini';
$lang['deletealbum'] = 'Hapus';
$lang['deletepicture'] = 'Hapus';
$lang['Help'] = 'Pertolongan';
$lang['modify'] = 'Mengubah';
$lang['moveleft'] = 'Pindah ke kiri';
$lang['moveright'] = 'Pindah ke kanan';
$lang['multiplealbumtemplate'] = 'Template multi Album';
$lang['name'] = 'Nama';
$lang['albumrenamed'] = 'Album sudah berhasil diganti nama';
$lang['nocomment'] = '(tidak ada komentar)';
$lang['nothumbnail'] = '(tidak ada gambar mungil)';
$lang['picture'] = 'Gambar';
$lang['parentdir'] = '(Direktori orang tua)';
$lang['pictures'] = 'gambar';
$lang['nopicturetext'] = 'Tidak ada gambar di album ini';
$lang['Picture'] = 'Gambar';
$lang['Pictures'] = 'Gambar-gambar';
$lang['Properties'] = 'Kepemilikan';
$lang['propertiesupdated'] = 'Kepemilikan album sudah berhasil di simpan.';
$lang['resetthumb'] = 'Mengatur kembali gambar mungil';
$lang['return'] = 'Kembali';
$lang['rows'] = 'Jumlah maksimum dari baris gambar mungil (0 artinya tidak terbatas. Hanya digunakan pada Tabel template)';
$lang['showcallpagecontent'] = 'Tandai kotak ini untuk menampilkan isi halaman dengan tagl Album di atas semua gambar';
$lang['selectall'] = 'Pilih semua';
$lang['selectpicture'] = 'Gunakan gambar ini';
$lang['selectthumb'] = 'Gunakan gambar mungil dari gambarnya';
$lang['submit'] = 'Simpan';
$lang['template'] = 'Template ';
$lang['deletetemplate'] = 'Hapus Template';
$lang['Template'] = 'Template ';
$lang['templatenametext'] = 'Template-template';
$lang['Templates'] = 'Template-template';
$lang['edittemplate'] = 'Mengubah Template';
$lang['templatesaved'] = 'Templte sudah berhasil di simpan ke database.';
$lang['errortemplatenameexists'] = 'Template menggunakan nama yang sudah ada, silahkan pilih nama yang lain.';
$lang['error_filenotfound_defaulttemplate'] = 'File template dari template ini tidak ditemukan.';
$lang['thumbnail'] = 'Gambar mungil';
$lang['title'] = 'Judul';
$lang['uploadpicture'] = 'Unggah gambar';
$lang['upload'] = 'Unggah';
$lang['view'] = 'Tampilkan';
$lang['options'] = 'Pilihan';
$lang['optionsupdated'] = 'Pilihan sudah berhasil diperbaharui.';
$lang['defaultrows'] = 'Jumlah maksimum default dari baris gambar mungil untuk album-album baru (0 artinya tidak terbatas. Hanya digunakan pada Tabel template)';
$lang['defaultcolumns'] = 'Jumlah maksimum default dari kolom gambar mungil untuk album-album baru (0 artinya tidak terbatas. Hanya digunakan pada Tabel template)';
$lang['defaulttemplate'] = 'Template default';
$lang['help_template'] = '<h3>Album list</h3>

<p>An &quot;Album (for default, ImageGallery, and Thickbox templates)&quot; stylesheet for the default, ImageGallery, and Thickbox templates is installed with the module. This stylesheet is deleted when the module is uninstalled and may be overwitten by an upgrade, so you might want to use a copy if you modify it. Attach the stylesheet to the page template used.</p>

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
$lang['utmz'] = '156861353.1158912730.9.4.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/forum/|utmcmd=referral';
$lang['utma'] = '156861353.1700526072.1155101103.1159932660.1163569724.12';
$lang['utmc'] = '156861353';
?>