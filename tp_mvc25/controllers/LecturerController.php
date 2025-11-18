<?php
include_once __DIR__ . '/../models/Lecturer.php';
include_once __DIR__ . '/../models/Major.php';
include_once __DIR__ . '/../views/LecturerViews.php';

class LecturerController {
    private $model;
    private $majorModel;
    private $view;

    public function __construct($conn) {
        $this->model = new Lecturer($conn);
        $this->majorModel = new Major($conn);
        $this->view = new LecturerViews();
    }

    public function index() {
        $data = $this->model->getAll();
        $this->view->render($data);
    }

    public function add() {
        $majors = $this->majorModel->getAll();
        $this->view->renderForm(null, $majors);
    }

    public function store() {
        $this->model->insert($_POST);
        header("Location: index.php?controller=Lecturer");
    }

    public function edit($id) {
        $data = $this->model->getById($id);
        $majors = $this->majorModel->getAll();
        $this->view->renderForm($data, $majors);
    }

    public function update($id) {
        $this->model->update($id, $_POST);
        header("Location: index.php?controller=Lecturer");
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?controller=Lecturer");
    }
}
?>