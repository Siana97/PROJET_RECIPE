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
    <!-- PICTURE -->
    <!-- <div class="form-group">
        <label for="prep_time">Picture</label>
        <input class="form-control" type="text" id="prep_time" name="prep_time" placeholder="en minutes" />
    </div> -->
    
    <!-- USER -->
    <div class="form-group">
        <label for="user">User</label>
        <select class="form-control" id="user" name="user">
            <?php foreach($users as $user) : ?>
            <option value=<?= $user['id'];?>>
            <?= $user['name'];?>
            </option>
            <?php endforeach ;?> 
        </select>
    </div>

    <!-- CATEGORIE -->
    <div class="form-group">
        <label for="categorie">Catégorie</label>
        <select class="form-control" id="categorie" name="categorie">
            <?php foreach($categories as $category) : ?>
            <option value=<?= $category['id'];?>>
            <?= $category['name'];?>
            </option>
            <?php endforeach ;?> 
    </select>
    </div>

    <!-- INGREDIENTS-->
    <div>
        <?php foreach($ingredients as $ingredient) : ?>
        <input type="checkbox" id="<?= $ingredient['id'];?>" name="categories"/>
        <label for="<?= $ingredient['name'];?>">
            <?= $ingredient['name'];?>
        </label>
        <?php endforeach ;?> 
    </div>
    <div>
        <input type="submit" class="btn btn-lg btn-primary" />
    </div>
</form>