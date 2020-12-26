
    @foreach($firma as $key=>$value)
        <div class="col-12 mb-3 mb-md-5 firma">
            <div class="card">
                <div class="card-header">
                    <img class="card-img-top" src="{{$value->logo}} " height="255" width="360" alt="..." />
                </div>
                <div class="card-footer text-center bg-white">
                    <p class="card-text">
                        <a style="color: #212529;" href="{{route('details',$value->id)}}"> {{$value->name}}</a>
                    </p>
                </div>
            </div>
        </div>
    @endforeach
<div class="col-md-12">

    {{ $firma->links() }}
</div>
