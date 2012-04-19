<table>
<tr><th>Session Title</th><th>Campaign ID</th><th>Slug</th></tr>
<?php foreach ($session as $s) : ?>
	<tr>
		<td><?php echo $s['title']; ?></td>
		<td><?php echo $s['campaign']; ?></td>
		<td><a href="<?php echo site_url('session/view/'.$s['slug']); ?>">
			<?php echo $s['slug']; ?></a></td>
	</tr>
<?php endforeach; ?>
