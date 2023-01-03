<h1>HomePage</h1>
<?php echo getFlash("successCreate") ?>
<?php echo getFlash("Delete") ?>
<?php echo getFlash("Login") ?>
<?php echo getFlash("update") ?>


<?php allUsers() ?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($_SESSION['users'] as $value):?>
        <tr>
            <th scope="row"><?php echo $value->id; ?></th>
            <td><?php echo $value->name; ?></td>
            <td><?php echo $value->sobrenome; ?></td>
            <td><?php echo $value->email; ?></td>
        </tr>
    <?php endforeach; ?>
  </tbody>
</table>