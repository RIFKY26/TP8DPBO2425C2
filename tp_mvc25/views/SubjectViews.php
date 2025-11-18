<?php
class SubjectViews {
    public function render($subjects) {
        $controller = 'Subject';
        include 'templates/header.php';
        ?>
        <h3>Daftar Mata Kuliah</h3>
        <a href="index.php?controller=Subject&action=add" class="btn btn-primary mb-3">Tambah Matkul</a>
        <table class="table table-striped">
            <thead class="table-dark"><tr><th>Kode</th><th>Nama Matkul</th><th>SKS</th><th>Dosen</th><th>Aksi</th></tr></thead>
            <tbody>
                <?php while($row = $subjects->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['subject_code'] ?></td>
                    <td><?= $row['subject_name'] ?></td>
                    <td><?= $row['sks'] ?></td>
                    <td><?= $row['lecturer_name'] ?></td>
                    <td><?php include 'templates/table_actions.php'; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php include 'templates/footer.php';
    }

    public function renderForm($data = null, $lecturers = null) {
        $controller = 'Subject';
        $action = $data ? 'update&id='.$data['id'] : 'store';
        include 'templates/header.php';
        ?>
        <h3><?= $data ? 'Edit' : 'Tambah' ?> Mata Kuliah</h3>
        <form action="index.php?controller=Subject&action=<?= $action ?>" method="POST">
            <div class="mb-3"><label>Kode Matkul</label><input type="text" name="subject_code" class="form-control" value="<?= $data['subject_code'] ?? '' ?>" required></div>
            <div class="mb-3"><label>Nama Matkul</label><input type="text" name="subject_name" class="form-control" value="<?= $data['subject_name'] ?? '' ?>" required></div>
            <div class="mb-3"><label>SKS</label><input type="number" name="sks" class="form-control" value="<?= $data['sks'] ?? '' ?>" required></div>
            <div class="mb-3"><label>Dosen Pengampu</label>
                <select name="lecturer_id" class="form-control">
                    <?php while($l = $lecturers->fetch_assoc()): ?>
                        <option value="<?= $l['id'] ?>" <?= (isset($data) && $data['lecturer_id'] == $l['id']) ? 'selected' : '' ?>><?= $l['name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <?php include 'templates/form_actions.php'; ?>
        </form>
        <?php include 'templates/footer.php';
    }
}
?>