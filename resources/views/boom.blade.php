<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boomweergave van alle bieren</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">  </head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Boomweergave van alle bieren</h1>
    <ul class="list-group">
        @foreach($bieren as $bier)
            <li class="list-group-item">{{ $bier->naam }}</li>
            @if($bier->submerken->count() > 0)
                <ul class="list-group mt-2">
                    @foreach($bier->submerken as $submerk)
                        <li class="list-group-item">{{ $submerk->naam }}</li>
                    @endforeach
                </ul>
            @endif
        @endforeach
    </ul>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
