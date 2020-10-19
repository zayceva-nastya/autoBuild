<?php

namespace View\Html;

class TableforAnswer extends Table
{
    protected $type;

    public function setControllerType(string $type)
    {
        $this->type = $type;
        return $this;
    }
    // public function setHeaders(array $headers)
    // {
    //     parent::setHeaders($headers);
    //     $this->headers .= "\t<th></th>\n\t<th></th>\n";
    //     return $this;
    // }

    public function data(array $data)
    {
        $str = "";

        foreach ($data as $row) {
            $str .= "";
            foreach ($row as $key=>$cell) {
                if($key == 'text'){
                    $str .= "\t\t<td class='text'>$cell</td>\n";
                }if($key == 'user_name'){
                    $str .= "\t\t<td class='user_name'>$cell</td>\n";
                }if($key == 'photo'){
                    $str .= "\t\t<td class='photo'>$cell</td>\n";
                }
                if($key== 'answer'){
                     $str .= "\t\t<td class='answer'>$cell</td>\n";
                }
               
            }
            $str .= "\t\t<td><form  action='?action=add&type=adminanswer' method='post'><input type='text' name='answer'><input type='hidden' name='id'value='$row[id]'><input type='submit'>❌</form></td>\n";
            $str .= "<a href='?action=del&type=$this->type&id=$row[id]'>❌</a>\n";
            $str .= "<a href='?action=showedit&type=$this->type&id=$row[id]'>✏</a>\n";
            $str .= "\t</tr>\n";
        
         
        }

        $this->data = $str;
        return $this;
    }
}
