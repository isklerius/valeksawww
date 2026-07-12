<?php
$lang['friendlyname'] = 'Albumes de Fotos';
$lang['postinstall'] = 'El &aacute;lbum est&aacute; instalado. <p><b>Nota: Quiz&aacute; usted deba cambiar la M&aacute;scara de Creaci&oacute;n de Archivo (umask): de &quot;022&quot; a &quot;002&quot; para evitar seguir obteniendo errores del tipo 403 forbidden (prohibido) al tratar de ver las miniaturas generadas en su sitio web.</b></p>';
$lang['postuninstall'] = 'El &aacute;lbum ha sido eliminado de la base de datos.';
$lang['uninstalled'] = 'M&oacute;dulo desinstalado';
$lang['installed'] = 'La versi&oacute;n %s est&aacute; instalada';
$lang['upgraded'] = 'M&oacute;dulo actualizado a la versi&oacute;n %s.';
$lang['error_nofilesuploaded'] = 'Se ha producido un error al cargar. Por favor asegurate de que el directorio tiene permiso de escritura.';
$lang['error'] = '&iexcl;Error!';
$lang['next_picture'] = 'Siguiente Imagen';
$lang['admindescription'] = 'El m&oacute;dulo Album le permite mostrar galer&iacute;as de fotos en su web de una manera sencilla.';
$lang['accessdenied'] = 'Acceso Denegado.';
$lang['query_failed'] = 'A fallado un requerimiento. Tratar de ir a la solapa de &quot;Opciones&quot; y haga click en el enlace que dice &quot;Correr Script de Actualizaci&oacute;n&quot;. Si esto no repara el problema, proceda entonces, por favor, a ingresar un bug.';
$lang['changelog'] = '<ul><li>Version 0.0.1. 5 Abril 2006. Realizaci&oacute;n Inicial.</li></ul>';
$lang['view_default_stylesheet'] = 'Ver Hoja de Estilo por Defecto';
$lang['help_albums'] = 'Una lista de uno o m&aacute;s (separadas por comas) IDes de Albums a ser mostrados.';
$lang['max_image_size'] = '<b>Tama&ntilde;o m&aacute;ximo de imagen:</b> Cualquier imagen m&aacute;s grande que esto ser&aacute; autom&aacute;ticamente reducida en tama&ntilde;o (si es que la plantilla est&aacute; configurada para que esto ocurra) usando Javascript. Nota: Actualmente s&oacute;lo la plantilla &quot;Tablas&quot; usa esta configuraci&oacute;n.';
$lang['help_sortdesc'] = 'Ordenar los albums en orden descendente antes que ascendente.';
$lang['help_sortpicturesdesc'] = 'Ordenar las fotos en orden descendente antes que ascendente. Esto har&aacute; que las fotos nuevas que son agregadas a un &aacute;lbum sean listadas primeras. <p> Ejemplo para mostrar las fotos en orden inverso: </p><pre>{cms_module module=&#039;album&#039; sortpicturesdesc=&#039;true&#039;}</pre>';
$lang['templatenameexists'] = 'Error: Una plantilla con el mismo nombre ya existe. Por favor elija otro nombre.';
$lang['templateimported'] = 'La plantilla se ha importado con &eacute;xito a la base de datos y ahora est&aacute; instalada para su uso.';
$lang['help'] = '<h3>&iquest;Qu&eacute; hace esto?</h3>
<p>Este m&oacute;dulo se puede usar para administrar una galer&iacute;a de fotos</p>
<h3>Como lo puedo usar</h3>
<p>Para mostrar todos los albums en una p&aacute;gina, simplemente ponga este c&oacute;digo : </p>
<p><code>{cms_module module=&#039;album&#039;}</code></p>
<p>Si usted desea que s&oacute;lo algunos albums sean mostrados, entonces utilice el siguiente c&oacute;digo:
<p><code>{cms_module module=&#039;album&#039; albums=&#039;1,3&#039;}</code></p>
<p>El c&oacute;digo de arriba le permitir&aacute; a usted mostrar en una p&aacute;gina los albums cuyos IDes son 1 y 3 por ejemplo. Si usted no agrega el par&aacute;metro  &quot;albums&quot;, mostrar&aacute; todos los albums.</p>
<h3>Plantillas</h3>
<h4>Como quitar los bordes a las miniaturas</h4>
<p>Agregue esto al final de modules/Album/css/stylesheet.css:</p>
<pre>.thumb a { background-color:transparent; border:0; }</pre>
<h4>Reparar problema de grandes luces causado por clear:both</h4>
<p>Ver: <a href=&quot;RE: Cannot seem to get categories working&quot;>RE: Cannot seem to get categories working</a></p>
<p>Respuesta corta, agregue esto a su Hoja de Estilo:</p>
<pre>
#main {
float: left;
}
</pre>
<h3>Resolviendo Problemas</h3>
<p>Converse con su programador respecto al uso de ImageMagick en vez de GD, trabaja de mejor forma.</p>
<h4>Las miniaturas no trabajan</h4>
<p><b>Nota: Quiz&aacute; usted deba cambiar la M&aacute;scara de Creaci&oacute;n de Archivos (umask): de &quot;022&quot; a &quot;002&quot; para evitar seguir recibiendo errores 403 forbidden (prohibido) cuando trata de mirar las miniaturas generadas en su sitio web. </b></p>
<a href=&quot;http://dev.cmsmadesimple.org/forum/message.php?msg_id=1181&quot;>A possible workaround to thumbnail problems</a>
<h4>Las miniaturas no aumentan su altura una vez llegado a 72px</h4>
<p>Ver <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,14125.msg69907.html#msg69907&quot;> 	
Re: El m&oacute;dulo &aacute;lbum y las miniaturas en IE [RESUELTO]</a>. Basicamente elimine esta parte de su plantilla:
{$onepicture->autothumbnailsize} and {$album->autothumbnailsize} para resolver el tama&ntilde;o de las miniaturas.</p>
<p>La caracter&iacute;stica &quot;autothumbnailsize&quot; fu&eacute; agregada para que todas las miniaturas quedaran con una altura de height=72. Quiz&aacute; esto es m&aacute;s un problema que una ayuda.</p>

<h4>Las miniaturas no se alinean correctamente</h4>
<p>Es posible que usted deba acortar los t&iacute;tulos de sus &aacute;lbum. O intente utilizar Tablas en la plantilla.</p>
<p>Ver <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,11996.0.html&quot;>Topico: Layout de las miniaturas en el &aacute;lbum [resuelto]</a>.</p>
<h4>Las miniaturas se extienden incorrectamente</h4>
<p>Una forma f&aacute;cil de resolver esto consiste en simplemente editar a modules/Album/css/stylesheet.css</p>
<p>En este archivo reemplace as&iacute;:</p>
<pre>
/* Thumb width*/ 
	height:72px;
</pre>
<p>con esto:</p>
<pre>
/* Thumb width*/ 
	/* height:72px; */
</pre>
<h4>Soluci&oacute;n: Javascript no carga cuando se habilita pretty urls con jerarqu&iacute;a - no se muestra la foto grande</h4>
Todo va a funcionar si usted pone esta  tag entre sus tags
&amp;lt;head&amp;gt; &amp;lt;/head&amp;gt; de la plantilla de su p&aacute;gina:
&amp;lt;head&amp;gt;
...
{metadata}
&amp;lt;/head&amp;gt;

<p>Esto har&aacute; que CMSMS entregue un tag como este:
&amp;lt;base href=&quot;http://www.elijahlofgren.com/&quot; /&amp;gt;</p>

<p>lo que har&aacute; que todos los enlaces relativos trabajen bien, a&uacute;n si la jerarqu&iacute;a est&aacute; habilitada.</p>


<p>La otra opci&oacute;n ser&iacute;a para mi cambiar la plantilla de forma que contenga la URL completa al JS lo que har&aacute; que siempre funcione, incluso si la tag metadata no es usada.</p>
<h4>Aumentando el tama&ntilde;o de las miniaturas</h4>
<p>Vea esta entrada en el foro: <a href=&quot;http://forum.cmsmadesimple.org/index.php/topic,7844.0.html&quot;>Miniaturas m&aacute;s Grandes para &Aacute;lbum</a>.</p>
<h4>El Efecto de Im&aacute;genes (Transparencia) a&uacute;n no trabaja</h4>
<p>Aseg&uacute;rese que todos los archivos en la carpeta templates/db tienen chmod 755. Ver: <a href=&quot;http://forum.cmsmadesimple.org/index.php?topic=10466.msg52526#msg52526&quot;> 	
Re: random_image en el &aacute;lbum. &iquest;Puede ser una miniatura apagada? {&iexcl;RESUELTO!}</a>.</p>
<h3>Suporte</h3>
<p>De acuerdo al GPL, este software se provee as&iacute; como esta. Por favor lea el texto de la licencia por todo su contenido.</p>
<h3>Copyright y Licencia</h3>
<p>Copyright &amp;copy; 2006, dam. Todos los Derechos Reservados.</p>
<p>Este m&oacute;dulo fue realizado bajo la <a href=&quot;http://www.gnu.org/licenses/licenses.html#GPL&quot;>Licencia P&uacute;blica GNU</a>. Usted debe estar de acuerdo con esta licencia antes de usar el m&oacute;dulo.</p>';
$lang['help_action'] = '<h4>Mostrar las im&aacute;genes recientemente agregadas</h4>
	 <p>Usted puede mostrar una lista de im&aacute;genes agregadas llamando al &aacute;lbum de esta forma:</p>
<pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039;}</pre>
<p><b>Importante</b>: Usted debe elgeir una &quot;<b>P&aacute;gina por defecto que contiene el &aacute;lbum.</b>&quot; con el fin de utilizar esta caracter&iacute;stica.</p>
<div style=&quot;border:1px solid black;&quot;>
<h4>Mostrar im&aacute;genes aleatoriamente</h4>
<p>Primero cuenta todas las filas en la base de datos (contabilizando todos los &Aacute;lbum incluidos), encuentra un n&uacute;mero al azahar entre &#039;0&#039; y el m&aacute;ximo n&uacute;mero de filas. Con este n&uacute;mero al puntero de la base de datos se le asigna a una fila espec&iacute;fica y el dato es obtenido de la tabla y devuelto.</p>
<h5>&iquest;C&oacute;m uso esto?</h5>
<p>Simplemente introduzca la tag en su plantilla/p&aacute;gina de esta forma: <code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039;}</code></p>
<p>Para mostrar un cierto n&uacute;mero de im&aacute;genes al azahar llame de esta forma:</p>
<code>{cms_module module=&#039;album&#039; action=&#039;random_image&#039; number=&#039;10&#039;}</code>
<h5>&iquest;Cu&aacute;les son los par&aacute;metros que la acci&oacute;n random_image puede tomar?</h5>
<p>
<ul>
	<li><em>(optional)</em> <tt>imagesurl</tt>   - Directorio del &Aacute;lbum, por defecto es: &#039;root_url&#039;/uploads/images</li>
	<li><em>(optional)</em> <tt>albums</tt>      - lista de &aacute;lbums separadas por coma, espacio, gui&oacute;n o punto y coma para mostrar sus im&aacute;genes.</li>
  <li><em>(optional)</em> <tt>border</tt>      - borde estilado con hoja de estilo, tal como border=&#039;5px&#039;</li>
  <li><em>(optional)</em> <tt>picturename</tt> - picturename = True/False, establece un t&iacute;tulo con el nombre de la imagena/li>
</ul>
<p><b>Nota: Estos par&aacute;metros s&oacute;lo estar&aacute;n disponibles cuando al &Aacute;lbum se lo llame con {cms_module module=&#039;album&#039; action=&#039;random_image&#039;}</b></p>
<p>por ejemplo: {cms_module module=&#039;album&#039; action=&#039;random_image&#039; albums=&#039;1,3,4,6&#039; border=&#039;3px&#039; picturename=&#039;True&#039;}</p>
</p>
<h5>Cosas para Hacer</h5>
<p>
<ul>
	<li>ordenar los nombres de clases de las tags div, y especificar su posible uso en hojas de estilo.<br />
		(sacarse de encima del par&aacute;metro borde)</li>
  <li>tomar el nombre del &aacute;lbum de la tabla album_albums, y hacer posible ubicarla en la salida.</li>
  <li>hacer posible que la imagen tenga un enlace que lleve al &aacute;lbum indicado? imagen?</li>
  <li>uso de un par&aacute;metro altura/ancho m&aacute;ximo y en base a &eacute;l re-dimensionar la miniatura si es necesario.</li>
</ul>
</p>
<p>Autor de Im&aacute;genes al Azahar: Frank Prins <<a href=&quot;mailto:webmaster@frank-fem.com&quot;>webmaster@frank-fem.com</a>></p>
</div>
';
$lang['help_number'] = '<h4>Mostrar un cierto n&uacute;mero de im&aacute;genes recientemente actualizadas</h4>
	 <p>Usted puede mostrar una lista de un cierto n&uacute;mero de im&aacute;genes llamando al &Aacute;lbum de esta forma:</pre> <pre>{cms_module module=&#039;album&#039; action=&#039;recently_updated&#039; number=&#039;15&#039;}';
$lang['addalbum'] = 'Agregar un &aacute;lbum';
$lang['error_nonamegiven'] = 'Usted debe darle un nombre al nuevo &aacute;lbum.';
$lang['albumadded'] = 'El &Aacute;lbum se a&ntilde;adi&oacute; correctamente. Abajo puede a&ntilde;adir imagenes al mismo.';
$lang['albumdeleted'] = 'El &aacute;lbum se a elimin&oacute; con &eacute;xito de la base de datos.';
$lang['noalbumstext'] = 'Usted no ha creado ning&uacute;n album de fotos en esta categor&iacute;a.';
$lang['addpicture'] = 'Agregar imagenes';
$lang['addtemplate'] = 'Agregar una plantilla';
$lang['albumidtext'] = 'IDes';
$lang['albumnametext'] = '&Aacute;lbumes';
$lang['albumthumbtext'] = 'Miniaturas';
$lang['albumnumpicturestext'] = 'N&uacute;mero de im&aacute;genes';
$lang['albumreordertext'] = 'Reordenar';
$lang['albumactionstext'] = 'Acciones';
$lang['Albums'] = '&Aacute;lbumes';
$lang['areyousure'] = '&iquest;Est&aacute; seguro?';
$lang['browsepictures'] = 'Cambiar';
$lang['cancel'] = 'Cancelar';
$lang['changecomment'] = 'Editar comentario';
$lang['changepicture'] = 'Modificar imagen';
$lang['changethumb'] = 'Cambiar miniatura';
$lang['changethumbnail'] = 'Cambiar miniatura';
$lang['columns'] = 'M&aacute;x n&uacute;mero de columnas de miniaturas (0 significa ilimitadas. Solo utilizado en plantillas Tablas)';
$lang['comment'] = 'Comentario';
$lang['currenttemplate'] = 'Plantilla de Lista de &Aacute;lbumes';
$lang['currentpicture'] = 'Imagen actual';
$lang['currentthumbnail'] = 'Miniatura actual';
$lang['deletealbum'] = 'Eliminar';
$lang['deletepicture'] = 'Eliminar';
$lang['Help'] = 'Ayuda';
$lang['modify'] = 'Cambiar';
$lang['moveleft'] = 'Mover a la izquierda';
$lang['moveright'] = 'Mover a la derecha';
$lang['multiplealbumtemplate'] = 'Plantilla de m&uacute;ltiples &aacute;lbumes';
$lang['name'] = 'Nombre';
$lang['nocomment'] = '(sin comentarios)';
$lang['nothumbnail'] = '(sin miniatura)';
$lang['picture'] = 'Imagen';
$lang['parentdir'] = '(Directorio padre)';
$lang['pictures'] = 'im&aacute;genes';
$lang['nopicturetext'] = 'No hay im&aacute;genes en este &aacute;lbum.';
$lang['Picture'] = 'Foto';
$lang['Pictures'] = 'Fotos';
$lang['Properties'] = 'Propiedades';
$lang['propertiesupdated'] = 'Se guardaron con &eacute;xito las propiedades del album.';
$lang['resetthumb'] = 'Resetear miniatura';
$lang['return'] = 'Volver';
$lang['rows'] = 'M&aacute;x n&uacute;mero de filas de miniaturas (0 significa ilimitado. S&oacute;lo utilizado en plantillas Tabla)';
$lang['useinlinelinks'] = '<b>Usar Enlaces Inline</b> - Esto har&aacute; que el contenido de la p&aacute;gina sea vista siempre con el tag del &Aacute;lbum arriba de todas las fotos. Adem&aacute;s <strong>esto har&aacute; que el &Aacute;lbum trabaje correctamente al ubicarlo en bloques de contenido de p&aacute;ginas adicionales</strong>. <strong>NOTA: Al habilitar esta opci&oacute;n el &Aacute;lbum dejar&aacute; de usar pretty URLs.</strong>';
$lang['autolinkstylesheet'] = '<b>Hoja de Estilo de Auto Enlace</b>: Haga click en esta caja de tilde para insertar autom&aacute;ticamente el enlace a la hoja de estilo del &Aacute;lbum en el encabezado de su p&aacute;gina. Esto usualmente se deja habilitado.';
$lang['selectall'] = 'Seleccionar Todo';
$lang['selectpicture'] = 'Utilizar esta imagen';
$lang['selectthumb'] = 'Utilizar el miniatura de esta imagen';
$lang['submit'] = 'Guardar';
$lang['file_templates_help'] = '<b>Hay algunas plantillas que usted debe instalar en la base de datos antes de que pueda utilizarlas.</b>';
$lang['template'] = 'Plantilla';
$lang['deletetemplate'] = 'Eliminar Plantilla';
$lang['Template'] = 'Plantilla';
$lang['templatenametext'] = 'Plantillas';
$lang['Templates'] = 'Plantillas';
$lang['edittemplate'] = 'Editar Plantilla';
$lang['templatesaved'] = 'La plantilla se guardo con &eacute;xito en la base de datos.';
$lang['errortemplatenameexists'] = 'Existe ya una plantilla con el mismo nombre, por favor elija un nombre diferente.';
$lang['error_filenotfound_defaulttemplate'] = 'El archivo de plantilla para esta plantilla no fu&eacute; encontrado.';
$lang['thumbnail'] = 'Miniatura';
$lang['title'] = 'T&iacute;tulo';
$lang['uploadpicture'] = 'Subir una imagen';
$lang['upload'] = 'Subir';
$lang['view'] = 'Ver';
$lang['options'] = 'Opciones';
$lang['optionsupdated'] = 'Las opciones se actualizaron con &eacute;xito.';
$lang['defaultrows'] = 'M&aacute;x n&uacute;mero de filas de miniaturas por defecto para &aacute;lbums nuevos (0 significa ilimitadas. S&oacute;lo utilizado en plantillas Tablas)';
$lang['defaultcolumns'] = 'M&aacute;x n&uacute;mero de columnas de miniaturas por defecto para &aacute;lbums nuevos (0 significa ilimitadas. S&oacute;lo utilizado en plantillas Tablas)';
$lang['defaulttemplate'] = 'Plantilla por Defecto';
$lang['file_templates'] = 'Plantillas Disponibles';
$lang['filename'] = 'Nombre del Archivo';
$lang['importtemplate'] = 'Importar Plantilla';
$lang['newtemplate'] = 'Nombre para la nueva plantilla';
$lang['defaultalbumpage'] = 'P&aacute;gina por defecto que contiene el &Aacute;lbum. Esta p&aacute;gina deber&aacute; ser una p&aacute;gina del tipo &quot;&Aacute;lbum&quot; o contener el tag &Aacute;lbum. Requerido si usted utiliza la recientemente actualizada categor&iacute;a de actualizaci&oacute;n.';
$lang['album_comment_updated'] = 'Los comentarios del &aacute;lbum fueron actualizados con &eacute;xito.';
$lang['picture_comment_updated'] = 'Los comentarios de fotos fueron actualizados con &eacute;xito.';
$lang['template_deleted'] = 'Se elimin&oacute; con &eacute;xito la plantilla de la base de datos';
$lang['error_empty_template'] = 'Error: La plantilla con nombre &quot;%s&quot; que este &Aacute;lbum tiene configurada para usar no existe. Por favor vaya al Panel de Administraci&oacute;n del &Aacute;lbum y asigne una plantilla diferente para este &Aacute;lbum.';
$lang['run_upgrade_script'] = 'Correr el Script de Actualizaci&oacute;n';
$lang['addcategory'] = 'A&ntilde;adir Categor&iacute;a';
$lang['categories'] = 'Categor&iacute;as';
$lang['nocategories'] = 'A&uacute;n no has a&ntilde;adido ninguna categor&iacute;a.';
$lang['categorynametext'] = 'Nombre de la Categor&iacute;a';
$lang['categoryidtext'] = 'ID de la Categor&iacute;a';
$lang['categoryreordertext'] = 'Reordenar Categor&iacute;a';
$lang['categoryactionstext'] = 'Acciones';
$lang['categoryadded'] = 'La categor&iacute;a se agrego con &eacute;xito a la base de datos.';
$lang['categorymoved'] = 'La categor&iacute;a se movi&oacute; con &eacute;xito.';
$lang['categoryupdated'] = 'La categor&iacute;a se actualiz&oacute; con &eacute;xito.';
$lang['editcategory'] = 'Editar Categor&iacute;a';
$lang['categorydeleted'] = 'La categor&iacute;a se elimin&oacute; con &eacute;xito.';
$lang['error_nocategorynamegiven'] = 'Usted debe dar un nombre a su categor&iacute;a.';
$lang['category_listings'] = 'Listado de Categor&iacute;as';
$lang['album_updated'] = 'El &aacute;lbum se actualiz&oacute; con &eacute;xito.';
$lang['uncategorized'] = '&Aacute;lbums sin Categorizar';
$lang['automatic_album_list_template'] = 'Autom&aacute;tico (usa plantillas asignadas a cada &aacute;lbum)';
$lang['albummoved'] = 'El &aacute;lbum se movi&oacute; con &eacute;xito.';
$lang['helpdetailpage'] = '<p>P&aacute;gina para mostrar en su interior &Aacute;lbumes.  Esto puede ser un alias de p&aacute;gina o un id. Utilizado para permitir que fotos del &Aacute;lbum sean mostradas en diferentes p&aacute;ginas tomadas del listado del album.</p> <p>Ejemplo de uso:</p><pre>{cms_module module=&#039;album&#039; detailpage=&#039;album&#039;}</pre>';
$lang['help_template'] = '<h3>Importantes secretos para modificar plantillas</h3>
<h4>&iexcl;Habilitar modo debug!</h4>
<p>A menos que usted habilite modo debug, errores de importancia respecto a variables indefinidas de la plantilla estar&aacute;n ocultos, &iexcl;haciendo muy dif&iacute;cil la investigaci&oacute;n de fallas en las plantillas!</p>
<p>Usted puede habilitar el modo debug abriendo a config.php y estableciendo:</p>
<code>$config[&#039;debug&#039;] = true;<code>

<h3>Lista de &Aacute;lbum</h3>

<p>Usted puede usar el tag smarty {$albums} que es un array. Cada uno de sus elementos es uno de los &aacute;lbums elegidos.
La estructura de un &aacute;lbum se describe en el siguiente cap&iacute;tulo.
Para mostrar los &aacute;lbums, use un lazo <code>{foreach from=$albums item=album}{/foreach}</code></p>

<h3>&Aacute;lbum</h3>
<p>Si s&oacute;lo hay un &aacute;lbum, o si un &aacute;lbum espec&iacute;fico es elegido, usted puede usar el tag {$album}. Le permitir&aacute; acceder a los siguientes items :</p>
<ul>
	<li>{$album->name} : nombre</li>
	<li>{$album->comment} : comentario</li>
	<li>{$album->columns} : n&uacute;mero de columna</li>
	<li>{$album->rows} : n&uacute;mero de fila</li>
	<li>{$album->thumbnail} : direcci&oacute;n (url) de miniatura</li>
	<li>{$album->link} : enlace al &aacute;lbum</li>
	<li>{$album->picturecount} : n&uacute;mero de fotos de un &aacute;lbum</li>
</ul>

<h3>Lista de Im&aacute;genes</h3>
<p>Si se elije un &aacute;lbum, usted puede usar el tag {$pictures} que es un array de arrays : contiene filas que contienen fotos.
La estructura de una foto se describe en el cap&iacute;tulo siguiente.
Para mostrar la lista de im&aacute;genes, utilice el siguiente lazo:
<code>{foreach from=$pictures item=picturesrow}
	{foreach from=$picturesrow item=onepicture}
	{/foreach}
{/foreach}</code></p>

<h3>Foto</h3>
<p>Si se elije una foto, usted puede usar el tag {$picture}. Se pone autom&aacute;ticamente a la primera foto del &aacute;lbum si no se elije ninguna foto.</p>
<ul>
	<li>{$picture->name} : nombre</li>
	<li>{$picture->comment} : comentario</li>
	<li>{$picture->comment2} : comentario2</li>
	<li>{$picture->comment3} : comentario3</li>
	<li>{$picture->thumbnail} : direcci&oacute;n (url) de miniatura</li>
	<li>{$picture->picture} : direcci&oacute;n (url) de foto</li>
	<li>{$picture->link} : enlace a foto</li>
	<li>{$picture->number} : n&uacute;mero de foto</li>
	<li>{$picture->thumbnailwidth}: ancho de miniatura</li>
	<li>{$picture->thumbnailheight}: alto de miniatura</li>
	<li>{$picture->autothumbnailsize}: entrega algo as&iacute; como &#039;height=&quot;76&quot;&#039; para hacer que la altura de la miniatura entre en una caja</li>
	<li>{$max_image_size}: El valor de la preferencia max_image_size. Usado en la plantilla por defecto para autom&aacute;ticamente re-dimensionar las im&aacute;genes muy grandes.</li>
</ul>
<h3>Otros</h3>
<p>Usted puede tambi&eacute;n usar los siguientes tags :</p>
<ul>
	<li>{$returnlink} : volver a p&aacute;gina anterior</li>
	<li>{$albumnumber} : n&uacute;mero del actual &aacute;lbum</li>
	<li>{$albumcount} : cuenta de &aacute;lbum</li>
	<li>{$picturenumber} : n&uacute;mero de foto actual</li>
	<li>{$picturecount} : cuenta de foto</li>
	<li>{$pagenumber} : n&uacute;mero de p&aacute;gina actual</li>
	<li>{$pagecount} : cuenta de p&aacute;gina</li>
	<li>{$link.album.1} : enlace al primer &aacute;lbum. Se puede indicar cualquier n&uacute;mero</li>
	<li>{$link.album.first}, {$link.album.previous}, {$link.album.next}, {$link.album.last}</li>
	<li>{$link.picture.1} : enlace a la primera foto. Se puede indicar cualquier n&uacute;mero</li>
	<li>{$link.picture.first}, {$link.picture.previous}, {$link.picture.next}, {$link.picture.last}</li>
	<li>{$link.page.1} : enlace a primera p&aacute;gina. Se puede indicar cualquier n&uacute;mero</li>
	<li>{$link.page.first}, {$link.page.previous}, {$link.page.next}, {$link.page.last}</li>
</ul>';
$lang['utma'] = '156861353.805641954.1192475049.1195395157.1195398117.64';
$lang['utmz'] = '156861353.1195118736.55.13.utmccn=(referral)|utmcsr=dev.cmsmadesimple.org|utmcct=/frs/|utmcmd=referral';
$lang['utmc'] = '156861353';
$lang['utmb'] = '156861353';
?>