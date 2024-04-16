<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Projet</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: 'Arial';
            font-size: 12px;
            background-color: #FFEEEE;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Saisie des projets</h1>
        <form action="{{route('projets.update',$projet->codeProjet)}}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="nomProjet" class="form-label">Nom du projet</label>
                <input type="text" class="form-control" id="nomProjet" name="nomProjet" value="{{$projet->nomProjet}}"
                    value="{{$projet->nomProjet}}" required>
            </div>

            <div class="form-group mb-3">
                <label for="dateLancement" class="form-label">Date de lancement</label>
                <input type="date" class="form-control" id="dateLancement" name="dateLancement"
                    value="{{$projet->dateLancement}}" required>
            </div>
            <div class="form-group mb-3">
                <label for="duree" class="form-label">Durée</label>
                <input type="number" class="form-control" id="duree" name="duree" value="{{$projet->duree}}" required>
            </div>
            <div class="form-group mb-3">
                <label for="codLocalite">Text</label>
                <select id="codLocalite" class="form-control" name="codLocalite">
                    <option> -Localité à choisir</option>
                    @foreach ($localites as $l)
                    <option value={{$l->codLocalite}} selected={{($l->codLocalite ==
                        $projet->localite->codLocalite)?"selected":""}} >{{$l->nomLocalite}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
            <button type="reset" class="btn btn-secondary">Annuler</button>
        </form>
    </div>
</body>

</html>
