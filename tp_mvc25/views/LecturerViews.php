<?php
class LecturerViews {
    public function render($lecturers) {
        $controller = 'Lecturer';
        include 'templates/header.php';
        ?>
        <h3>Daftar Dosen</h3>
        <a href="index.php?controller=Lecturer&action=add" class="btn btn-primary mb-3">Tambah Dosen</a>
        <table class="table table-striped">
            <thead class="table-dark"><tr><th>ID</th><th>Nama</th><th>NIDN</th><th>Jurusan</th><th>Aksi</th></tr></thead>
            <tbody>
                <?php while($row = $lecturers->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['nidn'] ?></td>
                    <td><?= $row['major_name'] ?></td>
                    <td><?php include 'templates/table_actions.php'; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php include 'templates/footer.php';
    }

    public function renderForm($data = null, $majors = null) {
        $controller = 'Lecturer';
        $action = $data ? 'update&id='.$data['id'] : 'store';
        include 'templates/header.php';
        ?>
        <h3><?= $data ? 'Edit' : 'Tambah' ?> Dosen</h3>
        <form action="index.php?controller=Lecturer&action=<?= $action ?>" method="POST">
            <div class="mb-3"><label>Nama</label><input type="text" name="name" class="form-control" value="<?= $data['name'] ?? '' ?>" required></div>
            <div class="mb-3"><label>NIDN</label><input type="text" name="nidn" class="form-control" value="<?= $data['nidn'] ?? '' ?>" required></div>
            <div class="mb-3"><label>No HP</label><input type="text" name="phone" class="form-control" value="<?= $data['phone'] ?? '' ?>"></div>
            <div class="mb-3"><label>Tanggal Gabung</label><input type="date" name="join_date" class="form-control" value="<?= $data['join_date'] ?? '' ?>"></div>
            <div class="mb-3"><label>Jurusan</label>
                <select name="major_id" class="form-control">
                    <?php while($m = $majors->fetch_assoc()): ?>
                        <option value="<?= $m['id'] ?>" <?= (isset($data) && $data['major_id'] == $m['id']) ? 'selected' : '' ?>><?= $m['name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <?php include 'templates/form_actions.php'; ?>
        </form>
        <?php include 'templates/footer.php';
    }
}
?>