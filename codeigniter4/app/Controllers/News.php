<?php

namespace App\Controllers;
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

    public function showById($id){

        $model = model(NewsModel::class);

        $data = [
            'news' => $model->getById($id),
            'title' => "Mostrando por id"
        ];

        if(empty($data['news'])){
            throw new PageNotFoundException("Não existe a notícia para o ID $id");
        }

        return view('templates/header', $data)
                .view('news/view')
                .view('templates/footer');
    }

    //Método que retona a página individual das notícias
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

    //Método que mostra o formulário
    public function new(){
        helper('form');

        return view('templates/header', ['title' => 'Cadastro de nova notícia'])
               .view('news/create')        
               .view('templates/footer');
    }

    //Método que insere os dados no banco
    public function create(){

        helper('form');

        $data = $this->request->getPost(['title', 'body']);

        if(!$this->validateData($data, [
            'title' => 'required|max_length[255]|min_length[10]',
            'body' => 'required|max_length[1000]|min_length[10]'
        ])){
            //A não passou na validação, portanto, mostra o formulário outra vez
            return $this->new();
        }

        //Passou na validação, portanto, insere os dados no banco
        $model = model(NewsModel::class);
        $post = $this->validator->getValidated();

        $model->save([
            'title' => $post['title'],
            'slug' => url_title($post['title'], '-', true),
            'body' => $post['body']
        ]);

        return view('templates/header', ['title' => 'Salvando os dados'])
               .view('news/sucesso')
               .view('templates/footer');
    }

    public function nova(){
        
    }
}