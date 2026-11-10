<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="page-banner"><div><h1>Keranjang Belanja</h1><div class="crumb"><a href="<?php echo base_url(); ?>">Home</a> &nbsp;/&nbsp; <span>Keranjang</span></div></div></section>
<main class="container-site">
<?php if ($this->session->flashdata('message')): ?><div class="alert"><?php echo html_escape($this->session->flashdata('message')); ?></div><?php endif; ?>
<div style="max-width:900px;margin:18px auto;background:#fff;border:1px solid #e1e5e9;border-radius:6px;padding:18px">
<?php if (empty($items)): ?>
<p>Keranjang masih kosong.</p><a class="btn-shop" href="<?php echo base_url(); ?>">Lihat Produk</a>
<?php else: ?>
<div style="overflow-x:auto"><table style="width:100%;border-collapse:collapse">
<thead><tr><th style="text-align:left;padding:10px;border-bottom:1px solid #ddd">Produk</th><th style="padding:10px;border-bottom:1px solid #ddd">Harga</th><th style="padding:10px;border-bottom:1px solid #ddd">Jumlah</th><th style="padding:10px;border-bottom:1px solid #ddd">Subtotal</th><th style="padding:10px;border-bottom:1px solid #ddd">Aksi</th></tr></thead>
<tbody>
<?php foreach ($items as $item): ?>
<tr>
<td style="padding:10px;border-bottom:1px solid #eee"><?php echo html_escape($item['nama']); ?></td>
<td style="padding:10px;border-bottom:1px solid #eee">Rp <?php echo number_format((float)$item['harga'],0,',','.'); ?></td>
<td style="padding:10px;border-bottom:1px solid #eee;text-align:center"><?php echo (int)$item['jumlah']; ?></td>
<td style="padding:10px;border-bottom:1px solid #eee">Rp <?php echo number_format((float)$item['subtotal'],0,',','.'); ?></td>
<td style="padding:10px;border-bottom:1px solid #eee"><a href="<?php echo base_url('keranjang/hapus/'.$item['id_produk']); ?>" onclick="return confirm('Hapus produk ini dari keranjang?')">Hapus</a></td>
</tr>
<?php endforeach; ?>
</tbody></table></div>
<p style="text-align:right;font-size:18px;font-weight:bold">Total: Rp <?php echo number_format((float)$total,0,',','.'); ?></p>
<a class="btn-shop" href="<?php echo base_url(); ?>">Lanjut Belanja</a>
<?php endif; ?>
</div></main>
