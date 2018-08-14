<?php
/**
 * Created by PhpStorm.
 * User: jean
 * Date: 13/08/18
 * Time: 20:44
 */

class Collaborator extends AppModel
{
    public $validate = array(
        'name' => array(
            'rule' => 'notBlank'
        ),
        'telephone' => array(
            'rule' => 'notBlank'
        ),
        'cpf' => array(
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create',
                'message' => 'CPF já em uso'
            )
        ),
        'email' => array(
            'unique' => array(
                'rule' => 'isUnique',
                'required' => 'create',
                'message' => 'E-mail já em uso'
            )
        ),

    );

    public function beforeSave($options = array())
    {
        if (!empty($this->data['Collaborator']['img']['name'])) {
            $this->data['Collaborator']['img'] = $this->upload($this->data['Collaborator']['img']);
        } else {
            unset($this->data['Collaborator']['img']);
        }
    }

    public function upload($imagem = array(), $dir = 'img')
    {
        $dir = WWW_ROOT . $dir . DS;

        if (($imagem['error'] != 0) and ($imagem['size'] == 0)) {
            throw new NotImplementedException('Ocorreu um problema, o upload retornou erro ' . $imagem['error'] . ' e tamanho ' . $imagem['size']);
        }
        $this->checa_dir($dir);
        $imagem = $this->checa_nome($imagem, $dir);
        $this->move_arquivos($imagem, $dir);
        return $imagem['name'];
    }

    public function checa_dir($dir)
    {
        App::uses('Folder', 'Utility');
        $folder = new Folder();
        if (!is_dir($dir)) {
            $folder->create($dir);
        }
    }

    public function checa_nome($imagem, $dir)
    {
        $imagem_info = pathinfo($dir . $imagem['name']);
        $imagem_nome = $this->trata_nome($imagem_info['filename']) . '.' . $imagem_info['extension'];
        debug($imagem_nome);
        $conta = 2;
        while (file_exists($dir . $imagem_nome)) {
            $imagem_nome = $this->trata_nome($imagem_info['filename']) . '-' . $conta;
            $imagem_nome .= '.' . $imagem_info['extension'];
            $conta++;
            debug($imagem_nome);
        }
        $imagem['name'] = $imagem_nome;
        return $imagem;
    }

    public function trata_nome($imagem_nome)
    {
        $imagem_nome = strtolower(Inflector::slug($imagem_nome, '-'));
        return $imagem_nome;
    }

    public function move_arquivos($imagem, $dir)
    {
        App::uses('File', 'Utility');
        $arquivo = new File($imagem['tmp_name']);
        $arquivo->copy($dir . $imagem['name']);
        $arquivo->close();
    }
}