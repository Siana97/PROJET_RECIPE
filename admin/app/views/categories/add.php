<div class="page-header">
    <h1>AJOUT D'UNE CATÉGORIE</h1>
</div>
<form action="categories/create" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" id="name" name="name" placeholder="Name" />
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <input class="form-control" type="text" id="description" name="description" placeholder="Courte description"/>
    </div>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>
