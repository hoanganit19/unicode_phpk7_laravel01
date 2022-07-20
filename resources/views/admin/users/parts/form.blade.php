<h1>
    Form: {{$dataNew ?? ''}}
{{--    <input type="hidden" name="_token" value="{{csrf_token()}}" />--}}
    @csrf
    @method('DELETE')
</h1>
