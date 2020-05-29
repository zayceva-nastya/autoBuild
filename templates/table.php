<?php

echo View\Html\Html::create('TableEdited')->data($table)->class('table')->html();

?>
<form method="POST" action="?action=add" class="form">
    <textarea name='text'></textarea>
    <input name='name' type="text" value='name'>
    <input type="submit" value='OK'>
</form>