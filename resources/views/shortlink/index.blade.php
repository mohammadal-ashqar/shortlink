<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Short Links</title>

</head>
<body>
    <div class="containar m-5 ">
        <div class="text-center my-3  ">
            <h2>Short Links</h2>
        </div>

            @if (session('success') )
            <div class="alert alert-success">
            {{ session('success') }}
           </div>
            @endif



        <form action="{{ route('shortlink.store') }}" method="POST" >
        @csrf

        <div class="row ">
            <div class="col-md-8">
                <input type="text " class="form-control @error('link') is-invalid @enderror " name="link" placeholder="Enter short email" >
                @error('link')
                     <small class="danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-4 ">
                <button class="btn btn-success w-100 ">Get Short Link</button>
            </div>
        </div>

        </form>

        <table class="table table-bordered table-striped tabel-hover mt-3 ">
            <tr class="table-dark">
                <th>origain link</th>
                <th>new link </th>
                <th>visits count</th>

            </tr>

            @foreach ($shortlinks as $shortlink)
            <tr>
                <td>{{ $shortlink->link }}</td>
                <td><a target="blank 2" href="{{ route('show.shorten.link',$shortlink->code) }}">{{ url('').'/'.$shortlink->code  }}</a></td>
                <td>{{ $shortlink->visits_count}}</td>
            </tr>

            @endforeach


        </table>
        {{ $shortlinks->links() }}
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
            setTimeout(() => {
                $('.alert').fadeOut();
            }, 2000);
    </script>



</body>
</html>
