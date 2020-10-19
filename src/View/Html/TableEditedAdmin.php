<?php

namespace View\Html;

class TableEditedAdmin extends Table
{
    protected $type;

    public function setControllerType(string $type)
    {
        $this->type = $type;
        return $this;
    }
    public function setHeaders(array $headers)
    {
        parent::setHeaders($headers);
        $this->headers .= "\t<th></th>\n\t<th></th>\n";
        return $this;
    }

    public function data(array $data)
    {
        $str = "";

        foreach ($data as $row) {
            $str .= "\t<tr>\n";
            foreach ($row as $cell) {
                $str .= "\t\t<td>$cell</td>\n";
            }
            $str .= "\t\t<td><form  action='?action=add&type=answer' method='post'><input type='text' name='answer'><input name='reviews_id' type='hidden' value='$row[id]'><input type='submit'>❌</form></td>\n";
            // $str .= "\t\t<td><a href='?action=showedit&type=$this->type&id=$row[id]'>✏</a></td>\n";
            $str .= "\t</tr>\n";
        }

        $this->data = $str;
        return $this;
    }
}
