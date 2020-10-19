<?php

namespace Model;

use TexLab\MyDB\DbEntity;

class ReviewModel extends DbEntity
{
    public function getreviews()
    {
        return $this
            ->reset()
            ->setSelect('`reviews`.`id`,`reviews`.`text`,`reviews`.`user_name`,`reviews`.`photo`,`reviews`.`answer`   ')
            ->setFrom('`reviews`,`users`')
            ->setWhere('`users`.`id`=`reviews`.`users_id`')
            ->get();
    }
    public function getIdReview()
    {
       $data = $this
            ->reset()
            ->setSelect('`reviews`.`id`')
            ->setFrom('`reviews`')
            ->get();
            $result = [];
            foreach ($data as $row) {
                $result=$row['id'] ;
            }
            return $result;
    }
    public function getanswer()
    {
        return $this 
            ->reset()
            ->setSelect('`reviews`.`text`,`answer`.`answer`')
            ->setFrom('`reviews`,`answer`')
            ->setWhere('`reviews`.`id`=`answer`.`reviews_id`')
            ->setOrderBy('`reviews`.`id`')
            ->get();
    }
    public function answerAdd($data,$rev_id)
    {
        return $this->runSQL("UPDATE `reviews` SET `answer`='$data' where `id`=$rev_id ");
    }
}
// `reviews`.`text`,`reviews`.`user_name`,`reviews`.`photo`,`answer`.`answer` FROM `reviews`,`answer` WHERE `reviews`.`id`=`answer`.`reviews_id`