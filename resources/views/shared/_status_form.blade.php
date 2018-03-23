<form action="{{ route('statuses.store') }}" method="post">
    {{ csrf_field() }}
    @include('shared._errors')
    <textarea class="form-control" name="content" placeholder="聊聊新鲜事..." rows="3">{{ old('content') }}</textarea>
    <button type="submit" class="btn btn-primary pull-right">发布</button>
</form>