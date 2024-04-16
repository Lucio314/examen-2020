<!DOCTYPE html>
<html lang="en">

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
    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
    @endif
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  <table class="table mt-2">
        <thead>
            <tr>
                <th>Nom du Projet</th>
                <th>Date de lancement</th>
                <th>Durée</th>
                <th>Localité</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                @if ($projets)
                <td colspan="3">Aucun résultat trouvé</td>
            </tr>
            @endif
            @foreach ($projets as $projet)
            <tr>
                <td>{{ $projet->nomProjet }}</td>
                <td>{{ $projet->dateLancement }}</td>
                <td>{{ $projet->duree }}</td>
                <td>{{ $projet->localite->nomLocalite }}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        {{-- <a href="{{ route('projets.show', $rs->id) }}" type="button"
                            class="btn btn-secondary">Detail</a> --}}

                        <a href="{{ route('projets.edit', $projet->codeProjet)}}" type="button"
                            class="btn btn-warning">Edit</a>
                        <form action="{{ route('projets.destroy', $projet->codeProjet) }}" method="POST" type="button"
                            class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger m-0">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </form>
</body>

</html>
