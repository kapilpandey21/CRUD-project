<?php

namespace App\Controllers;
use App\Models\UserModel;

class Home extends BaseController {
    public function index(): string {
        return view( 'welcome_message' );
    }

    public function insert() {
        $data = [
            'user_name'=>$this->request->getVar('user_name'),
            'user_email'=>$this->request->getVar('user_email'),
            'user_password'=>$this->request->getVar('user_password')
       
        ];
        log_message('error','data [$data]');
        $model = new UserModel();
        $model->insert($data);
        echo "<h1>Data sent Sucessfully...</h1>";
    }
    public function show(){
       
            $model = new UserModel();
            
            $data = [
                'user_name'=>$this->request->getVar('user_name'),
                'user_email'=>$this->request->getVar('user_email'),
                'user_password'=>$this->request->getVar('user_password')
           
            ];
            $model->insert($data);
            log_message('error','data inserted successfully ');
            log_message('error','in this line');
            $data['users'] = $model->findAll();
            return view('display', $data);
    
    }
    public function delete($id = null ){
        echo 'hii';
    
        $model= new UserModel();
        $model->where('user_id',$id)->delete();
        log_message('error', 'deleted id [$id]');
        return redirect()->to(base_url('/'));
    }
    public function edit($id = null){
         $model = new UserModel();
         $data['user'] =  $model ->where('user_id',$id)->first();
         return view ('edit',$data);

    }
    public function update (){
        $data = [
            'user_name'=>$this->request->getVar('user_name'),
            'user_email'=>$this->request->getVar('user_email'),
            'user_password'=>$this->request->getVar('user_password')
       
        ];
        $id=$this->request->getVar('id');
        $model =new UserModel();
        $model->update($id,$data); 
        return redirect()->to(base_url('/show'));        
    }
}
