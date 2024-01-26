<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\NewsModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class News extends BaseController{

    public function index(){

        $model = model(NewsModel::class);

        $data = [
            'news' => $model->getNews(),
            'title' => "Notícias do Banco de Dados",
        ];

        return view('templates/header', $data)
                .view('news/index')
                .view('templates/footer');
    }

    public function show($slug = null){

        $model = new NewsModel();
        $data['news'] = $model->getNews($slug);

        if(empty($data['news'])){
            throw new PageNotFoundException("Não encontramos essa notícia: ". $slug);
        }

        $data['title'] = $data['news']['title'];
        
        return view('templates/header', $data)
                .view('news/view')
                .view('templates/footer');
    }
}