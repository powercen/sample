@if(count($data) > 0)
<ol class="statuses">
    @foreach($data as $status)
        @include('statuses._status', ['user' => $status->user])
    @endforeach
</ol>
{!! $data->render() !!}
@endif