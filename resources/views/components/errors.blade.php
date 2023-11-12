@if($errors->any())
    <div style="background-color: #ef4444; text-align: center; padding-bottom: 16px; padding-top: 16px">
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
    </div>
@endif
