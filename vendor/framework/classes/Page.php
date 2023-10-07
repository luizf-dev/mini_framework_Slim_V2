<?php

//! $tpl:
//* É um objeto da classe RainTPL, responsável por gerenciar os templates
//* e renderizar o conteúdo. Ele será utilizado para carregar e renderizar os templates.

//!Atributo $options:
//* É um array que armazena as opções personalizadas que podem ser passadas
//* para a classe Page. Essas opções podem ser configuradas para controlar o comportamento
//* da página, como exibir ou não o cabeçalho e rodapé, definir dados para serem utilizados 
//*nos templates, entre outros.

//! Atributo $defaults: 
//* É um array que contém as opções padrão da classe Page.
//* Se alguma opção personalizada não for fornecida, esses valores serão utilizados 
//*por padrão. As opções padrão incluem a exibição do cabeçalho e rodapé, além de um
//* array vazio para armazenar dados.


namespace framework;

use Rain\Tpl;

class Page{

    private $tpl;               //? 
    private $options = [];      //? Opções personalizadas
    private $defaults = [       //?  Opções padrão
        "header"=>true,
        "footer"=>true,
        "navbar"=>true,
        "footerConfig"=>true,
        "data"=>[]        
    ];

     /*
     * Método construtor da classe Page.
     * 1 parametro $opts para as Opções personalizadas no template
     * 2 parametro $tpl_dir para o caminho do Diretório dos templates
     */
    public function __construct($opts = array(),  $tpl_dir = "views/"){

        //* Mescla as opções passadas com as opções padrão
        $this->options = array_merge($this->defaults, $opts);

        //* Configuração do RainTPL
        $config = array(
            "tpl_dir"   => $tpl_dir,
            "cache_dir" => "../views-cache/",
            "debug" => true
           );

        //* Configura o RainTPL com as opções fornecidas no array acima
        Tpl::configure( $config );

        //* Instancia o objeto RainTPL
        $this->tpl = new Tpl;

        //* Define os dados a serem utilizados no template
        $this->setData($this->options["data"]);  

        //* Desenha o cabeçalho, se a opção "header" estiver habilitada
        //* Renderiza  navbar se a opção "navbar" estiver habilitada
        if ($this->options["header"] === true) $this->tpl->draw("header");
        if($this->options["navbar"] === true) $this->tpl->draw("navbar");
    }

    /*
     * Define os dados a serem atribuídos no template.
     * parametro $data array vazio para os Dados a serem atribuídos
     */
    private function setData($data = array()){

        //* Define os dados a serem atribuídos no template
        foreach($data as $key => $value){
            $this->tpl->assign($key, $value);
        }
    }


    /*
     * Define o template a ser utilizado e renderiza o conteúdo.
     * 1 parametro $name é o Nome do template
     * 2 parametro $data são os Dados a serem atribuídos no template
     * 3 parametro $returnHTML Indica se deve retornar o HTML ou imprimir na saída
     */
    public function renderPage($name, $data = array(), $returnHTML = false){

        //* Define os dados a serem utilizados no template
        $this->setData($data);   
        
        //* Renderiza o template especificado e retorna o HTML ou imprime na saída
        return $this->tpl->draw($name, $returnHTML);
    }


    //* Método destrutor da classe Page.
    public function __destruct(){
     
        //*Desenha o rodapé, se a opção "footer" estiver habilitada
        //*Renderiza os links de dependencias e javascript se a opção "footerConfig" estiver habilitada
        if ($this->options['footer'] === true) $this->tpl->draw("footer");
        if($this->options["footerConfig"] === true) $this->tpl->draw("footerConfig");
    }
}