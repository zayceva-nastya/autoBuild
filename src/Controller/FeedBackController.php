<?php

namespace Controller;

class FeedBackController extends AbstractTableController
{

    protected $tableName = "feedback";
    
    public function actionAdd(array $data)
    {
     
      // print_r($data);
      if(!empty($data['post']['phone'])&&!empty($data['post']['email'])&&!empty($data['post']['name'])){
        parent::actionAdd($data);
      $this->redirect('/');
      }else{
        $this->redirect('/');
      }
      
        
    }
    public function actionShow(array $data)
    {
        parent::actionShow($data);
        $this
        ->view
        ->setFolder('feedBack')
        ->setTemplate('show');
    }
}
