<div class="page-header">
    <h1>AJOUT D'UNE RECIPE</h1>
</div>
<form action="recipes/create" method="post">
    <div class="form-group">
        <label for="name">Name</label>
        <input class="form-control" type="text" id="name" name="name" placeholder="Name" />
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" type="text" id="description" name="description" placeholder="Description de la recipe" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="portions">Portions</label>
        <input class="form-control" type="number" id="portions" name="portions" placeholder="" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="prep_time">Prep_time</label>
        <input class="form-control" type="text" id="prep_time" name="prep_time" placeholder="en minutes" />
    </div>
    <div class="form-group">
        <label for="categorie">Catégorie</label>
        <select class="form-control" id="categorie" name="categorie">
            <?php
            // Parcourir les catégories et les afficher comme options
            foreach ($categories as $categorie) 
            :?>
            <option value="<?= $categorie['id'];?>"></option>
            <?php endforeach; ?>
    </select>
    </div>
    <div class="form-group">
        <label for="prep_time">User</label>
        <input class="form-control" type="text" id="user" name="user" placeholder="" />
    </div>
    <div class="form-group">
        <label for="ingredients">Ingrédients</label>
        <input class="form-control" type="text" id="ingredient" name="ingredient"/>
    </div>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>
