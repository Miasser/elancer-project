
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
          crossorigin="anonymous">
</head>
<body>


<div class="container">



        <div class="mt-3 space-y-1">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-responsive-nav-link :href="route('logout')"
                                       onclick="event.preventDefault();
                                        this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-responsive-nav-link>
            </form>
        </div>

    <div style="margin-top:35px;" class="row">
        <h3 style="color: darkblue"> Please insert your long link</h3>
        <form action="{{route('generate')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="long_link" class="form-label">Long link</label>
                <textarea name="long_link" class="form-control"> {{$old ?? ''}}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Create Link</button>
            <div class="mb-3 mt-4">
                <label for="new_link" class="form-label">New Link</label>
                <input disabled value="{{($new ?? '')}}" type="text" class="form-control" name="new_link">
            </div>
        </form>
        <a class="btn btn-lg btn-outline-warning col-4 offset-4" target="-_blank" href="{{$old ?? ''}}"> {{$new ?? 'New Link'}} </a>


    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>
</html>
