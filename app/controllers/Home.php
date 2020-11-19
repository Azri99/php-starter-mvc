<?php
class Home extends Controller{
    public function index($name = ''){
        $this->session_set('user', ' Azri');
        $this->session_set('user2', ' Ahmad');
        $this->session_exit('user');
        $user = $this->model('User');
        $result = $user->select('select * from Table_1 where id = ?', [2]);
        $this->view('home/index', $result);
    }

}