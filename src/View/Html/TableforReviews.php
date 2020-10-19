<?php

namespace View\Html;

class TableforReviews extends Table
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
            foreach ($row as $key => $cell) {
                if ($key != 'users_id') {
                    if ($key == 'text') {
                        $str .= "\t\t<td class='text'>$cell</td>\n";
                    }
                    if ($key == 'user_name') {
                        $str .= "\t\t<td class='user_name'>$cell</td>\n";
                    }
                    if ($key == 'photo') {
                        $str .= "\t\t<td class='photo'>$cell</td>\n";
                    }
                    if ($key == 'answer' && !empty($row['answer'])) {
                        $str .= "\t\t<td class='answer'>$cell</td>\n";
                    }else{
                        
                    }
            }}
                $str .= "\t\t<td class='del'><a href='?action=del&type=$this->type&id=$row[id]'>delete</a></td>\n";
                $str .= "\t\t<td class='edit'><a href='?action=showedit&type=$this->type&id=$row[id]'>edit</a></td>\n";
                $str .= "\t</tr>\n";
            
        }

        $this->data = $str;
        return $this;
    }
}
