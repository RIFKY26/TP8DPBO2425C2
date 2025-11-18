<?php
class MajorViews {
    public function render($majors) {
        $controller = 'Major';
        include 'templates/header.php';
        ?>
        <h3>Daftar Jurusan</h3>
        <a href="index.php?controller=Major&action=add" class="btn btn-primary mb-3">Tambah Jurusan</a>
        <table class="table table-striped">
            <thead class="table-dark"><tr><th>ID</th><th>Nama Jurusan</th><th>Aksi</th></tr></thead>
            <tbody>
                <?php while($row = $majors->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?php include 'templates/table_actions.php'; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php include 'templates/footer.php';
    }

    public function renderForm($data = null) {
        $controller = 'Major';
        $action = $data ? 'update&id='.$data['id'] : 'store';
        include 'templates/header.php';
        ?>
        <h3><?= $data ? 'Edit' : 'Tambah' ?> Jurusan</h3>
        <form action="index.php?controller=Major&action=<?= $action ?>" method="POST">
            <div class="mb-3"><label>Nama Jurusan</label><input type="text" name="name" class="form-control" value="<?= $data['name'] ?? '' ?>" required></div>
            <?php include 'templates/form_actions.php'; ?>
        </form>
        <?php include 'templates/footer.php';
    }
}
?>