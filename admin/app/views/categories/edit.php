<div class="page-header">
    <h1>MODIFIER UNE CATÉGORIE</h1>
</div>
<form action="categories/edit/<?= $categorie['id'];?>" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" id="name" name="name" value="<?= $categorie['name'];?>" />
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input class="form-control" type="text" id="description" name="description" value="<?= $categorie['description'];?>" />
    </div>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>
