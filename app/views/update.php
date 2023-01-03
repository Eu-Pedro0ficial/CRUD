<h1>Update User</h1>
<?php echo getFlash("errorCreate") ?>

<form action="/?controllers=update" method="post">
    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" class="form-control" name="name" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label class="form-label">Lastname</label>
        <input type="text" class="form-control" name="sobrenome" aria-describedby="emailHelp">
    </div>

    <div class="mb-3">
        <label class="form-label">Email address</label>
        <input type="email" class="form-control" name="email" aria-describedby="emailHelp">
    </div>


    <button type="submit" class="btn btn-primary">Update</button>
</form>