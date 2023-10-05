<div class="page-header">
    <h1>MODIFIER UN INGRÉDIENT</h1>
</div>
<form action="ingredients/edit/<?= $ingredient['id'];?>" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" id="name" name="name" value="<?= $ingredient['name'];?>" />
    </div>
    <div class="form-group">
        <label for="unit">Unit</label>
        <input class="form-control" type="text" id="unit" name="unit" value="<?= $ingredient['unit'];?>" />
    </div>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>
