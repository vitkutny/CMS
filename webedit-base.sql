<!DOCTYPE html>
<html lang="cs" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Script-Type" content="text/javascript">
<meta name="robots" content="noindex">
<title>Export: webedit - Adminer</title>
<link rel="stylesheet" type="text/css" href="?file=default.css&amp;version=4.1.0&amp;driver=mysql">
<script type="text/javascript" src="?file=functions.js&amp;version=4.1.0&amp;driver=mysql"></script>
<link rel="shortcut icon" type="image/x-icon" href="?file=favicon.ico&amp;version=4.1.0&amp;driver=mysql">
<link rel="apple-touch-icon" href="?file=favicon.ico&amp;version=4.1.0&amp;driver=mysql">
<link rel="stylesheet" type="text/css" href="adminer.css">

<body class="ltr nojs" onkeydown="bodyKeydown(event);" onclick="bodyClick(event);">
<script type="text/javascript">
document.body.className = document.body.className.replace(/ nojs/, ' js');
</script>

<div id="help" class="jush-sql jsonly hidden" onmouseover="helpOpen = 1;" onmouseout="helpMouseout(this, event);"></div>

<div id="content">
<p id="breadcrumb"><a href=".">MySQL</a> &raquo; <a href='?username=root' accesskey='1' title='Alt+Shift+1'>Server</a> &raquo; <a href="?username=root&amp;db=webedit">webedit</a> &raquo; Export
<h2>Export: webedit</h2>

<form action="" method="post">
<table cellspacing="0">
<tr><th>Výstup<td><label><input type='radio' name='output' value='text' checked>otevřít</label><label><input type='radio' name='output' value='file'>uložit</label><label><input type='radio' name='output' value='gz'>gzip</label>
<tr><th>Formát<td><label><input type='radio' name='format' value='sql' checked>SQL</label><label><input type='radio' name='format' value='csv'>CSV,</label><label><input type='radio' name='format' value='csv;'>CSV;</label><label><input type='radio' name='format' value='tsv'>TSV</label>
<tr><th>Databáze<td><select name='db_style'><option selected><option>USE<option>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='routines' value='1' checked>Procedury a funkce</label><label><input type='checkbox' name='events' value='1' checked>Události</label><tr><th>Tabulky<td><select name='table_style'><option><option selected>DROP+CREATE<option>CREATE</select><label><input type='checkbox' name='auto_increment' value='1'>Auto Increment</label><label><input type='checkbox' name='triggers' value='1' checked>Triggery</label><tr><th>Data<td><select name='data_style'><option><option>TRUNCATE+INSERT<option selected>INSERT<option>INSERT+UPDATE</select></table>
<p><input type="submit" value="Export">
<input type="hidden" name="token" value="1038050:330545">

<table cellspacing="0">
<thead><tr><th style='text-align: left;'><label class='block'><input type='checkbox' id='check-tables' checked onclick='formCheck(this, /^tables\[/);'>Tabulky</label><th style='text-align: right;'><label class='block'>Data<input type='checkbox' id='check-data' checked onclick='formCheck(this, /^data\[/);'></label></thead>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='menu' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">menu</label><td align='right'><label class='block'><span id='Rows-menu'></span><input type='checkbox' name='data[]' value='menu' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<tr><td><label class='block'><input type='checkbox' name='tables[]' value='menu_group' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-tables&#039;);">menu_group</label><td align='right'><label class='block'><span id='Rows-menu_group'></span><input type='checkbox' name='data[]' value='menu_group' checked onclick="checkboxClick(event, this); formUncheck(&#039;check-data&#039;);"></label>
<script type='text/javascript'>ajaxSetHtml('?username=root&db=webedit&script=db');</script>
</table>
</form>
<p><a href='?username=root&amp;db=webedit&amp;dump=menu%25'>menu</a></div>

<form action='' method='post'>
<div id='lang'>Jazyk: <select name='lang' onchange="this.form.submit();"><option value="en">English<option value="ar">العربية<option value="bn">বাংলা<option value="ca">Català<option value="cs" selected>Čeština<option value="de">Deutsch<option value="es">Español<option value="et">Eesti<option value="fa">فارسی<option value="fr">Français<option value="hu">Magyar<option value="id">Bahasa Indonesia<option value="it">Italiano<option value="ja">日本語<option value="ko">한국어<option value="lt">Lietuvių<option value="nl">Nederlands<option value="no">Norsk<option value="pl">Polski<option value="pt">Português<option value="pt-br">Português (Brazil)<option value="ro">Limba Română<option value="ru">Русский язык<option value="sk">Slovenčina<option value="sl">Slovenski<option value="sr">Српски<option value="ta">த‌மிழ்<option value="th">ภาษาไทย<option value="tr">Türkçe<option value="uk">Українська<option value="vi">Tiếng Việt<option value="zh">简体中文<option value="zh-tw">繁體中文</select> <input type='submit' value='Vybrat' class='hidden'>
<input type='hidden' name='token' value='880725:503174'>
</div>
</form>
<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Odhlásit" id="logout">
<input type="hidden" name="token" value="1038050:330545">
</p>
</form>
<div id="menu">
<h1>
<a href='http://www.adminer.org/' target='_blank' id='h1'>Adminer</a> <span class="version">4.1.0</span>
<a href="http://www.adminer.org/#download" target="_blank" id="version"></a>
</h1>
<script type="text/javascript" src="?file=jush.js&amp;version=4.1.0&amp;driver=mysql"></script>
<script type="text/javascript">
var jushLinks = { sql: [ '?username=root&db=webedit&table=$&', /\b(menu|menu_group)\b/g ] };
jushLinks.bac = jushLinks.sql;
jushLinks.bra = jushLinks.sql;
jushLinks.sqlite_quo = jushLinks.sql;
jushLinks.mssql_bra = jushLinks.sql;
bodyLoad('5.5');
</script>
<form action="">
<p id="dbs">
<input type="hidden" name="username" value="root"><span title='databáze'>DB</span>: <select name='db' onmousedown='dbMouseDown(event, this);' onchange='dbChange(this);'><option value=""><option>information_schema<option>mysql<option>performance_schema<option selected>webedit<option>wrateit</select><input type='submit' value='Vybrat' class='hidden'>
<input type="hidden" name="dump" value=""></p></form>
<p class='links'><a href='?username=root&amp;db=webedit&amp;sql='>SQL příkaz</a>
<a href='?username=root&amp;db=webedit&amp;import='>Import</a>
<a href='?username=root&amp;db=webedit&amp;dump=' id='dump' class='active '>Export</a>
<a href="?username=root&amp;db=webedit&amp;create=">Vytvořit tabulku</a>
<p id='tables' onmouseover='menuOver(this, event);' onmouseout='menuOut(this);'>
<a href="?username=root&amp;db=webedit&amp;select=menu">vypsat</a> <a href="?username=root&amp;db=webedit&amp;table=menu" title='Zobrazit strukturu'>menu</a><br>
<a href="?username=root&amp;db=webedit&amp;select=menu_group">vypsat</a> <a href="?username=root&amp;db=webedit&amp;table=menu_group" title='Zobrazit strukturu'>menu_group</a><br>
</div>
<script type="text/javascript">setupSubmitHighlight(document);</script>
