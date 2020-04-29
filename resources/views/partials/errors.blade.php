<div class="form-group @error('name')has-danger @enderror">
    <label for="name">Nom de la catégorie</label>
    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Saisissez le nom de la catégorie" value="{{isset($category)? $category->name : '' }}">
    @error('name')
    <div class="invalid-feedback">{{$message}}</div>
@enderror
</div>
