<?php
include_once __DIR__ . '/../models/Subject.php';
include_once __DIR__ . '/../models/Lecturer.php';
include_once __DIR__ . '/../views/SubjectViews.php';

class SubjectController {
    private $model;
    private $lecturerModel;
    private $view;

    public function __construct($conn) {
        $this->model = new Subject($conn);
        $this->lecturerModel = new Lecturer($conn);
        $this->view = new SubjectViews();
    }

    public function index() {
        $data = $this->model->getAll();
        $this->view->render($data);
    }

    public function add() {
        $lecturers = $this->lecturerModel->getAll();
        $this->view->renderForm(null, $lecturers);
    }

    public function store() {
        $this->model->insert($_POST);
        header("Location: index.php?controller=Subject");
    }

    public function edit($id) {
        $data = $this->model->getById($id);
        $lecturers = $this->lecturerModel->getAll();
        $this->view->renderForm($data, $lecturers);
    }

    public function update($id) {
        $this->model->update($id, $_POST);
        header("Location: index.php?controller=Subject");
    }

    public function delete($id) {
        $this->model->delete($id);
        header("Location: index.php?controller=Subject");
    }
}
?>