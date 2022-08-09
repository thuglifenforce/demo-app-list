
<div class="container-import">
    <div class="container__item">
        @if ($errors)
        @foreach ($errors->all() as $error )
        <div class="alert alert-danger" role="alert">{{ $error }}</div>
        @endforeach
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success" role="alert">{{ Session::get('success')}}</div>
        @endif
        <form class="form" method="POST"  enctype="multipart/form-data">
            @csrf
            <input name="importFile" type="file" class="form__field"/>
            <button type="submit" class="btn btn--primary btn--inside uppercase">Importers</button>
        </form>
    </div>
</div>

