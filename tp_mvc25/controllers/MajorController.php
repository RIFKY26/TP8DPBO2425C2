<?php
include_once __DIR__ . '/../models/Major.php';
include_once __DIR__ . '/../views/MajorViews.php';

class MajorController {
    private $model;
    private $view;

    public function __construct($conn) {
        $this->model = new Major($conn);
        $this->view = new MajorViews();
    }

    public function index() {
        $data = $this->model->getAll();
        $this->view->render($data);
    }

    public function add() {
        $this->view->renderForm();
    }

    public function store() {
        $this->model->insert($_POST);
        header("Location: index.php?controller=Major");
    }

    public function edit($id) {
        $data = $this->model->getById($id);
        $this->view->renderForm($data);
    }

    public function update($id) {
        $this->model->update($id, $_POST);
        header("Location: index.php?controller=Major");
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?controller=Major");
    }
}
?>