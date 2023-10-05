<div class="page-header">
    <h1>AJOUT D'UN INGREDIENT</h1>
</div>
<form action="ingredients/create" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" id="name" name="name" placeholder="Name" />
    </div>
    <div class="form-group">
        <label for="unit">Unit</label>
        <input class="form-control" type="text" id="unit" name="unit" placeholder="Unit" />
    </div>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>
