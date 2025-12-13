<?php
$db = new Database();

// Hapus bila ada param ?delete=id
if (isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    $db->delete('artikel', "id={$id}");
    echo "<div style='color:green;padding:8px;'>Artikel dihapus.</div>";
}

// Ambil semua
$rows = $db->getAll('artikel');
?>
<h3>Daftar Artikel</h3>
<a href="/lab11_php_oop/index.php/artikel/tambah" class="btn-primary">
    ➕ Tambah Artikel
</a>
<table border="1" cellpadding="8" cellspacing="0" width="100%">
    <tr>
    <th style="width:50px;">ID</th>
    <th>Judul</th>
    <th>Isi Artikel</th>
    <th style="width:160px;">Aksi</th>
</tr>
    <?php if ($rows): foreach ($rows as $r): ?>
    <tr>
        <td><?=htmlspecialchars($r['id'])?></td>
        <td>
            <strong><?=htmlspecialchars($r['judul'])?></strong>
        </td>

        <td class="artikel-isi">
            <?=htmlspecialchars(substr($r['isi'], 0, 120))?>...
        </td>

        <td class="aksi">
            <a class="edit" href="/lab11_php_oop/index.php/artikel/ubah?id=<?= $r['id'] ?>">✏️ Ubah</a>
            <a class="delete" href="/lab11_php_oop/index.php/artikel/index?delete=<?= $r['id'] ?>" 
            onclick="return confirm('Hapus artikel?')">🗑 Hapus</a>
        </td>

    </tr>
    <?php endforeach; else: ?>
    <tr><td colspan="4">Belum ada artikel.</td></tr>
    <?php endif; ?>
</table>
