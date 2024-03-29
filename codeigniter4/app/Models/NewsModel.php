<?php

namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\View\Parser;

class NewsModel extends Model{

    protected $table = "news";
    protected $allowedFields = ['title', 'slug', 'body'];

    public function getNews($slug = false){

        if($slug === false){
            return $this->findAll();
        }

        return $this->where(['slug' => $slug])->first();
    }

    public function getById($id){
        return $this->where(['Id' => $id])->first();
    }

}